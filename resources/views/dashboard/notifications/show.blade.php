<x-dashboard-layout>
    @php
        $name = 'name_' . app()->currentLocale();
        $feedback = 'feedback_' . app()->currentLocale();
    @endphp

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('admin.Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.notification.index') }}">{{ __('admin.Notifications') }}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{ __('admin.Notification Details') }}</li>
    </x-slot:breadcrumb>

    <!-- تفاصيل الإشعار -->
    @can('view', 'App\\Models\Notification')


    <div class="col-span-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-3 sm:mb-0">{{ __('admin.Notification Details') }}</h5>
            </div>
            <div class="card-body pt-3">
                <div class="table-responsive">
                    {{-- <table class="table table-bordered">
                        <tr>
                            <th>{{ __('admin.ID') }}</th>
                            <td>{{ $notification->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('admin.Source') }}</th>
                            <td>{{ $notification->source }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('admin.Message') }}</th>
                            <td>{{ $notification->data['message'] }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('admin.Date') }}</th>
                            <td>{{ $notification->created_at->toFormattedDateString() }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('admin.Status') }}</th>
                            <td>
                                @if($notification->read_at)
                                    <span class="badge bg-success">{{ __('admin.Read') }}</span>
                                @else
                                    <span class="badge bg-warning">{{ __('admin.Unread') }}</span>
                                @endif
                            </td>
                        </tr>
                    </table> --}}

                    {{-- <div class="card-body">
                        <p><strong>Name:</strong> {{ $notification->data['name'] }}</p>
                        <p><strong>Email:</strong> {{ $notification->data['email'] }}</p>
                        <p><strong>Phone:</strong> {{ $notification->data['phone'] }}</p>
                        <p><strong>Message:</strong> {{ $notification->data['message'] }}</p>
                        <p><strong>Source:</strong> {{ $notification->data['source'] ?? 'Unknown' }}</p>
                        <p><strong>Received at:</strong> {{ $notification->created_at }}</p>
                    </div> --}}

                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $notificationData['name'] ?? 'No Name' }}</p>
                        <p><strong>Email:</strong> {{ $notificationData['email'] ?? 'No Email' }}</p>
                        <p><strong>Phone:</strong> {{ $notificationData['phone'] ?? 'No Phone' }}</p>
                        <p><strong>Message:</strong> {{ $notificationData['message'] ?? 'No Message' }}</p>
                        <p><strong>Source:</strong> {{ $notificationData['source'] ?? 'Unknown' }}</p>
                        <p><strong>Received at:</strong> {{ $notification->created_at }}</p>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.notification.index') }}" class="btn btn-secondary">{{ __('admin.Back to Notifications') }}</a>
            </div>
        </div>
    </div>
    @endcan
</x-dashboard-layout>
