<x-dashboard-layout>
    @php
        $name = 'name_' . app()->currentLocale();
        $feedback = 'feedback_' . app()->currentLocale();
    @endphp

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('admin.Home') }}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{ __('admin.Notifications') }}</li>
    </x-slot:breadcrumbs>

    <div class="col-span-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-3 sm:mb-0">{{ __('admin.Notifications') }}</h5>
            </div>
            <div class="card-body pt-3">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="notifications-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin.Source') }}</th>
                                <th>{{ __('admin.Message') }}</th>
                                <th>{{ __('admin.Date') }}</th>
                                <th>{{ __('admin.Status') }}</th>
                                <th>{{ __('admin.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notification as $notification)
                                <tr>
                                    <td>{{ $notification->id }}</td>
                                    <td>{{ $notification->data['source'] ?? 'Unknown' }}</td>
                                    <td>{{ $notification->data['message'] }}</td>
                                    <td>{{ $notification->created_at->format('Y-m-d h:i') }}</td>
                                    <td>
                                        @if ($notification->read_at)
                                            <span class="badge bg-success">{{ __('admin.Read') }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ __('admin.Unread') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($notification->deleted_at)
                                            <span class="badge bg-danger">{{ __('admin.Deleted') }}</span>
                                        @else
                                            <a href="{{ route('admin.notification.show', $notification->id) }}" class="btn btn-info btn-sm">{{ __('admin.View') }}</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
