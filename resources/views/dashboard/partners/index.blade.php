<x-dashboard-layout>
@push('styles')
    <link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">
@endpush
<!-- Both borders table start -->
<div class="col-span-12">
    <div class="card table-card">
        <div class="card-header">
            <div class="sm:flex items-center justify-between">
                <h5 class="mb-3 sm:mb-0">{{__('admin.Partners')}}</h5>
                <div>
                    <button type="button" id="createPartnerBtn" class="btn btn-primary" data-pc-toggle="modal" data-pc-target="#createPartner">
                        {{__('admin.Add Partner')}}
                    </button>
                </div>
            </div>
        </div>
        @can('view', 'App\\Models\Partner')
        <div class="card-body pt-3">
            <div class="table-responsive" style="margin: 0 15px;">
                <table class="table table-hover table-bordered" id="pc-dt-simple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('admin.Link')}}</th>
                            <th>{{__('admin.Image')}}</th>
                            <th>{{__('admin.Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partners as $partner )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$partner->link}}</td>
                                <td>
                                    <img src="{{asset('storage/'.$partner->image)}}" alt="image" class="w-16">
                                </td>
                                <td class="text-center d-flex" style="height: 100%;">
                                    @can('edit', 'App\\Models\Hero')
                                    <button type="button" id="editPartnerBtn-{{$partner->id}}" data-id="{{$partner->id}}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary editPartnerBtn" data-pc-toggle="modal" data-pc-target="#editPartner-{{$partner->id}}">
                                        <i class="ti ti-edit text-xl leading-none"></i>
                                    </button>
                                    @endcan
                                    @can('delete', 'App\\Models\Hero')
                                    <form action="{{route('admin.partner.destroy',$partner->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary" title="{{__('admin.Delete')}}">
                                            <i class="ti ti-trash text-xl leading-none"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endcan
    </div>
</div>

@include('dashboard.partners.createModal')

@foreach ($partners as $partner )
    @include('dashboard.partners.editModal',['partner' => $partner])
@endforeach

<div id="mediaModal" class="modal fade animate" tabindex="-2" role="dialog" aria-labelledby="mediaModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
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
                    <button id="closeMediaModal" data-pc-modal-dismiss="#mediaModal" class="text-lg flex items-center justify-center rounded w-7 h-7 text-secondary-500 hover:bg-danger-500/10 hover:text-danger-500">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
            </div>
            <input type="hidden" name="type" id="type" value="">
            <input type="hidden" name="idRow" id="idRow" value="">
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
<!-- Include jQuery first -->

<script>
    $(document).ready(function() {
        $('#createPartnerBtn').on('click', function() {
            $('#type').val('create');
        })
        $('.editPartnerBtn').on('click', function() {
            $('#type').val('edit');
            $('#idRow').val($(this).data('id'));
        })
        $('.masonry-item').on('click', function() {
            let pathImage = $(this).data('image-path');
            let typeAction = $('#type').val();
            let rowId = $('#idRow').val();
            $('#closeMediaModal').click();
            if(typeAction == 'create') {
                $('#imagePathInput').val(pathImage); // تخزين المسار في حقل إدخال مخفي أو عرضه في مكان آخر
                $('#doneChooseMedia').css('opacity', '1');
                setTimeout(function() {
                    $('#createPartnerBtn').click();
                }, 700);
            }
            if(typeAction == 'edit') {
                $('#imagePathInputEdit-' + rowId).val(pathImage); // تخزين المسار في حقل إدخال مخفي أو عرضه في مكان آخر
                $('#doneChooseMediaEdit-' + rowId).css('opacity', '1');
                console.log(rowId,pathImage);
                console.log($('#imagePathInputEdit-' + rowId).val());
                setTimeout(function() {
                    $('#editPartnerBtn-' + rowId).click();
                }, 700);
            }

            // $("#createPartner").modal('show');
        });
        //
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
                    let typeAction = $('#type').val();
                    let rowId = $('#idRow').val();
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
                            if(typeAction == 'create'){
                                setTimeout(function() {
                                    $('#createPartnerBtn').click();
                                }, 700);
                            }
                            if(typeAction == 'edit'){
                                setTimeout(function() {
                                    $('#editPartnerBtn-' + rowId).click();
                                }, 700);
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
