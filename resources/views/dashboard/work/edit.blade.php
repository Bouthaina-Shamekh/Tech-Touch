<x-dashboard-layout>
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.work.index')}}">{{__('admin.Works')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Edit Work')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                    {{-- @can('add product') --}}
                <div class="card-header">
                    <h5>{{__('admin.Edit Work')}}</h5>
                </div>
                {{-- @endcan --}}
                <div class="card-body">
                    <form action="{{route('admin.work.update',$works->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="name_ar" label="{{__('admin.Name_AR')}}" type="text" placeholder="{{__('admin.enter name of works in arabic')}}" required :value="$works->name_ar" />
                            </div>
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="name_en" label="{{__('admin.Name_EN')}}" type="text" placeholder="{{__('admin.enter name of works in english')}}" required :value="$works->name_en"/>
                            </div>

                            <div class="form-group col-6">
                                <label for="description_ar" class="form-label">{{__('admin.Description arabic')}}</label>
                                <textarea name="description_ar" id="mytextarea" rows="3" class="form-control">{{ old('description_ar',$works->description_ar) }}</textarea>
                            </div>
                            <div class="form-group col-6">
                                <label for="description_en" class="form-label">{{__('admin.Description English')}}</label>
                                <textarea name="description_en" id="mytextarea" rows="3" class="form-control">{{ old('description_en',$works->description_en) }}</textarea>
                            </div>


                            <div class="form-group col-6 mb-3">
                                <x-form.input name="link" label="{{__('admin.Link')}}" type="url" :value="$works->link" placeholder="{{__('admin.enter link')}}"/>
                            </div>

                            <div class="form-group col-6 mb-3">
                                <x-form.input name="categories" :value="$works->categories" label="{{__('admin.Categories')}}" list="categories" type="text" placeholder="{{__('admin.enter categories')}}"/>
                                <span>{{__("You can add ('tag1, tag2, tag3 ...')")}}</span>
                                <datalist id="categories">
                                    @if (App::getLocale() == 'en')
                                        @foreach ($categories as $category)
                                            <option value="{{$category->name_en}}"></option>
                                        @endforeach
                                    @else
                                        @foreach ($categories as $category)
                                            <option value="{{$category->name_ar}}"></option>
                                        @endforeach
                                    @endif
                                </datalist>
                            </div>
                            <div class="form-group col-6">
                                <label for="imageWork" class="form-label">{{__('admin.Image')}}</label>
                                <label class="btn btn-outline-secondary" for="imageWork">
                                    <i class="ti ti-upload me-2"></i>
                                    {{__("Choose Image")}}
                                    <i  id="doneChooseMedia" class="ti ti-check bg-success text-white rounded-circle p-1" style="transition: all 0.3s ease; opacity: 0"></i>
                                </label>
                                <button type="button" id="imageWork" class="d-none" data-pc-toggle="modal" data-pc-target="#mediaModal"></button>
                                <input type="text" class="form-control mt-2 d-none"  id="imagePathInput" value="" name="imagePath" accept="image/*" readonly>
                                <img src="{{asset('storage/' . $works->image)}}" alt="img...." width="100px" class="mt-3">
                            </div>
                        </div>
                        <div class="row justify-content-end mt-3">
                            <a href="{{route('admin.work.index')}}" class="btn btn-secondary col-1 mr-3">
                                {{__('admin.Back')}}
                            </a>
                            <button type="submit" class="btn btn-primary col-1  mr-3">
                                {{__('admin.Update')}}
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
                    {{__('admin.Choose Image')}}
                </h5>
                <div class="row align-items-center">
                    <form class="col-9" id="uploadForm" action="{{ route('admin.media.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label class="btn btn-outline-secondary" for="imageFileUpload">
                            <i class="ti ti-upload me-2"></i>
                            {{__("Click to Upload")}}
                        </label>
                        <input type="file" id="imageFileUpload" name="imageFile[]" accept="image/*" hidden multiple>
                    </form>
                    <button id="closeMediaModal"  data-pc-modal-dismiss="#mediaModal" class="text-lg flex items-center justify-center rounded w-7 h-7 text-secondary-500 hover:bg-danger-500/10 hover:text-danger-500">
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
                url: "/admin/media/" + id,
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
                url: "{{ route('admin.media.store') }}",
                type: "POST",
                data: formData,
                processData: false, // لمنع jQuery من تحويل البيانات
                contentType: false, // لتعطيل إعداد نوع المحتوى التلقائي
                success: function(response) {
                    console.log(response);
                    let pathImage = response.path;
                    $('#imagePathInput').val(pathImage); // تخزين المسار في حقل إدخال مخفي أو عرضه في مكان آخر
                    $('#closeMediaModal').click();
                    $('#doneChooseMedia').css('opacity', '1');
                    $.ajax({
                        url: "{{ route('admin.media.index') }}",
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.4.1/tinymce.
min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>

    @endpush
</x-dashboard-layout>
