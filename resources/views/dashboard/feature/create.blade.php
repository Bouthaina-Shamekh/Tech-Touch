<x-dashboard-layout>
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">
    @endpush
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.Home')}}</a></li>
        @can('view', 'App\\Models\Feature')
        <li class="breadcrumb-item"><a href="{{route('admin.feature.index')}}">{{__('admin.Feature')}}</a></li>
        @endcan
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Add Feature')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                @can('create', 'App\\Models\Feature')
                <div class="card-header">
                    <h5>{{__('admin.Add Feature')}}</h5>
                </div>
                @endcan
                @can('create', 'App\\Models\Feature')
                <div class="card-body">
                    <form action="{{route('admin.feature.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="feature_ar" label="{{__('admin.Feature_AR')}}" type="text" placeholder="{{__('admin.enter name of features in arabic')}}"  />
                            </div>
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="feature_en" label="{{__('admin.Feature_EN')}}" type="text" placeholder="{{__('enter name of features in english')}}"/>
                            </div>




                        </div>
                        <div class="row justify-content-end mt-3">
                            <a href="{{route('admin.feature.index')}}" class="btn btn-secondary col-1 mr-3">
                                {{__('admin.Back')}}
                            </a>
                            <button type="submit" class="btn btn-primary col-1  mr-3">
                                {{$btn_label ?? __('admin.Add')}}
                            </button>
                        </div>
                    </form>
                </div>
                @endcan
            </div>
        </div>
    </div>










</x-dashboard-layout>
