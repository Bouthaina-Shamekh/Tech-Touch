<x-dashboard-layout>
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">
    @endpush
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.feature.index')}}">{{__('admin.Featuress')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Edit Features')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                    {{-- @can('add product') --}}
                <div class="card-header">
                    <h5>{{__('admin.Edit Features')}}</h5>
                </div>
                {{-- @endcan --}}
                <div class="card-body">
                    <form action="{{route('admin.feature.update',$features->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="feature_ar" label="{{__('admin.Feature_AR')}}" type="text" placeholder="{{__('admin.enter name of Featuress in arabic')}}" required :value="$features->feature_ar" />
                            </div>
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="feature_en" label="{{__('admin.Feature_EN')}}" type="text" placeholder="{{__('admin.enter name of Featuress in english')}}" required :value="$features->feature_en"/>
                            </div>










                        </div>
                        <div class="row justify-content-end mt-3">
                            <a href="{{route('admin.feature.index')}}" class="btn btn-secondary col-1 mr-3">
                                {{__('admin.Back')}}
                            </a>
                            <button type="submit" class="btn btn-primary col-1  mr-3">
                                {{__('admin.Update')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    @push('scripts')

    @endpush
</x-dashboard-layout>
