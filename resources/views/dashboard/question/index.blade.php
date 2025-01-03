<x-dashboard-layout>

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Question')}}</li>
    </x-slot:breadcrumb>
<div class="col-span-12">
    <div class="card table-card">
        <div class="card-header">
            <div class="sm:flex items-center justify-between">
                <h5 class="mb-3 sm:mb-0">{{ __('admin.Questions and Answers') }}</h5>
                <div>
                    @can('create', 'App\\Models\Question')
                    <a href="{{ route('admin.question.create') }}" class="btn btn-primary">
                        {{ __('admin.Add Question') }}
                    </a>
                    @endcan
                </div>
            </div>
        </div>
        @can('view', 'App\\Models\Question')
        <div class="card-body pt-3">
            <div class="table-responsive" style="margin: 0 15px;">
                <table class="table table-hover table-bordered" id="pc-dt-simple">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.Name') }}</th>
                        <th>{{ __('admin.Question') }}</th>
                        <th>{{ __('admin.Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                @if (App::getLocale() == 'en')
                                <td>{{ $question->name_en }}</td>
                                <td>{{ $question->question_en }}</td>
                                @else
                                <td>{{ $question->name_ar }}</td>
                                <td>{{ $question->question_ar }}</td>
                                @endif
                                <td>
                                    <!-- تعديل السؤال -->
                                    @can('edit', 'App\\Models\Question')
                                    <a href="{{ route('admin.question.edit', $question->id) }}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                        <i class="ti ti-edit text-xl leading-none"></i>
                                    </a>
                                    @endcan

                                    @can('delete', 'App\\Models\Question')
                                    <!-- حذف السؤال مع الإجابات -->
                                    <form action="{{ route('admin.question.destroy', $question->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary" title="{{ __('Delete') }}">
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



<!-- Both borders table end -->



</x-dashboard-layout>
