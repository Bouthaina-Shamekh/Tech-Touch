<x-dashboard-layout>
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">{{__('admin.Users')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Add User')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('admin.Add User')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('dashboard.users._form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
