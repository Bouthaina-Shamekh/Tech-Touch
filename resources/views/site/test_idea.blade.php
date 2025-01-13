@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
$question_name = 'question_' . app()->currentLocale();
@endphp



@section('content')
    <link rel="stylesheet" href="{{asset('asset/css/test_idea.css')}}">
    <!-- Content -->
    <section class="my-20">
        <div class="container ">
            <h2 class="text-5xl font-semibold text-main uppercase mb-6 w-full text-center top__content">Test Your Idea</h2>
            <div class="flex flex-col justify-center items-center w-full">
                <!-- Progress Bar -->
                <div class="progress-bar w-[100%] md:w-3/4 flex items-center top__content mb-6 ">
                    @foreach ($questions as $index => $question)
                        <span class="progress-step {{$index == 0 ? 'completed' : ''}}">{{ $index + 1 }}</span>
                        @if ($index < $question->count() - 1)
                            <span class="progress-line flex-grow"></span>
                        @endif
                    @endforeach
                </div>
                <div class="w-full bg-[#F5F5F5] p-5">
                    <form action="{{route('site.show_answers')}}" method="post" id="myForm">
                        @csrf
                        @foreach ($questions as $question)
                        <!-- Step 1 -->
                        <div class="step-content" data-step="{{ $loop->iteration }}">
                            <h4 class="text-main font-medium mb-4">__ {{ $loop->iteration }}</h4>
                            <p class="mb-4">{{ $question->$question_name }}</p>
                            <label class="flex items-center mb-2">
                                <input type="radio" name="questions[{{ $question->id }}]" value="yes" class="appearance-none peer w-4 h-4 border border-second rounded-full checked:bg-main checked:border-second focus:outline-none" {{ $question->answers->where('answer', 'yes')->first() != null ? 'checked' : '' }}>
                                <span class="ml-2 text-base font-light">{{ __('site.Yes') }}</span>
                            </label>
                            <label class="flex items-center mb-2">
                                <input type="radio" name="questions[{{ $question->id }}]" value="no" class="appearance-none peer w-4 h-4 border border-second rounded-full checked:bg-main checked:border-second focus:outline-none" {{ $question->answers->where('answer', 'no')->first() != null ? 'checked' : '' }}>
                                <span class="ml-2 text-base font-light">{{ __('site.No') }}</span>
                            </label>
                        </div>
                        @endforeach
                    </form>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-6">
                </div>
                <div class="relative mb-3 bottom__content">
                    <button id="prevBtn" class="mt-2 px-8  py-4 text-gray-500 bg-gray-100 hover:bg-gray-300 hover:-translate-y-1 focus:bg-gray-300  transition-all duration-150 ease-in-out" disabled >
                        <i class="fa-solid fa-arrow-left ms-3"></i>
                        {{ __('site.Back') }}
                    </button>
                    <button id="nextBtn" type="button" class="mt-2 inline-block px-8  py-4 text-white bg-main hover:bg-second hover:-translate-y-1 focus:bg-second transition-all duration-150 ease-in-out" >
                        <span id="nextBtnText">{{ __('site.Next') }}</span>
                        <i class="fa-solid fa-arrow-right ms-3"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    @stop

    @section('scripts')

    <script src="{{ asset('asset/js/pages/pagesScroller2.js') }}"></script>
    <script src="{{ asset('asset/js/pages/test_idea.js') }}"></script>
    
    @endsection
    




