
@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
@endphp

@section('content')

    <!-- Header -->


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
                    <li class="text-neutral-400">Files</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content -->
    <section class="my-10">
        <div class="container">
            <div class="grid grid-cols-12 gap-4 my-8">
                {{-- <div class="card__files col-span-12 md:col-span-6 lg:col-span-4 flex flex-col justify-start items-start"> --}}
                    {{-- <div class="bg-[#F7F7F7] w-full mt-2 p-4"> --}}
                        {{-- <div class="flex flex-col justify-start items-start my-4 pl-3">
                            <h4 class="text-3xl text-black mb-4">
                                <i class="left__file fa-solid fa-file text-[#818B90] me-2"></i>
                                <span class="left__file">File Name</span>
                            </h4>
                            <p class="text-dark font-light text-base left__file">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sedss Diam Nonumy </p>
                            <div class="flex justify-start items-center gap-4 mt-4">
                                <span class="text-main font-light text-lg bottom__file">$23.00</span>
                                <a href="./file_single.html" class="bottom__file px-4 py-2 flex items-center justify-center bg-main text-white hover:bg-second hover:ml-2 transition-all delay-200 ease-out">
                                    <span>BUY</span>
                                </a>
                            </div>
                        </div> --}}
                    {{-- </div> --}}
                {{-- </div> --}}


            @foreach ( $file as $file )
                <div class="card__files col-span-12 md:col-span-6 lg:col-span-4 flex flex-col justify-start items-start">
                    <div class="bg-[#F7F7F7] w-full mt-2 p-4">
                        <div class="flex flex-col justify-start items-start my-4 pl-3">
                            <h4 class="text-3xl text-black mb-4">
                                <i class="left__file fa-solid fa-file text-[#818B90] me-2"></i>
                                <span class="left__file">{{$file->file_name_en}}</span>
                            </h4>
                            <p class="text-dark font-light text-base left__file">{{$file->description_en}} </p>
                            <div class="flex justify-start items-center gap-4 mt-4">
                                <span class="text-main font-light text-lg bottom__file">${{$file->price}}</span>
                                <a href="./file_single.html" class="bottom__file px-4 py-2 flex items-center justify-center bg-main text-white hover:bg-second hover:ml-2 transition-all delay-200 ease-out">
                                    <span>BUY</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach


            </div>
            <div class="w-full flex justify-center items-center gap-4">
                <button class="bottom__files w-5 h-5 p-5 rounded-full bg-transparent border border-[#818B90] hover:bg-main hover:border-main hover:text-white hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                    <i class="fa-solid fa-angles-left"></i>
                </button>
                <a href="#" class="bottom__files w-5 h-5 p-5 rounded-full bg-transparent text-[#818B90] border border-[#818B90] hover:bg-main hover:border-main hover:text-white hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                    <i class="fa-solid fa-1"></i>
                </a>
                <a href="#" class="bottom__files w-5 h-5 p-5 rounded-full bg-main text-white border border-[#818B90] hover:bg-main hover:border-main hover:text-white hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                    <i class="fa-solid fa-2"></i>
                </a>
                <a href="#" class="bottom__files w-5 h-5 p-5 rounded-full bg-transparent text-[#818B90] border border-[#818B90] hover:bg-main hover:border-main hover:text-white hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                    <i class="fa-solid fa-3"></i>
                </a>
                <button class="bottom__files w-5 h-5 p-5 rounded-full bg-transparent border border-[#818B90] hover:bg-main hover:border-main hover:text-white hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                    <i class="fa-solid fa-angles-right"></i>
                </button>
            </div>
        </div>
    </section>




    @stop




    <!-- JS Scripts -->


