@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
@endphp
@push('styles')
    <link rel="stylesheet" href="{{ asset('asset/css/pages/from.css') }}">
@endpush

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
                    <li class="text-neutral-400">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Content -->
    <section class="my-20">
        <div class="container">
            <div class="flex flex-wrap justify-between items-start gap-20">
                <!-- Text -->
                <div class="flex flex-col flex-1/2 justify-start items-center md:items-start text-center md:text-left pr-8 content-second">
                    <h2 class="top__contact text-3xl font-semibold text-main uppercase mb-4">Get in touch with us</h2>
                    <p class="text__contact text-dark font-light text-base leading-6">{!! $settings->where('key', 'about_en')->first()->value ?? '' !!}</p>
                    <div class="flex flex-col justify-start items-center md:items-start mt-10">
                        <div class="text__contact flex justify-start items-center mb-4">
                            <i class="fa-regular fa-envelope  text-3xl text-main me-8"></i>
                            <span class="text-xl text-dark">{!! $settings->where('key', 'contact_email')->first()->value ?? '' !!}</span>
                        </div>
                        <div class="text__contact flex justify-start items-center mb-4">
                            <i class="fa-solid fa-phone  text-3xl text-main me-8"></i>
                            <span class="text-xl text-dark">{{$settings->where('key', 'phone')->first()->value ?? '' }}</span>
                        </div>
                        <div class="text__contact flex justify-start items-center mb-4">
                            <i class="fa-solid fa-headphones-simple  text-3xl text-main me-8"></i>
                            <span class="text-xl text-dark">
                                {{$settings->where('key', 'location')->first()->value ?? '' }}
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                <div class="hidden md:flex flex-col md:justify-start img-about" style="flex: 1 1 40%;">
                    <form action="{{route('site.contact_data')}}" method="post" class="flex flex-wrap justify-between items-center text-center md:text-left my-8 gap-4 content-second"  >
                        @csrf
                        <div class="top__contact relative mb-3 w-full ">
                            <label for="exampleFormControlInputText" class="leading-[1.6] text-neutral-300">
                                {{ __("site.Name") }} *
                            </label>
                            <input  name="name" type="text" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                        </div>
                        <div class="right__contact relative mb-3 flex-auto">
                            <label for="exampleFormControlInputText" class="leading-[1.6] text-neutral-300">
                                {{ __("site.Your Email") }} *
                            </label>
                            <input  name="email" type="email" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label"/>
                        </div>
                        <div class="right__contact relative mb-3 flex-auto">
                            <label for="exampleFormControlInputText" class=" leading-[1.6] text-neutral-300 ">
                                {{ __('site.Phone Number') }} *
                            </label>
                            <input name="phone" type="number" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />

                        </div>
                        <div class="bottom__contact relative mb-3 w-full">
                            <label for="exampleFormControlInputText" class=" leading-[1.6] text-neutral-300 ">
                                {{ __('site.Message') }} *
                            </label>
                            <textarea
                                class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" name="message"
                                id="exampleFormControlTextarea1"
                                rows="5"
                                placeholder="Your message"></textarea>

                        </div>
                        <div class="bottom__contact relative mb-3 w-full flex justify-start">
                            <button type="submit" class="mt-2 inline-block px-16 py-4 text-white bg-main hover:bg-second hover:ml-4 focus:bg-second active:bg-second transition-all duration-150 ease-in-out">
                                {{ __("site.Send Messages") }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <button
    type="button"
    id="DoneModalButton"
    class="hidden"
    data-twe-toggle="modal"
    data-twe-target="#DoneModal"
    data-twe-ripple-init
    data-twe-ripple-color="light">
        DoneModal
    </button>
    <!--Vertically centered modal-->
    <div data-twe-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="DoneModal" tabindex="-1" aria-labelledby="DoneModalTitle" aria-modal="true" role="dialog">
        <div data-twe-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-8 min-[576px]:max-w-[500px] min-[992px]:max-w-[666px] my-5 mx-4">
            <div class="pointer-events-auto relative flex w-full flex-col border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                <!-- Modal body -->
                <div class="relative p-4">
                    <div class="flex flex-col justify-center items-center my-10">
                        <div class="my-2">
                            <img src="../asset/img/extra/done.png" alt="Order Done" loading="lazy" />
                        </div>
                        <span class="font-light w-2/3 text-center my-4">Your Request Has Been Sent Successfully, You Will Receive A Message From Us As Soon As Possible.</span>
                        <button
                            type="button"
                            class="mt-8 inline-block px-16 py-4 text-white bg-main hover:bg-second hover:-translate-y-2 focus:bg-second active:bg-second transition-all duration-150 ease-in-out"
                            data-twe-modal-dismiss
                            data-twe-ripple-init
                            data-twe-ripple-color="light">
                            Done
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @stop
    <!-- Footer -->

@section('scripts')
<script>
    @if (session()->has('successSend'))
        $(document).ready(function () {
            $('#DoneModalButton').click();
        })
    @endif
</script>
<script src="{{ asset('asset/js/pages/pagesScroller.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>

@endsection
