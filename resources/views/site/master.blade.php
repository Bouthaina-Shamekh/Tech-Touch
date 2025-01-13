@php
use App\Models\Setting;
$sections = Setting::where('key','sections_show')->first() ? json_decode(Setting::where('key','sections_show')->first()->value) : [];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Touch</title>
    <link rel="shortcut icon" href="{{asset('asset/img/icon.png')}}" type="image/x-icon">

    <!-- Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Normalize css -->
    <link rel="stylesheet" href="{{asset('asset/css/normalize.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('asset/css/all.min.css')}}">

    <!-- Tailwind css -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="{{asset('asset/css/tailwind.css')}}">

    <!-- Slide -->
    <link rel="stylesheet" href="{{asset('asset/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/slide.css')}}">


    <!-- My css -->
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    @stack('styles')
</head>

<body class="min-h-screen relative overflow-x-hidden" style="padding-right: 0 !important;">
        <!-- Header -->
        <header>
            <!-- Main navigation container -->
            <nav class="flex-no-wrap relative flex w-full items-center justify-center bg-white py-2 lg:flex-wrap lg:justify-center lg:py-4">
                <div class="container flex w-full flex-wrap items-center justify-between px-3">
                    <!-- Logo -->
                    <a class="logo__hero mx-2 my-1 flex items-center lg:mb-0 lg:mt-0" href="./index.html">
                        <img class="me-2" src="{{asset('asset/img/logoBrand.png')}}" style="height: 35px" alt="TE Logo" loading="lazy" />
                    </a>

                    <!-- Collapsible navigation container -->
                    <div class="!visible hidden basis-[100%] items-center lg:!flex lg:basis-auto" id="navbarSupportedContent1" data-twe-collapse-item>
                        <!-- navigation links -->
                        <ul class="list-style-none me-auto flex flex-col ps-0 lg:flex-row" data-twe-navbar-nav-ref>
                            <li class="mb-4 lg:mb-0 lg:pe-2" data-twe-nav-item-ref>
                                <a class="{{ request()->is('/') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2" href="{{ route('site.index') }}" data-twe-nav-link-ref>{{ __('admin.Home') }}</a>
                            </li>
                            <li class="mb-4 lg:mb-0 lg:pe-2 {{ $sections->about == false ? 'hidden' : ''}}" data-twe-nav-item-ref>
                                <a class="{{ request()->is('about') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2 " href="{{route('site.about')}}" data-twe-nav-link-ref>{{__('admin.About')}}</a>
                            </li>
                            <li class="mb-4 lg:mb-0 lg:pe-2 {{ $sections->services == false ? 'hidden' : ''}}" data-twe-nav-item-ref>
                                <a class="{{ request()->is('services') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2" href="{{ route('site.services') }}" data-twe-nav-link-ref>{{__('admin.Services')}}</a>
                            </li>
                            <li class="mb-4 lg:mb-0 lg:pe-2 {{ $sections->work == false ? 'hidden' : ''}}" data-twe-nav-item-ref>
                                <a class="{{ request()->is('portfolios') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2" href="{{ route('site.portfolios') }}" data-twe-nav-link-ref>{{__('admin.Protfolio')}}</a>
                            </li>
                            <li class="mb-4 lg:mb-0 lg:pe-2 {{ $sections->files == false ? 'hidden' : ''}}" data-twe-nav-item-ref>
                                <a class="{{ request()->is('file/*') || request()->is('file') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2" href="{{ route('site.files') }}" data-twe-nav-link-ref>{{__('admin.Files')}}</a>
                            </li>
                            <li class="mb-4 lg:mb-0 lg:pe-2 {{ $sections->contact == false ? 'hidden' : ''}}" data-twe-nav-item-ref>
                                <a class="{{ request()->is('contact') ? 'text-main' : 'text-dark' }} transition duration-200 hover:text-main hover:ease-in-out focus:text-main active:text-main motion-reduce:transition-none lg:px-2" href="{{ route('site.contact') }}" data-twe-nav-link-ref>{{__('admin.Contact')}}</a>
                            </li>

                        </ul>
                        <!-- links -->
                    </div>

                    <!-- Right elements -->
                    <div class="right__hero relative hidden lg:!flex items-center ">
                        <div class="relative group">
                            <a href="{{route('site.consultation')}}" class="inline-block bg-second px-6 pb-2 pt-2.5 text-base font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-dark hover:shadow-md focus:bg-dark focus:shadow-md focus:outline-none focus:ring-0 active:bg-dark active:shadow-md motion-reduce:transition-none">
                                {{__('admin.Free Consultation')}}
                            </a>
                            <div class="absolute top-1/2 -right-[16px] -translate-y-1/2 group-hover:transform group-hover:rotate-90 group-hover:-translate-y-1/2 group-hover:-translate-x-1/3 transition-all delay-200 ease-in">
                                <img src="{{asset('asset/img/icon/arrow-down.png')}}" alt="" width="33px">
                            </div>
                        </div>
                        @php
                            $localeCode = App::getLocale() == 'ar' ? 'en' : 'ar';
                        @endphp
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" style="font-size: 28px;" class="block border-0 bg-transparent px-4 text-black/50 hover:text-main hover:shadow-none">
                            <i class="fa-solid fa-globe"></i>
                        </a>
                    </div>
                    <!-- Right elements -->
                    <!-- Hamburger button for mobile view -->
                    <button
                        type="button"
                        class="block border-0 bg-transparent px-2 text-black/50 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
                        data-twe-toggle="modal"
                        data-twe-target="#NavBar"
                        data-twe-ripple-init
                        data-twe-ripple-color="light"
                    >
                    <span class="[&>svg]:w-7 [&>svg]:stroke-black/50 dark:[&>svg]:stroke-neutral-200">
                        <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">                      <path
                                fill-rule="evenodd"
                                d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                clip-rule="evenodd" />
                            </svg>
                    </span>
                    </button>
                </div>
            </nav>
        </header>

  

    @yield('content')


     <!-- Footer -->
    @php
        $settings = \App\Models\Setting::get();
    @endphp
    <footer class="footer w-full py-3 bg-[#F5F5F5] ">
        <div class="container">
            <div class="flex justify-between items-start gap-12 md:gap-40 flex-wrap">
                <div class="flex flex-col flex-1 justify-start items-start my-4">
                    <a class="logo__hero my-2 flex items-center hover:pl-2 transition-all delay-150 ease-in" href="./index.html">
                        @if($settings->where('key', 'logo')->first() != null)
                        <img class="me-2" src="{{ asset( 'uploads/logos/'.$settings->where('key', 'logo')->first()->value )}}" style="height: 50px" alt="TE Logo" loading="lazy" />
                        @else
                        <img class="me-2" src="{{asset('asset/img/logoBrand.png')}}" style="height: 50px" alt="TE Logo" loading="lazy" />
                        @endif
                    </a>
                    @if (App::getLocale() == 'ar')
                        @if($settings->where('key', 'titel_en')->first() != null)
                        <p class="text__footer text-second font-light text-base">{!!$settings->where('key', 'titel_ar')->first()->value!!}</p>
                        @else
                        <p class="text__footer text-second font-light text-base">وصف الموقع</p>
                        @endif
                    @else
                        @if($settings->where('key', 'titel_en')->first() != null)
                        <p class="text__footer text-second font-light text-base">{!!$settings->where('key', 'titel_en')->first()->value!!}</p>
                        @else
                        <p class="text__footer text-second font-light text-base">Site Description</p>
                        @endif
                    @endif
                </div>
                <div class="flex flex-col flex-1 justify-start items-start my-4">
                    <h3 class="text-3xl text-second uppercase mb-4 top__footer">{{ __('site.Pages') }}</h3>
                    <div class="flex justify-between items-start w-full">
                    <ul class="flex flex-col justify-start items-start w-1/2">
                            <li class="links__footer my-1"><a class="text-main pl-2 hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in font-light uppercase text-base" href="{{route('site.index')}}">{{__('admin.Home')}}</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{route('site.about')}}">{{__('admin.About US')}}</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{route('site.services')}}">{{__('admin.Services')}}</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{route('site.portfolios')}}">{{__('admin.Portfolio')}}</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{route('site.files')}}">{{__('admin.Files')}}</a></li>
                        </ul>
                        <ul class="flex flex-col justify-start items-start w-1/2">
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/terms_conditions.html">{{__('site.Terms Of Payment')}}</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{route('site.contact')}}"></a>{{__('admin.Contact')}}</li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{route('site.test_idea')}}">{{__('admin.Tese Idea')}}</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/our_comment.html">{{__('admin.Our Comment')}}</a></li>
                            <li class="links__footer my-1"><a class="text-black hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="./pages/payment_method.html">{{__('admin.Payment Method')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col flex-1 justify-start items-center md:items-start  my-4">
                    <h3 class="text-3xl text-second uppercase mb-4 top__footer">{{ __('site.social media') }}</h3>
                    <div class="flex justify-between items-start gap-5">
                        <a href="{{$settings->where('key', 'instagram')->first() != null ? $settings->where('key', 'instagram')->first()->value : '#'}}" class="social__footer text-black w-5 h-5 p-5 rounded-full bg-white hover:text-white hover:bg-main hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="{{$settings->where('key', 'linkedin')->first() != null ? $settings->where('key', 'linkedin')->first()->value : '#'}}" class="social__footer text-black w-5 h-5 p-5 rounded-full bg-white hover:text-white hover:bg-main hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="{{$settings->where('key', 'snapshat')->first() != null ? $settings->where('key', 'snapshat')->first()->value : '#'}}" class="social__footer text-black w-5 h-5 p-5 rounded-full bg-white hover:text-white hover:bg-main hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                            <i class="fa-brands fa-snapchat"></i>
                        </a>
                        <a href="{{$settings->where('key', 'twitter')->first() != null ? $settings->where('key', 'twitter')->first()->value : '#'}}" class="social__footer text-black w-5 h-5 p-5 rounded-full bg-white hover:text-white hover:bg-main hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center border-t border-[#DBDBDB] pt-2 bottom__footer">
            <p class="text-[#909090] font-light text-base uppercase">©{{ __('site.All Copyright 2023 by tech touch')}}</p>
        </div>
    </footer>

    <div data-twe-modal-init class="fixed left-0 top-0 z-[1055] hidden h-[100vh] w-full overflow-y-auto overflow-x-hidden outline-none pr-0" id="NavBar" tabindex="-1" aria-labelledby="NavBar" aria-modal="true" role="dialog">
        <div data-twe-modal-dialog-ref class="pointer-events-none relative w-auto h-full translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-8 min-[576px]:max-w-[500px] min-[992px]:max-w-[666px] my-5 mx-4 flex justify-center items-center">
            <div class="pointer-events-auto relative flex w-[86%] flex-col border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark rounded-2xl">
                <!-- Modal body -->
                <div class="relative p-4">
                    <ul class="flex flex-col justify-start items-start w-100">
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('/') || request()->is('/') ? 'text-main' : 'text-dark' }} pl-2 hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in font-light uppercase text-base" href="{{ route('site.index') }}">{{__('admin.Home')}}</a></li>
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('about/*') || request()->is('about') ? 'text-main' : 'text-dark' }} hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{ route('site.about') }}">{{__('admin.About Us')}}</a></li>
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('services/*') || request()->is('services') ? 'text-main' : 'text-dark' }} hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{ route('site.services') }}">{{__('admin.Services')}}</a></li>
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('portfolios/*') || request()->is('portfolios') ? 'text-main' : 'text-dark' }} hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{ route('site.portfolios') }}">{{__('admin.Services')}}</a></li>
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('files/*') || request()->is('files') ? 'text-main' : 'text-dark' }} hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{ route('site.files') }}">{{__('admin.Files')}}</a></li>
                        <li class="my-1 py-2 w-full border-b broder-gray-300"><a class="{{ request()->is('contact/*') || request()->is('contact') ? 'text-main' : 'text-dark' }} hover:text-main hover:font-semibold hover:pl-2 transition-all delay-150 ease-in  font-light uppercase text-base" href="{{ route('site.contact') }}">{{__('admin.Contact')}}</a></li>
                    </ul>
                    <div class="right__hero relative !flex items-center justify-center py-2">
                        <div class="relative group">
                            <a href="{{route('site.consultation')}}" class="inline-block bg-second px-6 pb-2 pt-2.5 text-base font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-dark hover:shadow-md focus:bg-dark focus:shadow-md focus:outline-none focus:ring-0 active:bg-dark active:shadow-md motion-reduce:transition-none">
                            {{__('admin.Free Consultation')}}
                            </a>
                        </div>
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" style="font-size: 28px;" class="block border-0 bg-transparent px-4 text-black/50 hover:text-main hover:shadow-none">
                            <i class="fa-solid fa-globe"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <!-- JQuery -->
    <script src="{{asset('asset/js/plugins/jquery-3.7.1.min.js')}}"></script>
    <!-- Tailwind Elements -->
    <script src="{{asset('asset/js/plugins/tw-elements.umd.min.js')}}"></script>
    <script type="module" src="{{asset('asset/js/tailwind.js')}}"></script>
    <!-- Slide -->
    <script src="{{asset('asset/js/plugins/swiper-bundle.min.js')}}"></script>

    <!-- ScrollReveal -->
    <script src="{{asset('asset/js/plugins/gsap.min.js')}}"></script>
    <script src="{{asset('asset/js/plugins/ScrollTrigger.min.js')}}"></script>


    
    <script src="{{asset('asset/js/plugins/scrollreveal.min.js')}}"></script>
    <!-- Scroll Anemation All sections -->
    @if (request()->route()->getName() != 'site.index')
        <script src="{{asset('asset/js/scroll.js')}}"></script>
    @endif
    

    <script>
        let langApp = "{{ app()->getLocale() == 'en' ? 1 : 0 }}";
        langApp = langApp == '1' ? true : false;
    </script>
    @yield('scripts')
    @stack('scripts')
</body>
</html>
