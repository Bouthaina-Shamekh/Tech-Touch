<x-dashboard-layout>
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Deliveries')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12">
    <div class="card">
        <div class="card-header">
            <div class="sm:flex items-center justify-between">
                <h5 class="mb-3 mb-sm-0">{{__('Deliveries List')}}</h5>
                <div>
                    <a href="{{route('dashboard.deliveries.create')}}" class="btn btn-primary">
                        {{__('Add Delivery')}}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive dt-responsive">
                <table class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th  class="text-center">{{__('Active')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Phone')}}</th>
                            <th>{{__('Gender')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>{{__('Age')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deliveries as $delivery)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            @if ($delivery->last_activity >= now()->subMinutes(5))
                                <td class="text-center">
                                    <i class="fas fa-circle text-success bg-success rounded-circle"></i>
                                </td>
                            @else
                                <td class="text-center">
                                    <i class="far fa-circle"></i>
                                </td>
                            @endif
                            <td>
                                <div class="flex items-center w-44">
                                    <div class="shrink-0">
                                        <img src="{{ $delivery->image_url }}" alt="delivery image" class="rounded-full w-10" />
                                    </div>
                                    <div class="grow ltr:ml-3 rtl:mr-3">
                                        <h6 class="mb-0">{{$delivery->name}}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{$delivery->email}}</td>
                            <td>{{$delivery->phone}}</td>
                            <td>{{($delivery->gender == 0) ? __('Male') : __('Female')}}</td>
                            <td  class="d-flex">
                                <a href="{{route('dashboard.deliveries.edit',$delivery->id)}}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                    <i class="ti ti-edit text-xl leading-none"></i>
                                </a>
                                <form action="{{route('dashboard.deliveries.destroy',$delivery->id)}}" method="post">
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
            <div>
                {{$deliveries->links()}}
            </div>
        </div>
    </div>
    </div>

</x-dashboard-layout>
