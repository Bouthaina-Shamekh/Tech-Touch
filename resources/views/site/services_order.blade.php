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
                            Home
                        </a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-400">/</span>
                    </li>
                    <li>
                        <a href="{{route('site.services')}}" class="text-main transition duration-150 ease-in-out hover:text-main focus:text-main active:text-main motion-reduce:transition-none ">
                            Services
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

    <!-- Content -->
    <style>
        /* edit input in forms */
        [data-twe-input-notch-ref] {
            /* direction: rtl; */
            border: none;
        }
        [data-twe-input-notch-leading-ref],[data-twe-input-notch-middle-ref],[data-twe-input-notch-trailing-ref]
        {
            border: transparent !important;
        }
    </style>
    <section class="my-6">
        <div class="container">
            <h2 class="text-5xl font-semibold text-main uppercase mb-2 left__title">{{$service->$name}}</h2>
            <form class="flex flex-wrap justify-between items-center text-center md:text-left my-8 gap-4"  >
                <div class="relative mb-3 w-full top__form" data-twe-input-wrapper-init>
                    <input type="text" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                    <label for="exampleFormControlInputText" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-4 leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                        Name *
                    </label>
                </div>
                <div class="relative mb-3 flex-auto left__form" data-twe-input-wrapper-init>
                    <input type="text" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label"/>
                    <label for="exampleFormControlInputText" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-4 leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                        Your Email *
                    </label>
                </div>
                <div class="relative mb-3 flex-auto right__form" data-twe-input-wrapper-init>
                    <input type="text" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                    <label for="exampleFormControlInputText" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-4 leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                        Phone Number *
                    </label>
                </div>
                <div class="relative mb-3 w-full bottom__form" data-twe-input-wrapper-init>
                    <textarea
                        class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                        id="exampleFormControlTextarea1"
                        rows="5"
                        placeholder="Your message"></textarea>
                    <label for="exampleFormControlInputText" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-4 leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                        Your Note *
                    </label>
                </div>
                <div class="relative mb-3 w-full flex justify-center bottom__form">
                    <button type="submit" class="mt-2 inline-block px-16 py-4 text-white bg-main hover:bg-second hover:mt-4 focus:bg-second active:bg-second transition-all duration-150 ease-in-out">Send</button>
                </div>
            </form>
        </div>
    </section>
@stop
@section('scripts')
    <script>
        // left__title , top__form , left__form , right__form , bottom__form
        sr.reveal(`.top__form `);
        sr.reveal(`.left__title , .left__form`, { origin: 'left' , interval: 100 });
        sr.reveal(`.right__form`, { origin: 'right' });
        sr.reveal(`.bottom__form`, { origin: 'bottom' , interval: 100 });
    </script>
@endsection
