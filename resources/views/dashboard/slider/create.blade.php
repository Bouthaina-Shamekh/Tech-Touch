<x-dashboard-layout>
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.Home')}}</a></li>
        @can('view', 'App\\Models\Slider')
        <li class="breadcrumb-item"><a href="{{route('admin.slider.index')}}">{{__('admin.Slider')}}</a></li>
        @endcan
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Add Slider')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                {{-- @can('add product') --}}
                <div class="card-header">
                    <h5>{{__('admin.Add Slider')}}</h5>
                </div>
                {{-- @endcan --}}
                @can('create', 'App\\Models\Slider')
                <div class="card-body">
                    <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="name_ar" label="{{__('admin.Name_AR')}}" type="text" placeholder="{{__('enter name restarant in arabic')}}"  />
                            </div>
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="name_en" label="{{__('admin.Name_EN')}}" type="text" placeholder="{{__('enter name restarant in english')}}"/>
                            </div>
                            <div class="form-group col-6 mb-3">
                                <label for="content_en" class="form-label">{{__('admin.Content Arabic')}}</label>
                                <textarea name="description_ar" id="mytextarea" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-6 mb-3">
                                <label for="content_en" class="form-label">{{__('admin.Content English')}}</label>
                                <textarea name="description_en" id="mytextarea" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end mt-3">
                            <a href="{{route('admin.slider.index')}}" class="btn btn-secondary col-1 mr-3">
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







    @push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.4.1/tinymce.
min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>

    @endpush


</x-dashboard-layout>
