<x-dashboard-layout>
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">
    @endpush
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.question.index')}}">{{__('Question')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Add Question')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                {{-- @can('add product') --}}
                <div class="card-header">
                    <h5>{{__('Add Question')}}</h5>
                </div>
                {{-- @endcan --}}
                <div class="card-body">
                    {{-- <form action="{{ route('admin.question.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="question_ar" label="{{ __('Question_AR') }}" type="text" placeholder="{{ __('Enter name of the question in Arabic') }}" />
                            </div>




                            <div class="form-group col-6 mb-3">
                                <x-form.input name="question_en" label="{{ __('Question_EN') }}" type="text" placeholder="{{ __('Enter name of the question in English') }}" />
                            </div>







                            <!-- Answer Options (Yes/No) -->
                            <div class="form-group col-6 mb-3">
                                <label for="answer" class="form-label">{{ __('Answer Options') }}</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" value="yes" id="yes">
                                    <label class="form-check-label" for="yes">
                                        {{ __('Yes') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" value="no" id="no">
                                    <label class="form-check-label" for="no">
                                        {{ __('No') }}
                                    </label>
                                </div>
                            </div>



                        </div>


                        <div class="row justify-content-end mt-3">
                            <a href="{{ route('admin.question.index') }}" class="btn btn-secondary col-1 mr-3">
                                {{ __('Back') }}
                            </a>
                            <button type="submit" class="btn btn-primary col-1 mr-3">
                                {{ $btn_label ?? __('Add') }}
                            </button>
                        </div>
                    </form> --}}

                    <form action="{{ route('admin.question.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="question_ar" label="{{ __('Question_AR') }}" type="text" placeholder="{{ __('Enter name of the question in Arabic') }}" />
                            </div>

                            <div class="form-group col-6 mb-3">
                                <x-form.input name="question_en" label="{{ __('Question_EN') }}" type="text" placeholder="{{ __('Enter name of the question in English') }}" />
                            </div>

                            <!-- Answer Options (Yes/No) -->
                            <div class="form-group col-6 mb-3">
                                <label for="answer" class="form-label">{{ __('Answer Options') }}</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" value="yes" id="yes" {{ old('answer') == 'yes' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="yes">
                                        {{ __('Yes') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" value="no" id="no" {{ old('answer') == 'no' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="no">
                                        {{ __('No') }}
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-end mt-3">
                            <a href="{{ route('admin.question.index') }}" class="btn btn-secondary col-1 mr-3">
                                {{ __('Back') }}
                            </a>
                            <button type="submit" class="btn btn-primary col-1 mr-3">
                                {{ __('Add') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>






    @push('scripts')
    <!-- Include jQuery first -->

    {{-- <script>
        $(document).ready(function() {
           //
            $('.masonry-item').on('click', function() {
                let pathImage = $(this).data('image-path');
                $('#imagePathInput').val(pathImage); // تخزين المسار في حقل إدخال مخفي أو عرضه في مكان آخر
                $('#closeMediaModal').click();
                $('#doneChooseMedia').css('opacity', '1');
                // $("#mediaModal").hide();
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
    </script> --}}
    @endpush


</x-dashboard-layout>
