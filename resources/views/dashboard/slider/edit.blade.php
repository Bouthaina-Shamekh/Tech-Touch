<x-dashboard-layout>
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('Home')}}</a></li>
        @can('view', 'App\\Models\Slider')
        <li class="breadcrumb-item"><a href="{{route('admin.slider.index')}}">{{__('Slider')}}</a></li>
        @endcan
        <li class="breadcrumb-item" aria-current="page">{{__('Edit Slider')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                @can('edit', 'App\\Models\Slider')
                <div class="card-header">
                    <h5>{{__('Edit Slider')}}</h5>
                </div>
                 @endcan
                 @can('edit', 'App\\Models\Slider')
                <div class="card-body">
                    <form action="{{route('admin.slider.update',$slid->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="name_ar" label="{{__('Name_AR')}}" type="text" placeholder="{{__('enter name restarant in arabic')}}" required :value="$slid->name_ar" />
                            </div>
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="name_en" label="{{__('Name_EN')}}" type="text" placeholder="{{__('enter name restarant in english')}}" required :value="$slid->name_en"/>
                            </div>

                            <div class="form-group col-6 mb-3">
                                <label for="content_en" class="form-label">{{__('Content Arabic')}}</label>
                                <textarea name="description_ar" id="mytextarea" rows="3" class="form-control" required>{{$slid->description_ar}}</textarea>
                            </div>
                            <div class="form-group col-6 mb-3">
                                <label for="content_en" class="form-label">{{__('Content English')}}</label>
                                <textarea name="description_en" id="mytextarea" rows="3" class="form-control" required>{{$slid->description_en}}</textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end mt-3">
                            <a href="{{route('admin.slider.index')}}" class="btn btn-secondary col-1 mr-3">
                                {{__('Back')}}
                            </a>
                            <button type="submit" class="btn btn-primary col-1  mr-3">
                                {{__('Update')}}
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
