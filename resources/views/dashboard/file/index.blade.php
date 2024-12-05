<x-dashboard-layout>

    @php
    $name = 'name_'.app()->currentLocale();
    $description = 'description_'.app()->currentLocale();
    $file_name = 'file_name_'.app()->currentLocale();

    @endphp

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Files')}}</li>
    </x-slot:breadcrumb>



<!-- Both borders table start -->
<div class="col-span-12">
    <div class="card table-card">
        <div class="card-header">
            <div class="sm:flex items-center justify-between">
                <h5 class="mb-3 sm:mb-0">{{__('Files')}}</h5>
                <div>
                    <a href="{{route('admin.file.create')}}" class="btn btn-primary" >
                        {{__('Add Files')}}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body pt-3">
            <div class="table-responsive" style="margin: 0 15px;">
                <table class="table table-hover table-bordered" id="pc-dt-simple">
                    <thead>
                    <tr>
                         <th>#</th>
                        <th>{{__('File Name')}}</th>
                        <th>{{__('File')}}</th>
                        <th>{{__('Description')}}</th>
                        <th>{{__('Price')}}</th>
                        <th>{{__('Btn')}}</th>
                        <th>{{__('Action')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$file->$file_name}}</td>
                                {{-- <td>{{$file->file_name_ar}}</td> --}}
                                <td>{{ asset('files/' . $file->file) }}</td>
                                <td>{{$file->$description}}</td>
                                {{-- <td>{{$file->description_en}}</td> --}}
                                <td>{{$file->price}}</td>
                                <td>{{$file->btn}}</td>


                                <td>
                                    <a href="{{route('admin.file.edit',$file->id)}}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                        <i class="ti ti-edit text-xl leading-none"></i>
                                    </a>
                                    <form action="{{route('admin.file.destroy',$file->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary" title="{{__('Delete')}}">
                                            <i class="ti ti-trash text-xl leading-none"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Both borders table end -->



</x-dashboard-layout>
