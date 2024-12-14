<x-dashboard-layout>
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">
    @endpush
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.question.index')}}">{{__('admin.Question')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Edit Question')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('admin.Edit Question')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.question.update', $question->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="name_ar" label="{{ __('admin.Name_AR') }}" type="text" value="{{ old('name_ar', $question->name_ar) }}" placeholder="{{ __('Enter name of the name in Arabic') }}" />
                            </div>
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="name_en" label="{{ __('admin.Name_EN') }}" type="text" value="{{ old('name_en', $question->name_en) }}" placeholder="{{ __('Enter name of the name in English') }}" />
                            </div>
                            <!-- سؤال باللغة العربية -->
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="question_ar" label="{{ __('admin.Question_AR') }}" type="text" value="{{ old('question_ar', $question->question_ar) }}" placeholder="{{ __('Enter name of the question in Arabic') }}" />
                            </div>

                            <!-- سؤال باللغة الإنجليزية -->
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="question_en" label="{{ __('admin.Question_EN') }}" type="text" value="{{ old('question_en', $question->question_en) }}" placeholder="{{ __('Enter name of the question in English') }}" />
                            </div>

                            <!-- خيارات الإجابة (نعم/لا) -->
                            <div class="form-group col-6 mb-3">
                                <label for="answer" class="form-label">{{ __('admin.Answer Options') }}</label>

                                <!-- إذا كانت الإجابة "نعم" محددة مسبقًا -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" value="yes" id="yes" {{ old('answer', $question->answers->where('answer', 'yes')->first() != null) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="yes">
                                        {{ __('admin.Yes') }}
                                    </label>
                                </div>

                                <!-- إذا كانت الإجابة "لا" محددة مسبقًا -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" value="no" id="no" {{ old('answer', $question->answers->where('answer', 'no')->first() != null) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="no">
                                        {{ __('admin.No') }}
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-end mt-3">
                            <a href="{{ route('admin.question.index') }}" class="btn btn-secondary col-1 mr-3">
                                {{ __('admin.Back') }}
                            </a>
                            <button type="submit" class="btn btn-primary col-1 mr-3">
                                {{ $btn_label ?? __('admin.Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    @push('scripts')

    @endpush
</x-dashboard-layout>
