@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
$title = 'title_' . app()->currentLocale();
$description = 'description_' . app()->currentLocale();
$feature = 'feature_'.app()->currentLocale();
@endphp

@push('styles')
    <link rel="stylesheet" href="{{ asset('asset/css/pages/about.css') }}">
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
                    <li class="text-neutral-400">About</li>
                </ol>
            </nav>
        </div>
    </div>

        <!-- Content -->
        <section class="my-6 relative lg:h-20" >
            <div class="container w-full">
                <div class="flex justify-between items-center md:items-start text-center md:text-left">
                    <!-- Img -->
                    <div class="img__about hidden lg:flex lg:justify-center img-about" style="flex: 1 1 40%;">
                        <div class="hexagon-container">
                            <!-- SVG للشكل السداسي بحدود متقطعة -->
                            <svg width="620" height="590" viewBox="0 0 100 100">
                                <polygon points="25,6.7,75 6.7,100 50,75 93.3,25 93.3,0 50" fill="none" stroke="#43516D" stroke-width="0.3" stroke-dasharray="0.7" />
                            </svg>
                            <!-- العنصر الداخلي -->
                            <div class="hexagon-content">
                                @if ($abouts->image == null)
                                    <img src="{{asset('asset/img/extra/about-1.jpg')}}" alt=""  class="w-full h-full object-cover">
                                @else
                                    <img src="{{asset("storage/" . $abouts->image)}}" alt=""  class="w-full h-full object-cover">
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Text -->
                    <div class="content flex flex-col  flex-1/2 justify-start items-center md:items-start">
                        <h2 class="text__about text-3xl md:text-5xl font-semibold text-main uppercase mb-2">{{$abouts->$name}}</h2>
                        <h3 class="text__about text-xl md:text-3xl font-semibold text-second uppercase mb-2">{{$abouts->$title}}</h3>
                        <p class="text__about text-dark font-light text-base leading-6">{{$abouts->$description}}</p>
                        {{-- <p class="text__about text-dark  font-light  text-base leading-6">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p> --}}
                        <div class="flex flex-wrap justify-center md:justify-between items-center  gap-4 contant-hexagon my-4">
                            <div class="card__about hexagon-container w-[70%] md:w-[30%]">
                                <!-- SVG للشكل السداسي بحدود متقطعة -->
                                <svg width="100%" height="100%" viewBox="0 0 100 100">
                                    <polygon points="25,6.7,75 6.7,100 50,75 93.3,25 93.3,0 50" fill="none" stroke="#D2D2D2"
                                    stroke-width="0.5" stroke-dasharray="0" />
                                </svg>
                                <!-- العنصر الداخلي -->
                                <div class="hexagon-content flex flex-col">
                                    <span class="text-7xl font-semibold text-main mb-2 counter" data-target="{{$partnersCount}}">{{$partnersCount}}</span>
                                    <span class="text-xl font-semibold text-second ">{{ __('site.Partners') }}</span>
                                </div>
                            </div>
                            <div class="card__about hexagon-container w-[70%] md:w-[30%]">
                                <!-- SVG للشكل السداسي بحدود متقطعة -->
                                <svg width="100%" height="100%" viewBox="0 0 100 100">
                                    <polygon points="25,6.7,75 6.7,100 50,75 93.3,25 93.3,0 50" fill="none" stroke="#D2D2D2" stroke-width="0.5" stroke-dasharray="0" />
                                </svg>
                                <!-- العنصر الداخلي -->
                                <div class="hexagon-content flex flex-col">
                                    <span class="text-7xl font-semibold text-main mb-2 counter" data-target="{{$teamCount}}">{{$teamCount}}</span>
                                    <span class="text-xl font-semibold text-second ">{{ __('site.Employees') }}</span>
                                </div>
                            </div>
                            <div class="card__about hexagon-container w-[70%] md:w-[30%]">
                                <!-- SVG للشكل السداسي بحدود متقطعة -->
                                <svg width="100%" height="100%" viewBox="0 0 100 100">
                                    <polygon points="25,6.7,75 6.7,100 50,75 93.3,25 93.3,0 50" fill="none" stroke="#D2D2D2" stroke-width="0.5" stroke-dasharray="0" />
                                </svg>
                                <!-- العنصر الداخلي -->
                                <div class="hexagon-content flex flex-col">
                                    <span class="text-7xl font-semibold text-main mb-2 counter" data-target="{{$workCount}}">{{$workCount}}</span>
                                    <span class="text-xl font-semibold text-second ">{{ __('site.Projects') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="my-20">
            <div class="container">
                <div class="flex flex-wrap justify-between items-start">
                    <!-- Text -->
                    <div class="flex flex-col flex-1/2 justify-start items-center md:items-start text-justify md:text-left md:pr-8 content-second ">
                        <h2 class="left__section__second text-3xl font-semibold text-main uppercase mb-4">{{ $goals->$name}}</h2>
                        <p class="left__section__second text-dark font-light text-base leading-6">{{ $goals->$description}}</p>
                        <div class="flex flex-col justify-start items-center md:items-start mt-10">
                            <h2 class="left__section__second text-3xl font-semibold text-main uppercase mb-4">{{$item->$name}}</h2>
                            <p class="left__section__second text-dark font-light text-base leading-6">{{ $goals->$description}} </p>
                            <ul class="list-inside list-image-[url(../img/icon/Icon-material-done.png)] mt-4">
                                @foreach ($features as $features )
                                <li class="left__section__second text-dark font-light text-base ">{{$features->$feature}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Video -->
                    <div class="flex flex-col md:justify-start img-about" style="flex: 1 1 40%;">
                        <h2 class="top__section_second text-7xl font-semibold text-main uppercase mb-2">{{ __('site.Video') }}</h2>
                        <h3 class="top__section_second text-3xl font-semibold text-second uppercase mb-8">{{ __('site.Demonstration') }}</h3>
                        <div class="img__section__second hexagon-container" data-twe-toggle="modal" data-twe-target="#viewVideo" data-twe-ripple-init data-twe-ripple-color="light">
                            <!-- SVG للشكل السداسي بحدود متقطعة -->
                            <svg viewBox="0 0 100 100">
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






    <div data-twe-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="viewVideo" tabindex="-1" aria-labelledby="viewVideoLabel" aria-hidden="true">
        <div data-twe-modal-dialog-ref
            class="pointer-events-none w-full h-full flex items-center justify-center relative translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out">
            <div
                class="pointer-events-auto relative flex w-[75%] flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                <!-- Modal body -->
                <div class="relative flex-auto p-4" data-twe-modal-body-ref>
                    {{-- <video width="100%" class="w-full object-cover" controls >
                        <source src="{{$abouts->video}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> --}}
                    <div class="video-container">
                        <span>{{$abouts->video}}</span>
                        <iframe width="100%" height="700" src="https://www.youtube.com/embed/{{$abouts->video}}" title="خسارة تعيش حياة عادية | د.حازم شومان" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>

        @media (max-width: 780px) {
            .hexagon-container{
                width: 320px !important;
                height: 300px !important;
            }
            .hexagon-container svg{
                width: 320px !important;
                height: 300px !important;
            }
            .hexagon-container .hexagon-content{
                width: 285px !important;
                height: 285px !important;
            }
            .\!w-\[70\%\]{
                width: 70% !important;
            }
        }
    </style>
@stop
    <!-- Footer -->


    @section('scripts')

    <script src="{{ asset('asset/js/pages/pagesScroller.js') }}"></script>
    <script src="{{ asset('asset/js/pages/about.js') }}"></script>
    
    @endsection




