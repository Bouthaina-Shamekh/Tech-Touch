<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header flex items-center py-4 px-6 h-header-height">
            <a href="" class="b-brand flex items-center gap-3">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{asset('assets-dashboard/images/logo-dark.svg')}}" class="img-fluid logo-lg" alt="logo" style="display: none"  />
                <div  style="width: 232px;">
                    <img src="{{asset('asset/img/logoBrand.png')}}" class="img-fluid logo-lg" alt="logo" />
                </div>
            </a>
        </div>
        <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
            <div class="card pc-user-card mx-[15px] mb-[15px] bg-theme-sidebaruserbg dark:bg-themedark-sidebaruserbg">
                <div class="card-body !p-5">
                    <div class="flex items-center">
                        <img class="shrink-0 w-[45px] h-[45px] rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                            alt="user-image" />
                        <div class="ml-4 mr-2 grow">
                            <h6 class="mb-0">{{ Auth::user()->name }}</h6>

                        </div>
                        <a class="shrink-0 btn btn-icon inline-flex btn-link-secondary" data-pc-toggle="collapse"
                            href="#pc_sidebar_userlink">
                            <svg class="pc-icon w-[22px] h-[22px]">
                                <use xlink:href="#custom-sort-outline"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="hidden pc-user-links" id="pc_sidebar_userlink">
                        <div class="pt-3 *:flex *:items-center *:py-2 *:gap-2.5 hover:*:text-primary-500">
                            <a href="#!">
                                <i class="text-lg leading-none ti ti-user"></i>
                                <span>{{__('admin.My_account')}}</span>
                            </a>
                            <a href="{{route('admin.setting.index')}}">
                                <i class="text-lg leading-none ti ti-settings"></i>
                                <span>{{__('admin.Settings')}}</span>
                            </a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" style="display: flex; align-items: center; gap: 5px;">
                                    <i class="text-lg leading-none ti ti-power"></i>
                                    <span>{{__('admin.Logout')}}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="{{route('admin.home')}}" class="pc-link">
                        <span class="pc-micon">
                            <span class="pc-micon">
                                <i class="fas fa-home"></i>
                            </span>
                        </span>
                        <span class="pc-mtext">{{__('admin.Home')}}</span>
                    </a>
                </li>
                {{-- <li class="pc-item pc-caption">
                    <label>{{__('Basic')}}</label>
                </li> --}}
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-h-square"></i>
                        </span>
                        <span class="pc-mtext">
                            {{__('admin.Home Page')}}
                        </span>
                        @if (App::getLocale() == 'en')
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        @else
                        <span class="pc-arrow"><i data-feather="chevron-left"></i></span>
                        @endif
                    </a>
                    <ul class="pc-submenu">


                        <li class="pc-item">
                            <a href="{{route('admin.notification.index')}}" class="pc-link">
                                <svg class="pc-micon">
                                    <use xlink:href="#custom-notification"></use>
                                </svg>
                                <span class="pc-mtext">{{__('admin.Notifications')}}</span>
                            </a>
                        </li>

                        <li class="pc-item">
                            <a class="pc-link" href="{{route('admin.question.index')}}">
                                {{__('admin.Questions')}}
                            </a>
                        </li>

                        <li class="pc-item">
                            <a class="pc-link" href="{{route('admin.hero.index')}}">
                                {{__('admin.Hero')}}
                            </a>
                        </li>
                        <li class="pc-item">
                            <a class="pc-link" href="{{route('admin.slider.index')}}">
                                {{__('admin.Slider')}}
                            </a>
                        </li>

                        <li class="pc-item">
                            <a class="pc-link" href="{{route('admin.service.index')}}">
                                {{__('admin.Service')}}
                            </a>
                        </li>



                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-puzzle-piece"></i>
                        </span>
                        <span class="pc-mtext">
                            {{__('admin.Sections Site')}}
                        </span>
                        @if (App::getLocale() == 'en')
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        @else
                        <span class="pc-arrow"><i data-feather="chevron-left"></i></span>
                        @endif
                    </a>
                    <ul class="pc-submenu">

                        <li class="pc-item">
                            <a class="pc-link" href="{{route('admin.file.index')}}">
                                {{__('admin.File')}}
                            </a>
                        </li>

                        <li class="pc-item">
                            <a class="pc-link" href="{{route('admin.partner.index')}}">
                                {{__('admin.Partner')}}
                            </a>
                        </li>


                        <li class="pc-item">
                            <a class="pc-link" href="{{route('admin.work.index')}}">
                                {{__('admin.Works')}}
                            </a>
                        </li>

                        <li class="pc-item">
                            <a class="pc-link" href="{{route('admin.team.index')}}">
                                {{__('admin.Team')}}
                            </a>
                        </li>


                        <li class="pc-item">
                            <a class="pc-link" href="{{route('admin.client.index')}}">
                                {{__('admin.clients')}}
                            </a>
                        </li>

                        <li class="pc-item">
                            <a class="pc-link" href="{{route('admin.feature.index')}}">
                                {{__('admin.Feature')}}
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
            <ul class="pc-navbar">
                {{-- <li class="pc-item pc-caption">
                    <label>{{__('Settings')}}</label>
                </li> --}}
                <li class="pc-item">
                    <a href="{{route('admin.media.index')}}" class="pc-link">
                        <span class="pc-micon">
                            <span class="pc-micon">
                                <i class="fas fa-images"></i>
                            </span>
                        </span>
                        <span class="pc-mtext">{{__('admin.Media')}}</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="pc-mtext">
                            {{__('admin.Users')}}
                        </span>
                        @if (App::getLocale() == 'en')
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        @else
                        <span class="pc-arrow"><i data-feather="chevron-left"></i></span>
                        @endif
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="">
                                {{__('admin.Users')}}
                            </a>
                        </li>
                        {{-- <li class="pc-item">
                            <a class="pc-link" href="">
                                {{__('admin.Roles')}}
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="pc-item">
                    <a href="{{route('admin.setting.index')}}" class="pc-link">
                        <span class="pc-micon">
                            <span class="pc-micon">
                                <i class="text-lg leading-none ti ti-settings"></i>
                            </span>
                        </span>
                        <span class="pc-mtext">{{__('admin.Settings')}}</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
