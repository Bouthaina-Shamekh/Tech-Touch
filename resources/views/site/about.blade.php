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
                    <li class="text-neutral-400">About</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content -->
   @include('site.parts.about')


    <section class="my-20">
        <div class="container">
            <div class="flex flex-wrap justify-between items-start">
                <!-- Text -->
                <div class="flex flex-col flex-1/2 justify-start items-center md:items-start text-center md:text-left pr-8">
                    <h2 class="left__section__second text-3xl font-semibold text-main uppercase mb-4">Our goals</h2>
                    <p class="left__section__second text-dark font-light text-base leading-6">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod</p>
                    <div class="flex flex-col justify-start items-center md:items-start mt-10">
                        <h2 class="left__section__second text-3xl font-semibold text-main uppercase mb-4">Our features</h2>
                        <p class="left__section__second text-dark font-light text-base leading-6">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna </p>
                        <ul class="list-inside list-image-[url(../img/icon/Icon-material-done.png)] mt-4">
                            <li class="left__section__second text-dark font-light text-base ">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr,</li>
                            <li class="left__section__second text-dark font-light text-base ">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr,</li>
                            <li class="left__section__second text-dark font-light text-base ">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr,</li>
                        </ul>
                    </div>
                </div>
                <!-- Video -->
                <div class="hidden md:flex flex-col md:justify-start img-about" style="flex: 1 1 40%;">
                    <h2 class="top__section_second text-7xl font-semibold text-main uppercase mb-2">Video</h2>
                    <h3 class="top__section_second text-3xl font-semibold text-second uppercase mb-8">Demonstration</h3>
                    <div class="img__section__second hexagon-container">
                        <!-- SVG للشكل السداسي بحدود متقطعة -->
                        <svg width="620" height="590" viewBox="0 0 100 100">
                            <polygon points="25,6.7,75 6.7,100 50,75 93.3,25 93.3,0 50" fill="none" stroke="#43516D" stroke-width="0.3" stroke-dasharray="0.7" />
                        </svg>
                        <!-- العنصر الداخلي -->
                        <div class="hexagon-content">
                            <img src="../asset/img/extra/about-2.png" style="transform:rotate(90deg);" alt=""  class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @stop
    <!-- Footer -->






