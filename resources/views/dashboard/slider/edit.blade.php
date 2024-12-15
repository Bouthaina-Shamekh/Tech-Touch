<x-dashboard-layout>
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets-dashboard/css/media.css')}}">
    @endpush
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.slider.index')}}">{{__('Slider')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Edit Slider')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                    {{-- @can('add product') --}}
                <div class="card-header">
                    <h5>{{__('Edit Slider')}}</h5>
                </div>
                {{-- @endcan --}}
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
                                <textarea name="description_ar" id="description_ar" rows="3" class="form-control" required>{{$slid->description_ar}}</textarea>
                            </div>
                            <div class="form-group col-6 mb-3">
                                <label for="content_en" class="form-label">{{__('Content English')}}</label>
                                <textarea name="description_en" id="description_en" rows="3" class="form-control" required>{{$slid->description_en}}</textarea>
                            </div>
                            <div class="form-group col-6 mb-3">
                                <x-form.input name="btn" label="{{__('Btn')}}" type="text" placeholder="{{__('enter btn the slider')}}" required :value="$slid->btn"/>
                            </div>

                            <div class="form-group col-6 mb-3">
                                <x-form.input name="link" label="{{__('Link')}}" type="text" placeholder="{{__('enter link the slider')}}" required :value="$slid->link"/>
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
            </div>
        </div>
    </div>






</x-dashboard-layout>
