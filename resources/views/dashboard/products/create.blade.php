<x-dashboard-layout>
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('dashboard.products.index')}}">{{__('Products')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Add Product')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                    @can('add product')
                <div class="card-header">
                    <h5>{{__('Add Product')}}</h5>
                </div>
                @endcan
                <div class="card-body">
                    <form action="{{route('dashboard.products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('dashboard.products._form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
