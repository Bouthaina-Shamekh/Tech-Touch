@push('styles')
<style>
    #user-roles{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-auto-rows: minmax(auto, auto);
        gap: 10px 45px;
    }
</style>
@endpush
<div class="row">
    <div class="form-group col-6 mb-3">
        <x-form.input name="name" label="{{__('Name')}}" placeholder="{{__('Enter Name')}}" required :value="$user->name" />
    </div>
    <div class="form-group col-6 mb-3">
        <x-form.input type="email" name="email" label="{{__('Email')}}" placeholder="{{__('Enter Email')}}" required :value="$user->email" />
    </div>
    <div class="form-group p-3 col-6">
        @if (isset($btn_label))
        <x-form.input type="password" label="{{__('Password')}}" name="password" placeholder="****"  />
        @else
        <x-form.input type="password" label="{{__('Password')}}" name="password" placeholder="****" required />
        @endif
    </div>
    <div class="form-group p-3 col-6">
        @if (isset($btn_label))
        <x-form.input type="password" label="{{__('Confirm Password')}}"  name="confirm_password" placeholder="****"/>
        @else
        <x-form.input type="password" label="{{__('Confirm Password')}}"  name="confirm_password" placeholder="****" required/>
        @endif
    </div>

</div>
<div class="row justify-content-end mt-3">
    <a href="{{route('admin.users.index')}}" class="btn btn-secondary col-1 mr-3">
        {{__('Back')}}
    </a>
    <button type="submit" class="btn btn-primary col-1  mr-3">
        {{$btn_label ?? __('Add')}}
    </button>
</div>
<hr class="mt-3">


<div class="row ml-3">
    <legend>Roles</legend>
    <fieldset id="user-roles" class="col-12">
        @foreach (app('abilities') as $abilities_name => $ability_array)
            <div class="mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row flex-column align-items-start pl-2 pr-2">
                            <legend>{{$ability_array['name']}}</legend>
                            @foreach ($ability_array as $ability_name => $ability)
                                @if ($ability_name != 'name')
                                <div class="custom-control custom-checkbox" style="margin-right: 0;">
                                    <input class="custom-control-input" type="checkbox" name="abilities[]" id="ability-{{$abilities_name . '.' . $ability_name}}" value="{{$abilities_name . '.' . $ability_name}}" @checked(in_array($abilities_name . '.' . $ability_name, $user->roles()->pluck('role_name')->toArray())) >
                                    <label class="custom-control-label" for="ability-{{$abilities_name . '.' . $ability_name}}">
                                        {{$ability}}
                                    </label>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </fieldset>
</div>
