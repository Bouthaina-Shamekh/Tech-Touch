<x-dashboard-layout>
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('dashboard.users.index')}}">{{__('Users')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Add User')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Add User')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('dashboard.users.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('dashboard.users._form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
