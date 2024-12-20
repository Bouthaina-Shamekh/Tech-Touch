@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@php
$name = 'name_' . app()->currentLocale();
@endphp


@section('content')
    <link rel="stylesheet" href="{{asset('asset/css/portfolios.css')}}">
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
                    <li class="text-neutral-400">Portfolio</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->
    <section class="my-8">
        <div class="container">
            <div class="card-body pt-3 masonry-column">
                @foreach ($works as $work)
                <div class="card__content masonry-item relative h-[530px]  flex flex-col justify-start items-start group">
                    <div class="img__card w-full h-full bg-center bg-cover bg-no-repeat  group-hover:bg-170 transition-all delay-200 ease-in" style="background-image: url('{{ asset('storage/' . $work->image) }}');">
                    </div>
                    <div class="absolute w-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all delay-200 ease-in opacity-0 group-hover:opacity-100">
                        <div class="flex flex-col justify-start items-center my-4">
                            <h4 class="text-2xl text-white mb-4 font-semibold">{{ $work->name_en }}</h4>
                            <div>
                                @foreach ($work->categories as $category)
                                <span class="text-[#d4d0d0] text-xs font-medium px-3 py-2 left__card">{{$category->name_en}}</span>
                                @endforeach
                            </div>
                        </div>
                        <a href="{{route('site.portfolio', $work->id)}}" class="link__card mb-4 px-8 py-4 flex items-center justify-center text-white transition-all delay-200 ease-out"> 
                            <span class="me-4">Read More</span>
                            <i class="fa-solid fa-arrow-right ms-2 text-main"></i>
                        </a>
                    </div>
                </div>
               @endforeach
            </div>
            <div class="w-full flex justify-center items-center gap-4 my-8">
                @if ($works->previousPageUrl())
                <a href="{{ $works->previousPageUrl() }}" class="bottom__portfolios w-5 h-5 p-5 rounded-full bg-transparent border border-[#818B90] hover:bg-main hover:border-main hover:text-white hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center">
                    <i class="fa-solid fa-angles-left"></i>
                </a>
                @endif
                @for ($i = 1; $i <= $works->lastPage(); $i++)
                <a href="{{ $works->url($i) }}" class="bottom__portfolios w-5 h-5 p-5 rounded-full  border border-[#818B90] hover:bg-main hover:border-main hover:text-white hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center {{ $works->currentPage() == $i ? 'bg-main text-white' : '' }}">
                    <i class="fa-solid fa-{{ $i }}"></i>
                </a>
                @endfor
                @if ($works->nextPageUrl())
                <a href="{{ $works->nextPageUrl() }}" class="bottom__portfolios w-5 h-5 p-5 rounded-full bg-transparent border border-[#818B90] hover:bg-main hover:border-main hover:text-white hover:scale-105 transition-all delay-150 ease-in flex justify-center items-center active:bg-main active:border-main active:text-white">
                    <i class="fa-solid fa-angles-right"></i>
                </a>
                @endif
            </div>
        </div>
    </section>
    <!-- End Content -->

@stop

