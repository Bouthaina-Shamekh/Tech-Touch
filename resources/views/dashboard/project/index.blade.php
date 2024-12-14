<x-dashboard-layout>

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.Home')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Project')}}</li>
    </x-slot:breadcrumb>



<!-- Both borders table start -->
<div class="col-span-12">
    <div class="card table-card">
        <div class="card-header">
            <div class="sm:flex items-center justify-between">
                <h5 class="mb-3 sm:mb-0">{{__('admin.Project')}}</h5>
                <div>
                    <a href="{{route('admin.project.create')}}" class="btn btn-primary" >
                        {{__('admin.Add Project')}}
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
                        <th>{{__('admin.Name_AR')}}</th>
                        <th>{{__('admin.Name_EN')}}</th>
                        <th>{{__('admin.Image')}}</th>
                        <th>{{__('admin.Major')}}</th>
                        <th>{{__('admin.Action')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$project->name_ar}}</td>
                                <td>{{$project->name_en}}</td>


                                <td>
                                    <img src="{{asset('storage/'.$project->image)}}" alt="image" class="w-16">
                                </td>

                                <td>
                                    @foreach($project->major as $major)
                                        <li>{{ $major->name_en}}</li>
                                        <li>{{ $major->name_ar}}</li>
                                    @endforeach
                                </td>

                                <td>
                                    <a href="{{route('admin.project.edit',$project->id)}}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                        <i class="ti ti-edit text-xl leading-none"></i>
                                    </a>
                                    <form action="{{route('admin.project.destroy',$project->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary" title="{{__('admin.Delete')}}">
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
