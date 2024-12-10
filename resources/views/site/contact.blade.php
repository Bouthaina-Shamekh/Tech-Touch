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
                        <a href="../index.html" class="text-main transition duration-150 ease-in-out hover:text-main focus:text-main active:text-main motion-reduce:transition-none ">
                            Home
                        </a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-400">/</span>
                    </li>
                    <li class="text-neutral-400">Contact</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content -->
    <section class="my-20">
        <div class="container">
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
            <div class="flex flex-wrap justify-between items-start gap-20">
                <!-- Text -->
                <div class="flex flex-col flex-1/2 justify-start items-center md:items-start text-center md:text-left pr-8">
                    <h2 class="top__contact text-3xl font-semibold text-main uppercase mb-4">Get in touch with us</h2>
                    <p class="text__contact text-dark font-light text-base leading-6">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore</p>
                    <div class="flex flex-col justify-start items-center md:items-start mt-10">
                        <div class="text__contact flex justify-start items-center mb-4">
                            <i class="fa-regular fa-envelope  text-3xl text-main me-8"></i>
                            <span class="text-xl text-dark">Gizmos@Example.Com</span>
                        </div>
                        <div class="text__contact flex justify-start items-center mb-4">
                            <i class="fa-solid fa-phone  text-3xl text-main me-8"></i>
                            <span class="text-xl text-dark">(+55) 654 - 545 - 5418</span>
                        </div>
                        <div class="text__contact flex justify-start items-center mb-4">
                            <i class="fa-solid fa-headphones-simple  text-3xl text-main me-8"></i>
                            <span class="text-xl text-dark">
                                Monday To Friday: 9Am-9Pm <br>
                                Saturday To Sunday: 9Am-10Pm
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                <div class="hidden md:flex flex-col md:justify-start img-about" style="flex: 1 1 40%;">
                    <form action="{{route('site.contact_data')}}" method="post" class="flex flex-wrap justify-between items-center text-center md:text-left my-8 gap-4"  >
                        @csrf
                        <div class="top__contact relative mb-3 w-full " data-twe-input-wrapper-init>
                            <input  name="name" type="text" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                            <label for="exampleFormControlInputText" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-4 leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                Name *
                            </label>
                        </div>
                        <div class="right__contact relative mb-3 flex-auto" data-twe-input-wrapper-init>
                            <input  name="email" type="email" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label"/>
                            <label for="exampleFormControlInputText" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-4 leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                Your Email *
                            </label>
                        </div>
                        <div class="right__contact relative mb-3 flex-auto" data-twe-input-wrapper-init>
                            <input name="phone" type="text" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                            <label for="exampleFormControlInputText" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-4 leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                Phone Number *
                            </label>
                        </div>
                        <div class="bottom__contact relative mb-3 w-full" data-twe-input-wrapper-init>
                            <textarea
                                class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" name="message"
                                id="exampleFormControlTextarea1"
                                rows="5"
                                placeholder="Your message"></textarea>
                            <label for="exampleFormControlInputText" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-4 leading-[1.6] text-neutral-300 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
                                Message *
                            </label>
                        </div>
                        <div class="bottom__contact relative mb-3 w-full flex justify-start">
                            <button type="submit" class="mt-2 inline-block px-16 py-4 text-white bg-main hover:bg-second hover:ml-4 focus:bg-second active:bg-second transition-all duration-150 ease-in-out">Send Messages</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    @stop
    <!-- Footer -->

@section('scripts')
<script>
    sr.reveal(`.top__contact`);
    sr.reveal(`.text__contact`, { origin: 'left' });
    sr.reveal(`.right__contact`, { origin: 'right' });
    sr.reveal(`.bottom__contact`, { origin: 'bottom' });
</script>
@endsection
