<x-dashboard-layout>
    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('Home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.setting.index')}}">{{__('Settings')}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{__('Setting Mail')}}</li>
    </x-slot:breadcrumb>
    <div class="col-span-12 xl:col-span-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('admin.Privet Settings')}}</h5>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{route('admin.settingsmail.update')}}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">{{ __('admin.MAIL MAILER') }}</label>
                                <input type="text"  class="form-control" name="mail_mailer" value="{{ $settingsmail->mail_mailer ?? '' }}" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">{{ __('admin.MAIL HOST') }}</label>
                                <input type="text"  class="form-control" name="mail_host" value="{{ $settingsmail->mail_host ?? '' }}" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">{{ __('admin.MAIL PORT') }}</label>
                                <input type="number"  class="form-control" name="mail_port" value="{{ $settingsmail->mail_port ?? '' }}" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">{{ __('admin.MAIL USERNAME') }}</label>
                                <input type="text"  class="form-control" name="mail_username" value="{{ $settingsmail->mail_username ?? '' }}" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">{{ __('admin.MAIL PASSWORD') }}</label>
                                <input type="password"  class="form-control" name="mail_password" value="{{ $settingsmail->mail_password ?? '' }}" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">{{ __('admin.MAIL ENCRYPTION') }}</label>
                                <input type="text"  class="form-control" name="mail_encryption" value="{{ $settingsmail->mail_encryption ?? '' }}" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">{{ __('admin.MAIL FROM ADDRESS') }}</label>
                                <input type="email"  class="form-control" name="mail_from_address" value="{{ $settingsmail->mail_from_address ?? '' }}" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">{{ __('admin.MAIL FROM NAME') }}</label>
                                <input type="text"  class="form-control" name="mail_from_name" value="{{ $settingsmail->mail_from_name ?? '' }}" />
                            </div>
                            <button type="submit" class="btn btn-primary mb-4">{{ __('admin.Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-dashboard-layout>