@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
@endphp



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
                <li class="text-neutral-400">Services</li>
            </ol>
        </nav>
    </div>
</div>


@section('content')

 <!-- Content -->
 <section>
    <div class="container my-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            @foreach ($service as $service)


            <div class="left__card col-span-1">
                <div class="flex justify-between items-center gap-4 bg-[#F7F7F7] h-full p-3">
                    <div class="flex items-center justify-center img__card">
                        <img src="{{asset("storage/" . $service->image)}}" alt="service" class="w-3/4">
                    </div>
                    <div class="content__card flex flex-col flex-1 justify-start items-start my-4">
                        <h3 class="text-3xl font-medium text-second mb-4">{{$service->name_en}}</h3>
                        <p class="text-second font-light text-base leading-6">{{$service->description_en}}</p>
                        <a href="./services_show.html" class="my-2 text-main underline hover:pl-2 transition-all delay-150 ease-in">
                            Read MORE
                        </a>
                    </div>
                </div>
            </div>
            <div class="right__card col-span-1">
                <div class="flex justify-between items-center gap-4 bg-[#F7F7F7] h-full p-3">
                    <div class="flex items-center justify-center img__card">
                        <img src="../asset/img/extra/services-02.png"  alt="service" class="w-3/4">
                    </div>
                    <div class="content__card flex flex-col flex-1 justify-start items-start my-4">
                        <h3 class="text-3xl font-medium text-second mb-4">Training</h3>
                        <p class="text-second font-light text-base leading-6">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt</p>
                        <a href="./services_show.html" class="my-2 text-main underline hover:pl-2 transition-all delay-150 ease-in">
                            Read MORE
                        </a>
                    </div>
                </div>
            </div>

            @endforeach




        </div>
    </div>
</section>


@stop