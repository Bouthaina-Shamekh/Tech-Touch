<x-dashboard-layout>

    @php
    $name = 'name_'.app()->currentLocale();
    $title = 'title_'.app()->currentLocale();
    $description = 'description_'.app()->currentLocale();


    @endphp

    <style>
        .description{
            width: 100px;
            display: inline-block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            transition: all 0.3s ease;
        }
        .description:hover{
            white-space: pre-wrap;
            overflow-y: visible;
            /* overflow-x: visible; */
            /* width: 100%; */
        }
    </style>
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('admin.Home')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('admin.Hero')}}</li>
    </x-slot:breadcrumb>



<!-- Both borders table start -->
<div class="col-span-12">
    <div class="card table-card">
        <div class="card-header">
            <div class="sm:flex items-center justify-between">
                <h5 class="mb-3 sm:mb-0">{{__('admin.Hero')}}</h5>
                <div>
                    @php
                    $diff = array_diff($sections, $sectionsMenu);
                    @endphp
                    @if (!empty($diff))
                        <a href="{{route('admin.hero.create')}}" class="btn btn-primary" >
                            {{__('admin.Add Hero')}}
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body pt-3">
            <div class="table-responsive" style="margin: 0 15px;">
                <table class="table table-hover table-bordered" id="pc-dt-simple">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('admin.Name')}}</th>
                        <th>{{__('admin.Title')}}</th>
                        <th>{{__('admin.Description')}}</th>
                        <th>{{__('admin.Image')}}</th>
                        <th>{{__('admin.Image')}}</th>
                        <th>{{__('admin.Section')}}</th>
                        <th>{{__('admin.Action')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($heros as $hero )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$hero->$name}}</td>
                                <td>{{$hero->$title}}</td>
                                <td>
                                 <span class="description">   {{$hero->$description}} </span>
                                </td>

                                <td>
                                    <img src="{{asset('storage/'.$hero->image1)}}" alt="image" class="w-16">
                                </td>
                                <td>
                                    <img src="{{asset('storage/'.$hero->image2)}}" alt="image" class="w-16">
                                </td>
                                <td>{{$hero->section}}</td>

                                <td>
                                    <a href="{{route('admin.hero.edit',$hero->id)}}" class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary">
                                        <i class="ti ti-edit text-xl leading-none"></i>
                                    </a>
                                    {{-- <form action="{{route('admin.hero.destroy',$hero->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="w-8 h-8 rounded-xl inline-flex items-center justify-center btn-link-secondary" title="{{__('admin.Delete')}}">
                                            <i class="ti ti-trash text-xl leading-none"></i>
                                        </button>
                                    </form> --}}
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
