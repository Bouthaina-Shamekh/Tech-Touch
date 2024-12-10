@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
$question_name = 'question_' . app()->currentLocale();
@endphp



@section('content')

    <!-- Breadcrumb -->
    <div class="w-full py-3 bg-[#F5F5F5]">
        <div class="container">
            <nav class="w-full rounded-md">
                <ol class="list-reset flex">
                    <li>
                        <a href="../index.html" class="text-main transition duration-150 ease-in-out hover:text-main focus:text-main active:text-main motion-reduce:transition-none ">
                            Home
                        </a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-400">/</span>
                    </li>
                    <li>
                        <a href="./test_idea.html" class="text-main transition duration-150 ease-in-out hover:text-main focus:text-main active:text-main motion-reduce:transition-none ">
                            Test Your Idea
                        </a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-400">/</span>
                    </li>
                    <li class="text-neutral-400">Our Comment</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content -->
    <section class="my-20">
        <div class="container">
            <h2 class="text-5xl font-semibold text-main uppercase mb-2 w-full text-center top__content">Our comment on your idea</h2>
            <div class="left__content w-full bg-[#F5F5F5] p-10">
                <div class="flex justify-start items-center">
                    <span class="text-base me-4 left__content">Maturity Of Your Idea</span>
                    <div class="flex-1  bg-gray-300 h-4 overflow-hidden top__content">
                        <div class="bg-main h-full " style="width: {{$preg}}%;"></div> <!-- مثال: تقدم بنسبة 70% -->
                    </div>
                    <span class="ms-4 text-lg text-main font-medium right__content">{{$preg}}%</span>
                </div>
                <form action="{{route('site.select_services')}}" method="post">
                    <div class="flex flex-col justify-start items-start mt-6">
                        <span class="text-base me-4 mb-4">Idea Requirements</span>
                        @foreach ($requirements as $requirement)
                        <label class="bottom__content flex items-center mb-4">
                            <input type="checkbox" name="requirements[{{ $requirement->id }}]" value="{{ $requirement->$name }}" class="appearance-none peer w-4 h-4 border border-dark rounded-full checked:bg-second checked:border-second focus:outline-none" {{ $requirement->answers->where('answer', 'yes')->first() != null ? 'checked' : '' }}>
                            <span class="ml-2 text-base font-light">{{ $requirement->$name }}</span>
                        </label>
                        @endforeach
                    </div>
                    <div class="relative mb-3 w-full flex justify-center right__content">
                        <button type="submit" class="mt-2 inline-block px-16 py-4 text-white bg-main hover:bg-second hover:-translate-y-1 focus:bg-second active:bg-second transition-all duration-150 ease-in-out">
                            Buy
                        </button>
                    </div>
                </form>
            </div>
            <div class="right__content w-full bg-[#F5F5F5] p-10 mt-4">
                <h2 class="text-2xl font-semibold text-main uppercase mb-4 right__content">Free Consultation</h2>
                <p class="text-dark font-light text-base leading-6 mb-4 right__content">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.
                    Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>
                <div class="relative mb-3 w-full flex justify-center md:justify-start bottom__content">
                    <a href="./free_consultation.html" class="mt-2 inline-block px-16 py-4 text-white bg-main hover:bg-second hover:translate-x-2 focus:bg-second active:bg-second transition-all duration-150 ease-in-out">
                        consultation
                    </a>
                </div>
            </div>
        </div>
    </section>

@stop

@section('scripts')
