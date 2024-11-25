<x-dashboard-layout>
    @push('styles')
         <link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">

        <style>
            td:last-of-type{
                display: flex;
            }
            table td.description {
                white-space: nowrap; /* منع التفاف النص */
                overflow: hidden; /* إخفاء النص الذي يتجاوز حدود الخلية */
                text-overflow: ellipsis; /* إظهار النقاط المتقطعة عند تجاوز الحد */
                max-width: 200px; /* تحديد الحد الأقصى لعرض الخلية */
                padding: 10px;
                transition: max-width 0.5s ease; /* تأثير سلس عند تغيير العرض */
            }

            table td.description:hover {
                max-width: 500px; /* تكبير الخلية عند الاقتراب */
                white-space: normal; /* السماح للنص بالالتفاف */
            }
        </style>
    @endpush
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Categories')}}</li>
    </x-slot:breadcrumb>
    <!-- Both borders table start -->
    <div class="col-span-12">
        <div class="card table-card">
            <div class="card-header">
                <div class="sm:flex items-center justify-between">
                    <h5 class="mb-3 sm:mb-0">{{__('Categories')}}</h5>
                    <div>
                        <a href="#" class="btn btn-primary" data-pc-toggle="offcanvas" data-pc-target="#categoryAdd" aria-controls="categoryAdd">
                            {{__('Add Category')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-3">
                <div class="table-responsive" style="margin: 0 15px;">
                    <table class="table table-hover table-bordered" id="pc-dt-simple">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Description')}}</th>
                            <th>{{__('status')}}</th>
                            <th>{{__('created_by')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <div class="flex items-center w-44">
                                        <div class="shrink-0">
                                            <img src="{{ $category->image_url }}" alt="user image" class="rounded-full w-10" />
                                        </div>
                                        <div class="grow ltr:ml-3 rtl:mr-3">
                                            @if(App::getLocale() == 'ar')
                                            <h6 class="mb-0">{{$category->name_ar}}</h6>
                                            @else
                                            <h6 class="mb-0">{{$category->name_en}}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                @if(App::getLocale() == 'ar')
                                    <td>{{$category->description_ar}}</td>
                                @else
                                    <td>{{$category->description_en}}</td>
                                @endif
                                <td>{{$category->status}}</td>
                                <td>{{$category->admin->name}}</td>
                                <td>
                                    <a href="{{route('dashboard.categories.edit',$category->slug)}}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                        <i class="ti ti-edit text-xl leading-none"></i>
                                    </a>
                                    <form action="{{route('dashboard.categories.destroy',$category->slug)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary" title="{{__('Delete')}}">
                                            <i class="ti ti-trash text-xl leading-none"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Both borders table end -->

    <!-- Modal -->
    <div class="offcanvas pc-announcement-offcanvas offcanvas-end" tcabindex="-1" id="categoryAdd" aria-labelledby="categoryAddLabel">
        <div class="offcanvas-header">
        <button data-pc-dismiss="#categoryAdd" class="text-lg flex items-center justify-center rounded w-7 h-7 text-secondary-500 hover:bg-danger-500/10 hover:text-danger-500" >
            <i class="ti ti-x"></i>
        </button>
        </div>
        <div class="offcanvas-body announcement-scroll-block">
            <p class="mb-3">{{__('Add Category')}}</p>
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{route('dashboard.categories.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <x-form.input name="name_ar" label="{{__('Name_AR')}}" type="text" placeholder="{{__('enter name category in arabic')}}" required />
                            </div>
                            <div class="form-group col-6">
                                <x-form.input name="name_en" label="{{__('Name_EN')}}" type="text" placeholder="{{__('enter name category in english')}}"  required />
                            </div>
                            <div class="form-group col-12">
                                <label for="description_ar" class="form-label">{{__('Description Arabic')}}</label>
                                <textarea name="description_ar" id="description_ar" rows="2" class="form-control">{{ old('description_ar') }}</textarea>
                            </div>
                            <div class="form-group col-12">
                                <label for="description_en" class="form-label">{{__('Description English')}}</label>
                                <textarea name="description_en" id="description_en" rows="2" class="form-control">{{ old('description_en') }}</textarea>
                            </div>
                            <div class="form-group col-6">
                                <label for="status" class="form-label">{{__('Status')}}</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="active">{{__('active')}}</option>
                                    <option value="archive">{{__('archive')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="imageFile" class="form-label d-block">{{__('Image')}}</label>
                                <label class="btn btn-outline-secondary" for="imageFile">
                                    <i class="ti ti-upload me-2"></i>
                                    {{__("Choose Image")}}
                                    <i  id="doneChooseMedia" class="ti ti-check bg-success text-white rounded-circle p-1 " style="transition: all 0.3s ease; opacity: 0"></i>
                                </label>
                                <button type="button" id="imageFile" class="d-none" data-pc-toggle="modal" data-pc-target="#mediaModal"></button>
                                <input type="text" class="form-control mt-2 d-none" id="imagePathInput" value="" name="imagePath" accept="image/*" readonly>
                            </div>
                        </div>
                        <div class="row justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary col-3">
                                {{__('Add')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mediaModal" tabindex="-1" role="dialog" aria-labelledby="mediaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="mediaModalLabel">
                        {{__('Choose Image')}}
                    </h5>
                    <div class="row align-items-center">
                        <form class="col-9" id="uploadForm" action="{{ route('dashboard.media.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="btn btn-outline-secondary" for="imageFileUpload">
                                <i class="ti ti-upload me-2"></i>
                                {{__("Click to Upload")}}
                            </label>
                            <input type="file" id="imageFileUpload" name="imageFile[]" accept="image/*" hidden multiple>
                        </form>
                        <button id="closeMediaModal" data-pc-modal-dismiss="#mediaModal" class="text-lg flex items-center justify-center rounded w-7 h-7 text-secondary-500 hover:bg-danger-500/10 hover:text-danger-500">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body masonry-column">
                    @foreach ($images as $image)
                        <div class="masonry-item relative" data-image-path="{{$image->path}}" id="image-{{$image->id}}">
                            <img src="{{asset('storage/'.$image->path)}}" alt="صورة 1">
                            <div class="caption">
                                {{$image->file_name}} - {{ App\Helpers\FormatSize::formatSize($image->size) }}
                            </div>
                            <div class="absolute p-[9px] text-white del" id="del-{{$image->id}}" data-id="{{$image->id}}">
                                <button>X</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @if ($errors->any())
                    // Open the pop-up when there are validation errors
                    $('#categoryAdd').addClass('show');
                @endif
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.masonry-item').on('click', function() {
                    let pathImage = $(this).data('image-path');
                    $('#imagePathInput').val(pathImage); // تخزين المسار في حقل إدخال مخفي أو عرضه في مكان آخر
                    $('#closeMediaModal').click();
                    $('#doneChooseMedia').css('opacity', '1');
                    // $("#mediaModal").hide();
                });
                $('.del').on('click', function() {
                    let id = $(this).data('id');
                    $('#image-'+id).remove();
                    $.ajax({
                        url: "/dashboard/media/" + id,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            // console.log(response);
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                });
                $('#imageFileUpload').on('change', function() {
                    // إنشاء كائن FormData لتضمين الملفات
                    var formData = new FormData();
                    formData.append('_token', "{{ csrf_token() }}");
                    formData.append('imageFile', $(this).prop('files')[0]);
                    $.ajax({
                        url: "{{ route('dashboard.media.store') }}",
                        type: "POST",
                        data: formData,
                        processData: false, // لمنع jQuery من تحويل البيانات
                        contentType: false, // لتعطيل إعداد نوع المحتوى التلقائي
                        success: function(response) {
                            let pathImage = response.path;
                            $('#imagePathInput').val(pathImage); // تخزين المسار في حقل إدخال مخفي أو عرضه في مكان آخر
                            $('#closeMediaModal').click();
                            $('#doneChooseMedia').css('opacity', '1');
                            $.ajax({
                                url: "{{ route('dashboard.media.index') }}",
                                type: "GET",
                                success: function(response) {
                                    $('.masonry-column').empty();
                                    let items = response.data;
                                    for (let i = 0; i < items.length; i++) {
                                        let item = items[i];
                                        let imageHtml = `
                                            <div class="masonry-item relative" data-image-path="${item.path}" id="image-${item.id}">
                                                <img src="/storage/${item.path}" alt="صورة 1">
                                                <div class="caption">
                                                    ${item.file_name}
                                                </div>
                                                <div class="absolute p-[9px] text-white del" id="del-${item.id}" data-id="${item.id}">
                                                    <button>X</button>
                                                </div>
                                            </div>
                                        `;
                                        $('.masonry-column').append(imageHtml);
                                    }
                                },
                                error: function(xhr) {
                                    console.error(xhr.responseText);
                                }
                            });
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script>
    @endpush
</x-dashboard-layout>
