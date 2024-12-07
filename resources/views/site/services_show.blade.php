@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
$description = 'description_' . app()->currentLocale();
@endphp

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
                    <li>
                        <a href="{{route('site.services')}}" class="text-main transition duration-150 ease-in-out hover:text-main focus:text-main active:text-main motion-reduce:transition-none ">
                            Services
                        </a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-400">/</span>
                    </li>
                    <li class="text-neutral-400">{{$service->$name}}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content -->
    <section class="my-6">
        <div class="container">
            <div class="flex flex-wrap justify-between items-center text-center md:text-left" style="gap: 90px;">
                <!-- Img -->
                <div class="img__content animate-oscillate hidden md:flex md:justify-start img-about" style="flex: 1 1 40%;">
                    @if($service->image == null)
                        <img class="me-2" src="{{asset('asset/img/extra/hero.png')}}" alt="TE Logo" loading="lazy" width="100%" />
                    @else
                        <img class="me-2" src="{{asset('storage/' . $service->image)}}" alt="TE Logo" loading="lazy" width="100%" />
                    @endif
                </div>
                <!-- Text -->
                <div class="flex flex-col flex-1/2 justify-start items-center md:items-start">
                    <h2 class="text-5xl font-semibold text-main uppercase mb-2 top__content">{{$service->$name}}</h2>
                    <p class="text-dark font-light text-base leading-6 right__content">{{$service->$description}}</p>
                    <a href="{{route('site.services_order', $service->id)}}" class="bottom__content mt-4 inline-block px-4 py-2 text-white bg-main hover:bg-second hover:ml-2 focus:bg-second active:bg-second transition-all duration-150 ease-in-out">Order Now</a>
                </div>
            </div>
        </div>
    </section>

@stop

@section('scripts')
    <script>
        // top__content , img__content ,bottom__content ,right__content
        sr.reveal(`.top__content`);
        sr.reveal(`.img__content`, { origin: 'left' });
        sr.reveal(`.right__content`, { origin: 'right' , interval: 150});
        sr.reveal(`.bottom__content`, { origin: 'bottom' });
    </script>
@endsection
