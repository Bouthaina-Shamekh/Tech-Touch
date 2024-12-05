<x-dashboard-layout>

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Teams')}}</li>
    </x-slot:breadcrumb>



<!-- Both borders table start -->
<div class="col-span-12">
    <div class="card table-card">
        <div class="card-header">
            <div class="sm:flex items-center justify-between">
                <h5 class="mb-3 sm:mb-0">{{__('Teams')}}</h5>
                <div>
                    <a href="{{route('admin.team.create')}}" class="btn btn-primary" >
                        {{__('Add Teams')}}
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
                        <th>{{__('Name_AR')}}</th>
                        <th>{{__('Name_EN')}}</th>
                        <th>{{__('Specialization_AR')}}</th>
                        <th>{{__('Specialization_EN')}}</th>
                        <th>{{__('Image')}}</th>
                        <th>{{__('Action')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$team->name_ar}}</td>
                                <td>{{$team->name_en}}</td>
                                <td>{{$team->Specialization_en}}</td>
                                <td>{{$team->Specialization_ar}}</td>
                                <td>
                                    <img src="{{asset('storage/'.$team->image)}}" alt="image" class="w-16">
                                </td>

                                <td>
                                    <a href="{{route('admin.team.edit',$team->id)}}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                        <i class="ti ti-edit text-xl leading-none"></i>
                                    </a>
                                    <form action="{{route('admin.team.destroy',$team->id)}}" method="post">
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
