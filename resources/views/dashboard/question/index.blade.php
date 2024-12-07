<x-dashboard-layout>

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Question')}}</li>
    </x-slot:breadcrumb>



<!-- Both borders table start -->
<div class="col-span-12">
    <div class="card table-card">
        <div class="card-header">
            <div class="sm:flex items-center justify-between">
                <h5 class="mb-3 sm:mb-0">{{ __('Questions and Answers') }}</h5>
                <div>
                    <a href="{{ route('admin.question.create') }}" class="btn btn-primary">
                        {{ __('Add Question') }}
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
                        <th>{{ __('Question_AR') }}</th>
                        <th>{{ __('Question_EN') }}</th>
                        <th>{{ __('Answer_AR') }}</th>
                        <th>{{ __('Answer_EN') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            @foreach ($Question->answers as $answer)  <!-- Assuming each question can have multiple answers -->
                                <tr>
                                    <td>{{ $loop->parent->iteration }}</td>
                                    <td>{{ $question->name_ar }}</td>
                                    <td>{{ $question->name_en }}</td>
                                    <td>{{ $answer->answer_ar }}</td>
                                    <td>{{ $answer->answer_en }}</td>
                                    <td>
                                        <a href="{{ route('admin.question.edit', $question->id) }}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                            <i class="ti ti-edit text-xl leading-none"></i>
                                        </a>
                                        <form action="{{ route('admin.question.destroy', $question->id) }}" method="post" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary" title="{{ __('Delete') }}">
                                                <i class="ti ti-trash text-xl leading-none"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Both borders table end -->



</x-dashboard-layout>
