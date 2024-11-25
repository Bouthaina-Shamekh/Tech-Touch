@push('styles')
<link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">
@endpush
<div class="row">
    <div class="form-group col-6 mb-3">
        <x-form.input name="name_ar" label="{{__('Name_AR')}}" type="text" placeholder="{{__('enter name product in arabic')}}" required :value="$product->name_ar" />
    </div>
    <div class="form-group col-6 mb-3">
        <x-form.input name="name_en" label="{{__('Name_EN')}}" type="text" placeholder="{{__('enter name product in english')}}"  required :value="$product->name_en" />
    </div>
    <div class="form-group col-6 mb-3">
        <x-form.input name="quantity" label="{{__('Quantity')}}" type="number" min="0" placeholder="{{__('enter quantity')}}"  required :value="$product->quantity" />
    </div>
    <div class="form-group col-6 mb-3">
        <label for="status" class="form-label">{{__('Status')}}</label>
        <select name="status" id="status" class="form-control">
            <option value="active" @selected($product->status == 'active')>{{__('active')}}</option>
            <option value="archive" @selected($product->status == 'archive')>{{__('archive')}}</option>
        </select>
    </div>
    <div class="form-group col-6 mb-3">
        <label for="content_ar" class="form-label">{{__('Content Arabic')}}</label>
        <textarea name="content_ar" id="content_ar" rows="3" class="form-control" required>{{ $product->content_ar }}</textarea>
    </div>
    <div class="form-group col-6 mb-3">
        <label for="content_en" class="form-label">{{__('Content English')}}</label>
        <textarea name="content_en" id="content_en" rows="3" class="form-control">{{ $product->content_en }}</textarea>
    </div>
    <div class="form-group col-6 mb-3">
        <label for="category_id" class="form-label">{{__('Category')}}</label>
        <select id="category_id" name="category_id" class="form-control" >
            <option value="" disabled selected>{{__('Choose')}}</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" @selected($product->category_id == $category->id)>{{$category->name_en . ' - ' . $category->name_ar}}</option>
            @endforeach
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
        @if ($product->image != null)
            <img src="{{$product->image_url}}" alt="img...." width="100px" class="mt-3">
        @endif
    </div>
    <div class="form-group col-6 mb-3">
        <x-form.input type="number" name="mealCount" label="{{__('Number of Meals')}}" min="1" required :value="$product->meals->count()" />
    </div>
</div>
<hr>
<div class="row mt-3">
    <h3 class="mb-3">{{__('Meal Sections')}}</h3>
    <table class="table table-hover table-bordered" id="pc-dt-simple">
        <thead>
        <tr>
            <th>#</th>
            <th>{{__('Name_AR')}}</th>
            <th>{{__('Name_EN')}}</th>
            <th>{{__('Price')}}</th>
            <th>{{__('Discount price')}}</th>
            <th>{{__('Description')}}</th>
        </tr>
        </thead>
        <tbody id="mealsContainer">
            @for ($i = 1; $i <= $product->meals->count(); $i++)
                <tr id="meal_{{$i}}">
                    <td>{{$i}}</td>
                    <td>
                        <x-form.input value="{{$product->meals->where('num_meal',$i)->first()->name_ar}}" name="name_ar_{{$i}}" type="text" placeholder="{{__('Enter Arabic name')}}" required />
                    </td>
                    <td>
                        <x-form.input value="{{$product->meals->where('num_meal',$i)->first()->name_en}}" name="name_en_{{$i}}" type="text" placeholder="{{__('Enter English name')}}" required />
                    </td>
                    <td>
                        <x-form.input value="{{$product->meals->where('num_meal',$i)->first()->price}}" name="price_{{$i}}" type="number" min="0" placeholder="{{__('Enter price')}}" required />
                    </td>
                    <td>
                        <x-form.input value="{{$product->meals->where('num_meal',$i)->first()->compare_price}}" name="compare_price_{{$i}}" type="number" min="0" placeholder="{{__('Enter Discount price')}}" />
                    </td>
                    <td>
                        <x-form.input value="{{$product->meals->where('num_meal',$i)->first()->description}}" name="description_{{$i}}" type="text" placeholder="{{__('Enter description')}}" />
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>
<div class="row justify-content-end mt-3">
    <a href="{{route('dashboard.products.index')}}" class="btn btn-secondary col-1 mr-3">
        {{__('Back')}}
    </a>
    <button type="submit" class="btn btn-primary col-1  mr-3">
        {{$btn_label ?? __('Add')}}
    </button>
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
    $(document).ready(function() {
           //
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
                        console.log(response);
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
<script>
    $(document).ready(function() {
        // عند إدخال عدد الوجبات
        $('#mealCount').on('input',function() {
            let mealCount = $(this).val();
            $('#mealsContainer').empty(); // تفريغ الحاوية لإضافة الوجبات الجديدة
            for (let i = 1; i <= mealCount; i++) {
                let name_ar = "";
                let name_en = "";
                if(i == 1){
                    name_ar = "الوجبة الرئيسية";
                    name_en = "Main meal";
                }
                if(i == 2){
                    name_ar = "الوجبة الفردية";
                    name_en = "Individual meal";
                }
                if(i == 3){
                    name_ar = "وسط";
                    name_en = "Middle";
                }

                let mealRow = `
                <tr id="meal_${i}">
                    <td>${i}</td>
                    <td>
                        <x-form.input value="${name_ar}" id="name_ar_${i}" name="name_ar_${i}" type="text" placeholder="{{__('Enter Arabic name')}}" required />
                    </td>
                    <td>
                        <x-form.input value="${name_en}" id="name_en_${i}" name="name_en_${i}" type="text" placeholder="{{__('Enter English name')}}" required />
                    </td>
                    <td>
                        <x-form.input id="price_${i}" name="price_${i}" type="number" min="0" placeholder="{{__('Enter Price')}}" required />
                    </td>
                    <td>
                        <x-form.input id="sale_price_${i}" name="sale_price_${i}" type="number" min="0" placeholder="{{__('Enter Compare Price')}}" />
                    </td>
                    <td>
                        <x-form.input id="description_${i}"  name="description__${i}" type="text" placeholder="{{__('Enter description')}}" />
                    </td>
                </tr>
                `;
                $('#mealsContainer').append(mealRow); // إضافة صف الوجبة إلى الحاوية
            }
        });
    });
</script>
@endpush
