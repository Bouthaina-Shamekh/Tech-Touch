<x-dashboard-layout>
    @php
        $name = 'name_' . app()->currentLocale();
        $feedback = 'feedback_' . app()->currentLocale();
    @endphp

    <x-slot:breadcrumbs>
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('admin.Home') }}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{ __('admin.Notification.index') }}</li>
    </x-slot:breadcrumb>

    <!-- إشعارات جديدة -->
    {{-- <div class="col-span-12 mb-4">
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
                            </tr>
                        </thead>
                        <tbody id="notifications-list">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="col-span-12">
        <div class="card table-card">
            <div class="card-header">
                <div class="sm:flex items-center justify-between">
                    <h5 class="mb-3 sm:mb-0">{{__('admin.Teams')}}</h5>
                    <div>
                        <a href="{{route('admin.team.create')}}" class="btn btn-primary" >
                            {{__('admin.Add Teams')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-3">
                <div class="table-responsive" style="margin: 0 15px;">
                    


@foreach($notifications as $notification)
    <div class="card mb-2 {{ $notification->read_at ? 'bg-light' : 'bg-warning' }}">
        <div class="card-body">
            <div class="flex gap-4">
                <div class="shrink-0">
                    @if ($notification->type == 'App\Notifications\ContactNotification')
                        <svg class="pc-icon text-primary w-[22px] h-[22px]">
                            <use xlink:href="#custom-sms"></use>
                        </svg>
                    @else
                        <svg class="pc-icon text-primary w-[22px] h-[22px]">
                            <use xlink:href="#custom-document-text"></use>
                        </svg>
                    @endif
                </div>
                <div class="grow">
                    <span class="float-end text-sm text-muted">{{ $notification->created_at->format('Y-m-d h:i') }}</span>
                    <h5 class="text-body mb-2">{{ $notification->data['name'] ?? 'N/A' }}</h5>
                    <p class="mb-0">{{ $notification->data['email'] ?? 'N/A' }}</p>
                    <p class="mb-0">{{ $notification->data['phone'] ?? 'N/A' }}</p>
                    <p class="mb-0">{{ $notification->data['message'] ?? 'N/A' }}</p>
                    <p class="text-sm text-muted mb-0">
                        <strong>Source: </strong>{{ $notification->data['source'] ?? 'Unknown' }}
                    </p>
                </div>
            </div>
        </div>
        {{-- رابط التنقل لصفحة التفاصيل --}}
        <a href="{{ route('admin.notification.show', $notification->id) }}" class="stretched-link"></a>
    </div>
@endforeach



                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>

<script>
    @auth
        const userId = <?= Auth::user()->id ?>;
    @endauth

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    // Initialize Pusher
    const pusher = new Pusher('4e7b4215841c9ad639ad', {
        cluster: 'mt1'
    });

    // Subscribe to the 'contact' channel
    const channel = pusher.subscribe('contact');

    // Bind the 'notify' event
    channel.bind('notify', function(data) {
        // Ensure the notification is for the current user
        if (data.user_id === userId) {
            // Update the notifications list dynamically
            const notificationRow = `
                <tr>
                    <td>${data.id}</td>
                    <td>${data.source}</td>
                    <td>${data.message}</td>
                    <td>${new Date(data.created_at).toLocaleString()}</td>
                    <td><span class="badge bg-success">${data.status}</span></td>
                </tr>
            `;
            // Append the notification to the notifications table
            document.getElementById('notifications-list').insertAdjacentHTML('beforeend', notificationRow);

            // Optionally: Update the notification count or unread notifications
            $("#notifications_count").load(window.location.href + " #notifications_count");
        }
    });
</script>
