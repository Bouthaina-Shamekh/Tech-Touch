<x-dashboard-layout>
    @php
    $name = 'name_'.app()->currentLocale();
    $feedback = 'feedback_'.app()->currentLocale();

    @endphp

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.Home')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Clients')}}</li>
    </x-slot:breadcrumb>



<!-- Both borders table start -->
<div class="col-span-12">
    <div class="card table-card">
        <div class="card-header">
            <div class="sm:flex items-center justify-between">
                <h5 class="mb-3 sm:mb-0">{{__('admin.Clients')}}</h5>
                @can('create', 'App\\Models\Client')
                <div>
                    <a href="{{route('admin.client.create')}}" class="btn btn-primary" >
                        {{__('admin.Add Clients')}}
                    </a>
                </div>
                @endcan
            </div>
        </div>
        @can('view', 'App\\Models\Client')
        <div class="card-body pt-3">
            <div class="table-responsive" style="margin: 0 15px;">
                <table class="table table-hover table-bordered" id="pc-dt-simple">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('admin.Name')}}</th>
                        <th>{{__('admin.Job')}}</th>
                        <th>{{__('admin.Feedbac')}}</th>
                        <th>{{__('admin.star')}}</th>
                        <th>{{__('admin.Image')}}</th>
                        <th>{{__('admin.Action')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$client->$name}}</td>
                               <td>{{$client->job}}</td>
                                <td>{{$client->$feedback}}</td>
                                {{-- <td>{{$client->feedback_en}}</td> --}}
                                <td>{{$client->stars}}</td>

                                <td>
                                    <img src="{{asset('storage/'.$client->image)}}" alt="image" class="w-16">
                                </td>

                                <td>
                                    @can('edit', 'App\\Models\Client')
                                    <a href="{{route('admin.client.edit',$client->id)}}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                        <i class="ti ti-edit text-xl leading-none"></i>
                                    </a>
                                    @endcan
                                    @can('delete', 'App\\Models\Client')
                                    <form action="{{route('admin.client.destroy',$client->id)}}" method="post">
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
