<x-dashboard-layout>
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">
    @endpush
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.Home')}}</a></li>
        @can('view', 'App\\Models\Question')
        <li class="breadcrumb-item"><a href="{{route('admin.question.index')}}">{{__('admin.Question')}}</a></li>
        @endcan
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Edit Question')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('admin.Edit Question')}}</h5>
                </div>
                @can('edit', 'App\\Models\Question')
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
                @endcan
            </div>
        </div>
    </div>





    @push('scripts')

    @endpush
</x-dashboard-layout>
