<x-dashboard-layout>
    @php
    $name = 'name_'.app()->currentLocale();
    $feedback = 'feedback_'.app()->currentLocale();

    @endphp

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Clients')}}</li>
    </x-slot:breadcrumb>



<!-- Both borders table start -->
<div class="col-span-12">
    <div class="card table-card">
        <div class="card-header">
            <div class="sm:flex items-center justify-between">
                <h5 class="mb-3 sm:mb-0">{{__('Clients')}}</h5>
                <div>
                    <a href="{{route('admin.client.create')}}" class="btn btn-primary" >
                        {{__('Add Clients')}}
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
                        <th>{{__('Name')}}</th>
                        {{-- <th>{{__('Name_EN')}}</th> --}}
                        <th>{{__('Feedbac')}}</th>
                        {{-- <th>{{__('Feedback_EN')}}</th> --}}
                        <th>{{__('star')}}</th>
                        <th>{{__('Image')}}</th>
                        <th>{{__('Action')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$client->$name}}</td>
                                {{-- <td>{{$client->name_en}}</td> --}}
                                <td>{{$client->$feedback}}</td>
                                {{-- <td>{{$client->feedback_en}}</td> --}}
                                <td>{{$client->star}}</td>

                                <td>
                                    <img src="{{asset('storage/'.$client->image)}}" alt="image" class="w-16">
                                </td>

                                <td>
                                    <a href="{{route('admin.client.edit',$client->id)}}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                        <i class="ti ti-edit text-xl leading-none"></i>
                                    </a>
                                    <form action="{{route('admin.client.destroy',$client->id)}}" method="post">
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
