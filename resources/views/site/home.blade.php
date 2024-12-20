
@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
$file_name = 'file_name_' . app()->currentLocale();
$title = 'title_' . app()->currentLocale();
$description = 'description_' . app()->currentLocale();
@endphp

@section('content')
    <!-- hero -->
    <section class="hero mt-32 mb-36 md:mt-12 md:mb-32 relative">
        <div class="container">
            <div class="flex flex-wrap justify-between items-center text-center md:text-left">
                <!-- Text -->
                <div class="text__hero flex flex-col  flex-1/2 justify-start items-center md:items-start">
                    <h1 class="text-5xl md:text-[5rem] font-bold">
                        <span class="text-second">Test Your</span>
                        <br class="block md:hidden">
                        <span class="text-main h-[67px] block md:inline" id="typewriter_hero"></span>
                        <!-- الكلمات مخزنة في HTML -->
                        @foreach ( $sliders as $slide)
                        <div id="word-list" class="hidden">
                            <span>{{$slide->name_en}}</span>
                        </div>
                        @endforeach
                    </h1>
                    @foreach ( $sliders as $index => $slide)
                    <div id="hero-texts" class="relative space-y-4 mt-4">
                        <p class="hero-paragraph font-light leading-6 text-xl md:text-2xl text-dark {{ $index > 0 ? 'hidden' : '' }}">
                            {!!$slide->description_en!!}
                        </p>
                    </div>
                    @endforeach
                    <div class="relative mb-3 w-full flex justify-center md:justify-start my-8">
                        <a href="{{route('site.test_idea')}}" class="mt-2 inline-block px-16 py-4 text-white bg-main hover:bg-second hover:ml-4 focus:bg-second active:bg-second transition-all duration-150 ease-in-out">
                            {{__('Start Now')}}
                        </a>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between items-center w-full">
                        <!-- شريط التقدم -->
                        <div class="relative mt-6 w-3/4">
                            <div id="progress-bar" class="absolute bottom-0 left-0 h-1 bg-main"></div>
                            <div class="h-1 bg-gray-300 w-full"></div>
                        </div>
                        <!-- أزرار التنقل -->
                        <div class="flex justify-center mt-4 space-x-2 w-1/4">
                            <button id="prev-btn" class="text-second text-4xl font-light px-3 py-1 border rounded">&#60;</button>
                            <button id="next-btn" class="text-second text-4xl font-light px-3 py-1 border rounded">&#62;</button>
                        </div>
                    </div>
                </div>
                <!-- Img -->
                <div class="img__hero animate-oscillate hidden md:flex md:justify-end md:items-center img-about" style="flex: 1 1 40%;">
                    <img src="{{asset('asset/img/extra/hero.png')}}" alt="" width="82%">
                </div>
            </div>
        </div>
        <div class="absolute -bottom-[9.25rem] -z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="533.078" viewBox="0 0 1932.943 533.078">
                <path id="Path_12185" data-name="Path 12185" d="M-10045-6720.205l-232.3-220.844-235.854,220.844-677.541-518.877-415.96,518.877-364.5-328.05" transform="translate(11974.498 7246.025)" fill="none" stroke="#f5f5f5" stroke-width="10"/>
            </svg>
        </div>
    </section>

    <!-- about -->
    @include('site.parts.about')

    <!-- Services -->

    <section class="relative my-6">
        <div class="container">
            <div class=" w-full flex flex-wrap justify-between items-center md:items-start">
                <div class="flex-1/2">
                    <h2 class="text__service text-5xl md:text-7xl font-semibold text-main uppercase mb-2">{{$services->$name}}</h2>
                    <h3 class="text__service text-xl md:text-3xl font-semibold text-second uppercase mb-2">{{$services->$title}}</h3>
                    <p class="text__service text-dark font-light text-base leading-6">{{$services->$description}}</p>
                    <div class="flex flex-col justify-start items-start my-4">
                        @foreach ($service as $item )
                        <div class="service__box flex flex-col md:flex-row justify-between items-start md:items-center gap-4 h-full p-3 border-y border-[#AEB4C0]">
                            <div class="flex items-center justify-center w-1/2  md:w-1/4">
                                <img src="{{asset("storage/" . $item->image)}}" alt="service" class="w-3/4">
                            </div>
                            <div class="flex flex-col flex-1 justify-start items-start my-4">
                                <h3 class="text-lg md:text-2xl font-medium text-second mb-4">{{$item->$name}}</h3>
                                <p class="text-second font-light text-xs md:text-sm  md:leading-6">{!!$item->$description!!}</p>
                                <a href="{{route('site.services_show', $item->id)}}" class="my-2 text-main underline hover:pl-2 transition-all delay-150 ease-in">
                                    Read MORE
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @if(count($service) >= 5)
                        <div class="service__box relative my-8 w-full flex justify-start">
                            <a href="{{route('site.services')}}" class="mt-2 inline-block px-16 py-4 text-white bg-main hover:bg-second hover:ml-4 focus:bg-second active:bg-second transition-all duration-150 ease-in-out">Show All</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="flex-1/2 hidden lg:block">
                    <div class="img__service sticky top-0 flex justify-end">
                        @if($services->image1 == null)
                        <img src="{{asset('asset/img/extra/services_home_01.png')}}" alt="extra" width="67%">
                        @else
                        <img src="{{asset("storage/" . $services->image1)}}" alt="extra" width="67%">
                        @endif
                    </div>
                    <div  class="img__service sticky top-0 bg-white flex justify-end mt-8">
                        @if($services->image2 == null)
                        <img src="{{asset('asset/img/extra/services_home_02.png')}}" alt="extra" width="67%">
                        @else
                        <img src="{{asset("storage/" . $services->image2)}}" alt="extra" width="67%">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block absolute right-0 top-0 -z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="428.808" height="836.905" viewBox="0 0 428.808 836.905">
                <path id="Path_12186" data-name="Path 12186" d="M590.7,428.808,836.905,0H0L246.2,428.808Z" transform="translate(428.808) rotate(90)" fill="#ebebeb"/>
            </svg>
        </div>
    </section>

    <!-- files -->
    <section class="my-6 relative">
        <div class="container w-full">
            <div class="flex flex-wrap justify-between items-center md:items-start text-center md:text-left">
                <!-- left -->
                <div class="flex flex-col justify-center img-about md:w-1/3 md:pr-10">
                    <h2 class="left__files text-4xl md:text-7xl font-bold text-main uppercase mb-2">
                        <span class="text-second font-bold text-3xl md:text-5xl"></span>
                        <br>
                        {{$files->$name}}
                    </h2>
                    <h3 class="left__files text-base md:text-2xl font-light text-second mb-2">{{$files->$description}}</h3>
                    <div class="left__files hidden md:block">
                        @if($files->image1 == null)
                            <img src="{{asset('asset/img/extra/files_home.png')}}" alt="extra" >
                        @else
                            <img src="{{asset("storage/" .  $files->image1)}}" alt="">
                        @endif
                    </div>
                </div>
                <!-- Right -->
                <div class="flex flex-col flex-auto justify-start items-center md:items-start  md:w-2/3 md:pl-10">
                    <div class="top__files flex flex-col md:flex-row justify-between items-center w-full">
                        <!-- شريط التقدم -->
                        <div class="relative mt-6 w-3/4">
                            <div id="progress-bar-files" class="absolute bottom-0 left-0 h-1 bg-main"></div>
                            <div class="h-1 bg-gray-300 w-full"></div>
                        </div>
                        <!-- أزرار التنقل -->
                        <div class="flex justify-center mt-4 space-x-2 w-1/4">
                            <button id="prev-btn-files" class="text-second text-4xl font-light px-3 py-1 border rounded">&#60;</button>
                            <button id="next-btn-files" class="text-second text-4xl font-light px-3 py-1 border rounded">&#62;</button>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-2 my-8" id="files_view">
                        @foreach ($file as $file )
                        <div class="card__file col-span-12 md:col-span-6 flex flex-col justify-start items-start">
                            <div class="bg-[#F7F7F7] w-full mt-2 px-2">
                                <div class="flex flex-col justify-start items-start my-4 pl-3">
                                    <h4 class="text-xl text-black mb-4">
                                        <i class="fa-solid fa-file text-[#818B90] me-2"></i>
                                        <span>{{$file->$file_name }}</span>
                                    </h4>
                                    <p class="text-dark font-light text-sm">{!!$file->$description!!} </p>
                                    <div class="flex justify-start items-center gap-4 mt-4">
                                        <span class="text-main font-light text-lg">${{$file->price}}</span>
                                        <a href="{{route('site.file_show', $file->id)}}" class="px-4 py-2 flex items-center justify-center bg-main text-white hover:bg-second hover:ml-2 transition-all delay-200 ease-out">
                                            <span>BUY</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="partial__files hidden lg:block absolute left-0 top-20 -z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="92%" viewBox="0 0 428.808 836.905">
                <path id="Path_18887" data-name="Path 18887" d="M590.7,0l246.2,428.808H0L246.2,0Z" transform="translate(428.808) rotate(90)" fill="#ebebeb"/>
            </svg>
        </div>
    </section>

    <!-- partners -->

    <section class="mt-[102px] mb-[169px] relative">
        <div class="flex justify-center items-end overflow-hidden">
            <div class="left_partners">
                <svg xmlns="http://www.w3.org/2000/svg" width="677.327" height="136.595" viewBox="0 0 677.327 136.595">
                    <path id="Path_19073" data-name="Path 19073" d="M1240.936-60H1411.7l167.822-133.595h338.742" transform="translate(-1240.936 195.095)" fill="none" stroke="#cbcbcb" stroke-width="3" stroke-dasharray="5"/>
                </svg>
            </div>
            <div class="flex flex-col justify-center items-center center__partners">
                <h3 class="text-xl md:text-3xl font-semibold text-second mb-2">Tech Touch</h3>
                <h2 class="text-5xl md:text-7xl font-semibold text-main uppercase mb-2">{{$partners->$name}} </h2>
                <p class="text-dark font-light text-base leading-6 text-center w-[140%] md:w-[165%]">{{$partners->$description}}</p>
            </div>
            <div class="right_partners">
                <svg xmlns="http://www.w3.org/2000/svg" width="677.327" height="136.595" viewBox="0 0 677.327 136.595">
                    <path id="Path_19072" data-name="Path 19072" d="M1918.263-60H1747.5L1579.678-193.595H1240.936" transform="translate(-1240.936 195.095)" fill="none" stroke="#cbcbcb" stroke-width="3" stroke-dasharray="5"/>
                </svg>
            </div>
        </div>
        <div class="container">
            <div class="flex flex-wrap justify-center items-center" style="gap: 0 70px;">
                @foreach ($partner as $partner)
                <div class="img__partners">
                    <a href="{{$partner->link}}" class="img__partners">
                        <img src="{{asset("storage/" . $partner->image)}}" alt="" width="75%" class="transition-all delay-200 ease grayscale hover:grayscale-0 hover:scale-105">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- works -->
    <section class="my-6 relative" style="background-image: url('{{asset('asset/img/extra/work_bg.png')}}">
        <div class="container py-16">
            <div class="flex flex-col justify-center items-center">
                <h3 class="text-xl md:text-4xl font-semibold text-main mb-2 text__work">{{$work->name_en}}</h3>
                <h2 class="text-3xl md:text-5xl font-semibold text-white uppercase mb-2 text__work text-center md:text-left">{{$work->title_en}}</h2>
            </div>
            <div class="swiper p-0">
                <div class="slider-wrapper">
                    <div class="swiper-wrapper top__work">
                        @foreach ($works as $work)
                        <div class="flex flex-col justify-start items-start swiper-slide">
                            <div>
                                <img src="{{asset("storage/" . $work->image)}}" alt="">
                            </div>
                            <div class="bg-[#F7F7F7] w-full mt-2 pb-10">
                                <div class="flex flex-col justify-start items-start my-4 pl-3">
                                    @if (App::getLocale() == 'ar')
                                    <h4 class="text-2xl text-second mb-4">{{$work->name_ar}}</h4>
                                    @else
                                    <h4 class="text-2xl text-second mb-4">{{$work->name_en}}</h4>
                                    @endif
                                    <div>
                                        @foreach ($work->categories as $category)
                                        <span class="bg-[#EBEBEB] text-sm font-light px-3 py-2">{{$category->name_en}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('site.portfolio', $work->id)}}" class="mb-4 -translate-y-7 px-8 py-4 flex items-center justify-center bg-main text-white hover:bg-second hover:ml-2 transition-all delay-200 ease-out">
                                <span class="me-4">Read More</span>
                                <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-slide-button swiper-button-prev left__work"></div>
                    <div class="swiper-slide-button swiper-button-next right__work"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- our team -->
    <section class="my-10 relative">
        <div class="container py-10">
            <div class="flex flex-col justify-center items-center">
                <h2 class="text__client text-5xl md:text-7xl font-semibold text-main uppercase mb-2">{{$teams->$name}}</h2>
                <h3 class="text__client text-xl md:text-3xl font-semibold text-second mb-2">{{$teams->$title}}</h3>
                <p class="text__client w-3/4 text-dark font-light text-base leading-6 text-center">{{$teams->$description}}</p>
            </div>
        </div>
        <div class="scroll-wrapper">
            <div class="content flex justify-center items-center gap-[200px] mt-[90px] overflow-x-auto h-[371px]">
                @foreach ($team->chunk(2) as $index => $chunk)
                    @php
                    $index = $index != 0 ? $index + 1 : $index;
                    $index = $index == 3 ? $index + 1 : $index;
                    @endphp
                    <div class="rec">
                        @if (isset($chunk[$index]))
                            <div class="f img-about">
                                <div class="hexagon-container" style="width: 150px; height: 140px;">
                                    <!-- SVG للشكل السداسي بحدود متقطعة -->
                                    <!-- العنصر الداخلي -->
                                    <div class="hexagon-content bg-main"  style="width: 162px; height: 162px; background-color: #50ada3;">
                                        @if ($chunk[$index]->image == 'null')
                                        <img src="{{ asset('asset/img/extra/team-01.png') }}" alt="" class="w-[140px] h-[140px] object-cover">
                                        @else
                                        <img src="{{ asset('storage/' . $chunk[$index]->image) }}" alt="" class="w-[140px] h-[140px] object-cover">
                                        @endif
                                    </div>
                                </div>
                                <div class="flex flex-col justify-center items-center mt-4">
                                    <span class="text-second font-semibold text-xl">{{ $chunk[$index]->name_en }}</span>
                                    <span class="text-second font-light text-base">{{ $chunk[$index]->Specialization_en }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="left"></div>
                        <div class="right"></div>
                        @if (isset($chunk[$index + 1]))
                            <div class="l img-about">
                                <div class="flex flex-col justify-center items-center mb-4">
                                    <span class="text-second font-semibold text-xl">{{ $chunk[$index + 1]->name_en }}</span>
                                    <span class="text-second font-light text-base">{{ $chunk[$index + 1]->Specialization_en }}</span>
                                </div>
                                <div class="hexagon-container" style="width: 150px; height: 140px;">
                                    <div class="hexagon-content bg-main"  style="width: 162px; height: 162px; background-color: #50ada3;">

                                        @if ($chunk[$index + 1]->image == 'null')
                                        <img src="{{ asset('asset/img/extra/team-02.png') }}" alt="" class="w-[140px] h-[140px] object-cover">
                                        @else
                                        <img src="{{ asset('storage/' . $chunk[$index + 1]->image) }}" alt="" class="w-[140px] h-[140px] object-cover">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
                <div class="rec">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- client's feedback -->
    <section class="mt-10 relative">
        <div class="container py-10">
            <div class="flex flex-col justify-center items-center">
                <h2 class="text__client text-5xl md:text-7xl font-semibold text-main uppercase mb-2 text-center">CLIENT'S FEEDBACK</h2>
                <h3 class="text__client text-xl md:text-3xl font-semibold text-second mb-2">What People Say About Us</h3>
            </div>
        </div>
        <div class="bg-main mt-10 py-16 relative flex justify-center">
            <div class="container absolute -top-16 left-1/2 transform -translate-x-1/2">
                <!-- الصور (التحكم بالسلايدر) -->
                <div class="mt-6">
                    <div class="image-slider" id="image-slider">
                    @foreach ($clients as $index => $client )
                        @if ($client->image != 'null')
                        <img src="{{ asset('storage/' . $client->image) }}" alt="Client 1" class="w-12 h-12 md:w-20 md:h-20 rounded-full border-2 border-teal-500 cursor-pointer {{ $index === 2 ? 'active' : 'inactive' }} img__client" data-client="{{ $index + 1 }}">
                        @else
                        <img src="{{ asset('asset/img/extra/client-01.png') }}" alt="Client" class="w-12 h-12 md:w-20 md:h-20 rounded-full border-2 border-teal-500 cursor-pointer {{ $index === 2 ? 'active' : 'inactive' }} img__client" data-client="{{ $index + 1 }}">
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>

            <!-- المراجعات -->
            <div class="review__arrow relative mt-8 bg-teal-50 p-6 rounded-lg shadow-md text-center w-[80%]">
                <div class="review__arrow absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-[22px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="63" height="23" viewBox="0 0 63 23">
                        <path id="Polygon_28" data-name="Polygon 28" d="M31.5,0,63,23H0Z" fill="#ebebeb"/>
                    </svg>
                </div>
                @foreach ($clients as $index => $client )
                    <div class="review" data-client="{{ $index + 1 }}">
                        <h3 class="text-lg font-bold text-gray-700">{{ $client->name_en }}</h3>
                        {{-- <p class="text-sm text-gray-500">{{ $client->job }}</p> --}}
                        <p class="mt-2 text-gray-600">
                            {{ $client->feedback_en }}
                        </p>
                        <div class="mt-4 flex justify-center space-x-1">
                            @for ($i = 0; $i < $client->stars; $i++)
                                <i class="fas fa-star text-yellow-500"></i>
                            @endfor
                            @for ($i = 0; $i < 5 - $client->stars; $i++)
                                <i class="fas fa-star text-gray-500"></i>
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>


    @stop
