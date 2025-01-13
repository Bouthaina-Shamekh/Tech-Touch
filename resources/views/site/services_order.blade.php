@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
@endphp

@section('content')

    <!-- Breadcrumb -->
    <div class="w-full py-3 bg-[#F5F5F5]">
        <div class="container">
            <nav class="w-full rounded-md">
                <ol class="list-reset flex">
                    <li>
                        <a href="{{route('site.index')}}" class="text-main transition duration-150 ease-in-out hover:text-main focus:text-main active:text-main motion-reduce:transition-none ">
                            {{__('admin.Home')}}
                        </a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-400">/</span>
                    </li>
                    <li>
                        <a href="{{route('site.services')}}" class="text-main transition duration-150 ease-in-out hover:text-main focus:text-main active:text-main motion-reduce:transition-none ">
                            {{__('admin.Services')}}
                        </a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-400">/</span>
                    </li>
                    <li class="text-neutral-400">Order Services</li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="my-6">
        <div class="container">
            <h2 class="text-5xl font-semibold text-main uppercase mb-2 left__title">{{$service->$name}}</h2>
            <form class="flex flex-wrap justify-between items-center text-center md:text-left my-8 gap-4"  >
                <div class="relative mb-3 w-full top__form">
                    <label for="exampleFormControlInputText" class=" leading-[1.6] text-neutral-300">
                        {{ __('site.Name') }} *
                    </label>
                    <input type="text" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                </div>
                <div class="relative mb-3 flex-auto left__form">
                    <label for="exampleFormControlInputText" class=" leading-[1.6] text-neutral-300">
                        {{ __('site.Your Email') }} *
                    </label>
                    <input type="text" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label"/>
                </div>
                <div class="relative mb-3 flex-auto right__form">
                    <label for="exampleFormControlInputText" class=" leading-[1.6] text-neutral-300">
                        {{ __('site.Phone Number') }} *
                    </label>
                    <input type="text" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                </div>
                <div class="relative mb-3 w-full bottom__form">
                    <label for="exampleFormControlInputText" class=" leading-[1.6] text-neutral-300">
                        {{ __('site.Your Note') }} *
                    </label>
                    <textarea
                        class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                        id="exampleFormControlTextarea1"
                        rows="5"
                        placeholder="Your message"></textarea>
                </div>
                <div class="relative mb-3 w-full flex justify-center bottom__form">
                    <button type="submit" class="mt-2 inline-block px-16 py-4 text-white bg-main hover:bg-second hover:mt-4 focus:bg-second active:bg-second transition-all duration-150 ease-in-out">{{ __("site.Send") }}</button>
                </div>
            </form>
        </div>
    </section>
@stop
@section('scripts')

<script src="{{ asset('asset/js/pages/pagesScroller2.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>

@endsection
