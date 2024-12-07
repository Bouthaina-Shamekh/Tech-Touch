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
                        <a href="../index.html" class="text-main transition duration-150 ease-in-out hover:text-main focus:text-main active:text-main motion-reduce:transition-none ">
                            Home
                        </a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-400">/</span>
                    </li>
                    <li>
                        <a href="./portfolios.html" class="text-main transition duration-150 ease-in-out hover:text-main focus:text-main active:text-main motion-reduce:transition-none ">
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-400">/</span>
                    </li>
                    <li class="text-neutral-400">{{$portfolio->$name}}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content -->
    <section class="my-28">
        <div class="container">
            <div class="flex flex-wrap justify-between items-center md:items-start text-center md:text-left gap-20">
                <!-- Img -->
                <div class="img__portfolio animate-oscillate hidden md:flex md:justify-start img-about border-4 border-main" style="flex: 1 1 40%;">
                    @if($portfolio->image == null)
                        <img src="{{asset('asset/img/extra/portfolio-01.png')}}" width="100%" alt="" class="translate-x-5 translate-y-5">
                    @else
                        <img src="{{asset("storage/" .  $portfolio->image)}}" width="100%" alt="" class="translate-x-5 translate-y-5">
                    @endif
                </div>
                <!-- Text -->
                <div class="flex flex-col  flex-1/2 justify-start items-center md:items-start">
                    <h2 class="text-3xl md:text-5xl font-semibold text-main uppercase mb-2 top__portfolio">{{$portfolio->$name}}</h2>
                    <p class="text-dark font-light text-base leading-6 right__portfolio">{{$portfolio->$description}}</p>
                    <div class="flex flex-col justify-start items-start ">
                        <h3 class="text-3xl text-second my-4 bottom__portfolio">Links</h3>
                        <a href="{{$portfolio->link}}" target="_blank" class="bottom__portfolio text-main my-2 hover:text-main hover:pl-2 transition-all delay-150 ease-in  font-light uppercase underline text-base">
                            {{$portfolio->link}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @stop
@section('scripts')
<script>
    // top__portfolio , img__portfolio , bottom__portfolio ,right__portfolio
    sr.reveal(`.top__portfolio`);
    sr.reveal(`.img__portfolio`, { origin: 'left' });
    sr.reveal(`.right__portfolio`, { origin: 'right' });
    sr.reveal(`.bottom__portfolio`, { origin: 'bottom' , interval: 200});
</script>
@endsection
