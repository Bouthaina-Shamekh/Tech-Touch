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
                <li class="text-neutral-400">{{__('admin.Free Consultation')}}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Content -->
<section class="my-20">
    <div class="container">
        <!-- Form -->
        <div class="flex flex-col justify-start items-start md:items-center img-about">
            <h2 class="text-5xl font-semibold text-main uppercase mb-4 top__form">{{ __('site.Provide us with information') }}</h2>
            <form action="{{route('site.consultation_data')}}" method="post" class="w-full flex flex-wrap justify-between items-center text-center md:text-left my-8 gap-4 content-second">
                @csrf
                <div class="grid grid-cols-12 gap-4 w-full">
                    <div class="left__form col-span-12 md:col-span-6">
                        <div class="relative mb-3">
                            <label for="exampleFormControlInputText" class="leading-[1.6] text-neutral-300">
                                {{ __('site.First Name') }} *
                            </label>
                            <input type="text" name="first_name" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                        </div>
                    </div>
                    <div class="right__form col-span-12 md:col-span-6">
                        <div class="relative mb-3 flex-auto">
                            <label for="exampleFormControlInputText" class="leading-[1.6] text-neutral-300">
                                {{ __('site.Last Name') }} *
                            </label>
                            <input type="text" name="last_name" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                        </div>
                    </div>
                    <div class="left__form col-span-12 md:col-span-6">
                        <div class="relative mb-3 flex-auto">
                            <label for="exampleFormControlInputText" class="leading-[1.6] text-neutral-300">
                                {{ __('site.Your Email') }} *
                            </label>
                            <input type="email" name="email" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                        </div>
                    </div>
                    <div class="right__form col-span-12 md:col-span-6">
                        <div class="relative mb-3 flex-auto">
                            <label for="exampleFormControlInputText" class="leading-[1.6] text-neutral-300">
                                {{ __('site.Phone Number') }} *
                            </label>
                            <input type="number" name="phone" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                        </div>
                    </div>

                    <div class="left__form col-span-12">
                        <div class="relative mb-3">
                            <label for="consultation" class="leading-[1.6] text-neutral-300">
                                {{ __('site.Consultation') }} *
                            </label>
                            <textarea name="consultation" id="consultation" rows="6" class="peer block min-h-[auto] w-full border-0 bg-[#F5F5F5] px-3 py-4 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary" ></textarea>
                        </div>
                    </div>


                </div>
                <div class="bottom__form relative mb-3 w-full flex justify-center">
                    <button
                        type="submit"
                        class=" mt-2 inline-block px-16 py-4 text-white bg-main hover:bg-second hover:-translate-y-2 focus:bg-second active:bg-second transition-all duration-150 ease-in-out">
                        {{ __('site.Order now') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>


<button
    type="button"
    id="orderDoneModalButton"
    class="hidden"
    data-twe-toggle="modal"
    data-twe-target="#orderDoneModal"
    data-twe-ripple-init
    data-twe-ripple-color="light">
    DoneModal
</button>
<!--Vertically centered modal-->
<div data-twe-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="orderDoneModal" tabindex="-1" aria-labelledby="orderDoneModalTitle" aria-modal="true" role="dialog">
    <div data-twe-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-8 min-[576px]:max-w-[500px] min-[992px]:max-w-[666px] my-5 mx-4">
        <div class="pointer-events-auto relative flex w-full flex-col border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
            <!-- Modal body -->
            <div class="relative p-4">
                <div class="flex flex-col justify-center items-center my-10">
                    <div class="my-2">
                        <img src="../asset/img/extra/done.png" alt="Order Done" loading="lazy" />
                    </div>
                    <span class="font-light w-2/3 text-center my-4">{{ __('site.Your Request Has Been Sent Successfully, You Will Receive A Message From Us As Soon As Possible.') }}</span>
                    <button type="button" id="DoneModalButtonClose" class="mt-8 inline-block px-16 py-4 text-white bg-main hover:bg-second hover:-translate-y-2 focus:bg-second active:bg-second transition-all duration-150 ease-in-out">
                        {{ __("site.Done") }}
                    </button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    @if(session() -> has('successSend'))
    $(document).ready(function() {
        $('#orderDoneModalButton').click();
    })
    @endif
    $(document).ready(function () {
        $('#DoneModalButtonClose').on('click',function () {
            $('#orderDoneModal').modal('hide');
        });
    })
</script>

<script src="{{ asset('asset/js/pages/pagesScroller.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>

@endsection