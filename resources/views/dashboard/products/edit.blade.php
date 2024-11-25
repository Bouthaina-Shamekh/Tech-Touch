<x-dashboard-layout>
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('dashboard.products.index')}}">{{__('Products')}}</a></li>
        @can('edit product')
        <li class="breadcrumb-item" aria-current="page">{{__('Edit Product')}}</li>
        @endcan
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Edit Product') . " : " . (App::getLocale() == 'ar' ? $product->name_ar : $product->name_en) }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('dashboard.products.update',$product->slug)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('dashboard.products._form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
