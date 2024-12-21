<x-dashboard-layout>

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.Home')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Works')}}</li>
    </x-slot:breadcrumb>



<!-- Both borders table start -->
<div class="col-span-12">
    <div class="card table-card">
        <div class="card-header">
            <div class="sm:flex items-center justify-between">
                <h5 class="mb-3 sm:mb-0">{{__('admin.Works')}}</h5>
                @can('create', 'App\\Models\Work')
                <div>
                    <a href="{{route('admin.work.create')}}" class="btn btn-primary" >
                        {{__('admin.Add Works')}}
                    </a>
                </div>
                @endcan
            </div>
        </div>
        @can('view', 'App\\Models\Work')
        <div class="card-body pt-3">
            <div class="table-responsive" style="margin: 0 15px;">
                <table class="table table-hover table-bordered" id="pc-dt-simple">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('admin.Image')}}</th>
                        <th>{{__('admin.Name')}}</th>
                        <th>{{__('admin.Categories')}}</th>
                        <th>{{__('admin.Action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($works as $work )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{asset('storage/'.$work->image)}}" alt="image" width="50">
                                </td>
                                @if (App::getLocale() == 'ar')
                                <td>{{$work->name_ar}}</td>

                                @else
                                <td>{{$work->name_en}}</td>

                                @endif
                                <td>
                                    @foreach ($work->categories as $category )
                                        <span class="badge bg-primary">{{$category->name_ar}}</span>
                                    @endforeach
                                </td>
                                <td class="d-flex">
                                    @can('edit', 'App\\Models\Work')
                                    <a href="{{route('admin.work.edit',$work->id)}}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                        <i class="ti ti-edit text-xl leading-none"></i>
                                    </a>
                                    @endcan

                                    @can('delete', 'App\\Models\Work')
                                    <form action="{{route('admin.work.destroy',$work->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary" title="{{__('admin.Delete')}}">
                                            <i class="ti ti-trash text-xl leading-none"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endcan
    </div>
</div>

<!-- Both borders table end -->



</x-dashboard-layout>
