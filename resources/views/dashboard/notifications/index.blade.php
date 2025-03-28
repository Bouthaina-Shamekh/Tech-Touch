<x-dashboard-layout>
    @php
        $name = 'name_' . app()->currentLocale();
        $feedback = 'feedback_' . app()->currentLocale();
    @endphp

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('admin.Home') }}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{ __('admin.Notifications') }}</li>
    </x-slot:breadcrumbs>

    @can('view', 'App\\Models\Notification')
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
                                <th>{{ __('admin.Name') }}</th>
                                <th>{{ __('admin.Email') }}</th>
                                <th>{{ __('admin.Phone') }}</th>
                                <th>{{ __('admin.Message') }}</th>
                                <th>{{ __('admin.Source') }}</th>
                                <th>{{ __('admin.Date') }}</th>
                                <th>{{ __('admin.Status') }}</th>
                                <th>{{ __('admin.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->notifications as $notificationS)
                                @if ($notificationS->data['source'] == 'contact')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $notificationS->data['name'] }}</td>
                                    <td>{{ $notificationS->data['email'] }}</td>
                                    <td>{{ $notificationS->data['phone'] }}</td>
                                    <td>{{ $notificationS->data['message'] ?? '' }}</td>
                                    <td>
                                        <span class="badge bg-info-500">{{ $notificationS->data['source'] ?? 'Unknown' }}</span>
                                    </td>
                                    <td>{{ $notificationS->created_at->format('Y-m-d h:i') }}</td>
                                    <td>
                                        @if ($notificationS->read_at)
                                            <span class="badge bg-success">{{ __('admin.Read') }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ __('admin.Unread') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($notificationS->deleted_at)
                                            <span class="badge bg-danger">{{ __('admin.Deleted') }}</span>
                                        @else
                                            <a href="{{ route('admin.notification.show', $notificationS['id']) }}" class="badge bg-success">{{ __('admin.View') }}</a>
                                        @endif
                                    </td>
                                </tr>
                                @else
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $notificationS->data['first_name'] }} {{ $notificationS->data['last_name'] }}</td>
                                    <td>{{ $notificationS->data['email'] }}</td>
                                    <td>{{ $notificationS->data['phone'] }}</td>
                                    <td>{{ $notificationS->data['consultation'] ?? '' }}</td>
                                    <td>
                                        <span class="badge bg-primary-500">{{ $notificationS->data['source'] ?? 'Unknown' }}</span>
                                    </td>
                                    <td>{{ $notificationS->created_at->format('Y-m-d h:i') }}</td>
                                    <td>
                                        @if ($notificationS->read_at)
                                            <span class="badge bg-success">{{ __('admin.Read') }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ __('admin.Unread') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($notificationS->deleted_at)
                                            <span class="badge bg-danger">{{ __('admin.Deleted') }}</span>
                                        @else
                                            <a href="{{ route('admin.notification.show', $notificationS['id']) }}" class="badge bg-success">{{ __('admin.View') }}</a>
                                        @endif
                                    </td>
                                </tr>
                                @endif

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endcan
</x-dashboard-layout>
