<div class="row">
    <div class="form-group col-6 mb-3">
        <x-form.input name="name" label="{{__('Name')}}" placeholder="{{__('Enter Name')}}" required :value="$user->name" />
    </div>
    <div class="form-group col-6 mb-3">
        <x-form.input type="email" name="email" label="{{__('Email')}}" placeholder="{{__('Enter Email')}}" required :value="$user->email" />
    </div>
    <div class="form-group col-6 mb-3">
        <x-form.input type="password" name="password" label="{{__('Password')}}" placeholder="{{__('Enter Password')}}" required :value="$user->password" />
    </div>
    <div class="form-group col-6 mb-3">
        <label for="gender" class="form-label">{{__('Gender')}}</label>
        <select name="gender" id="gender" class="form-control">
            <option value="0" @selected($user->gender == 0)>{{__('Male')}}</option>
            <option value="1" @selected($user->gender == 1)>{{__('Female')}}</option>
        </select>
    </div>
    <div class="form-group col-6 mb-3">
        <label for="status" class="form-label">{{__('Status')}}</label>
        <select name="status" id="status" class="form-control">
            <option value="1" @selected($user->status == '1')>{{__('Active')}}</option>
            <option value="0" @selected($user->status == '0')>{{__('Archive')}}</option>
        </select>
    </div>
    <div class="form-group col-6">
        <x-form.input name="imageFile" label="{{__('Image')}}" type="file" accept="image/*" />
        @if ($user->image != null)
            <img src="{{$user->image_url}}" alt="img...." width="100px" class="mt-3">
        @endif
    </div>
    <div class="form-group col-6 mb-3">
        {{-- <x-form.input type="number" name="mealCount" label="{{__('Number of Meals')}}" min="1" required :value="$user->meals->count()" /> --}}
    </div>

</div>
<hr class="mt-3">
<div class="row justify-content-end mt-3">
    <a href="{{route('dashboard.users.index')}}" class="btn btn-secondary col-1 mr-3">
        {{__('Back')}}
    </a>
    <button type="submit" class="btn btn-primary col-1  mr-3">
        {{$btn_label ?? __('Add')}}
    </button>
</div>
