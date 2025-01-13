
@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
$file_name = 'file_name_' . app()->currentLocale();
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
                        <a href="{{route('site.files')}}" class="text-main transition duration-150 ease-in-out hover:text-main focus:text-main active:text-main motion-reduce:transition-none ">
                            {{__('admin.Files')}}
                        </a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-400">/</span>
                    </li>
                    <li class="text-neutral-400">{{$file->$file_name}}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content -->
    <section class="my-28">
        <div class="container">
            <div class="flex flex-wrap justify-between items-center md:items-start text-center md:text-left gap-20">
                <!-- Img -->
                <div class="img__files animate-oscillate hidden md:flex md:justify-start img-about border-4 border-main" style="flex: 1 1 40%;">
                    @if($file->image == null)
                        <img src="{{asset('asset/img/extra/services-show.png')}}" alt="" class="translate-x-5 translate-y-5">
                    @else
                        <img src="{{asset("storage/" .  $file->image)}}" alt="" class="translate-x-5 translate-y-5">
                    @endif
                </div>
                <!-- Text -->
                <div class="flex flex-col  flex-1/2 justify-start items-center md:items-start content">
                    <h2 class="top__files text-3xl md:text-5xl font-semibold text-main uppercase mb-2">
                        <i class="text-2xl md:text-4xl fa-solid fa-file text-[#818B90] me-2"></i>
                        {{$file->$file_name}}
                    </h2>
                    <p class="text__files text-dark font-light text-base leading-6">{!!$file->$description!!}</p>
                    <div class=" flex flex-col justify-start items-start ">
                        <h3 class="text-xl text-second my-4 bottom__files">{{__('Price')}}</h3>
                        <span class="text-3xl text-second font-light bottom__files">${{$file->price}}</span>
                    </div>
                    <a href="{{asset($file->file)}}" target="_blank" download="" class="bottom__files mt-4 inline-block px-10 py-3 text-white bg-main hover:bg-second hover:ml-2 focus:bg-second active:bg-second transition-all duration-2 50 ease-in-out">
                        {{__('siDownload')}}
                    </a>
                </div>
            </div>
        </div>
    </section>

    @stop

    @section('scripts')
    <script>
        // img__files , top__files text__files
        sr.reveal(`.top__files`);
        sr.reveal(`.img__files`, { origin: 'left' });
        sr.reveal(`.text__files`, { origin: 'right' });
        sr.reveal(`.bottom__files`, { interval: 100,origin: 'bottom' }); // عدة عناصر والانتظار بينهم
    </script>
    @endsection

