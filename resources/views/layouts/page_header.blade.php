<div id="page_top" class="section-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="left">
                <h1 class="page-title">@yield('title')</h1>
                @yield('header')
            </div>
            <div class="right">
                <ul class="nav nav-pills">
                    
                    <!-- Localization -->
                    <li class="nav-item dropdown">
                        @if (App::getLocale() == 'en')
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">English</a>
                        @elseif (App::getLocale() == 'ar')
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Arabic</a>
                        @endif
                        
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href=""><img class="w20 mr-2" src="{{ asset('assets/images/flags/us.svg') }}">English</a>
                        </div>
                    </li>

                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->currentTeam->name }}</a>
                            {{-- <div class="dropdown-menu custom-team-class">
                                <a class="dropdown-item" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"><i class="dropdown-icon fa fa-cog"></i> {{ __('Team Settings') }}</a>
                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <a class="dropdown-item" href="{{ route('teams.create') }}"><i class="dropdown-icon fa fa-pencil-square-o"></i> {{ __('Create New Team') }}</a>
                                @endcan
                               
                                @foreach (Auth::user()->allTeams() as $team)
                                    <a class="dropdown-item" href="#"><x-jet-switchable-team :team="$team" /></a>
                                @endforeach
                            </div> --}}
                        </li>
                    @endif
                    
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Project</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Graphics Design</a>                                    
                            <a class="dropdown-item" href="#">Angular Admin</a>
                            <a class="dropdown-item" href="#">PSD to HTML</a>
                            <a class="dropdown-item" href="#">iOs App Development</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Home Development</a>
                            <a class="dropdown-item" href="#">New Blog post</a>
                        </div>
                    </li> --}}
                </ul>
                <div class="notification d-flex">
                    <div class="dropdown d-flex">
                        <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success nav-unread"></span></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <ul class="right_chat list-unstyled w250 p-0">
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="{{ asset('assets/images/xs/avatar4.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">Donald Gardner</span>
                                                <span class="message">Designer, Blogger</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="{{ asset('assets/images/xs/avatar4.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">Wendy Keen</span>
                                                <span class="message">Java Developer</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="offline">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="{{ asset('assets/images/xs/avatar4.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">Matt Rosales</span>
                                                <span class="message">CEO, Epic Theme</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="{{ asset('assets/images/xs/avatar4.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">Phillip Smith</span>
                                                <span class="message">Writter, Mag Editor</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>                            
                                </li>                        
                            </ul>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                        </div>
                    </div>
                    <div class="dropdown d-flex">
                        <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-primary nav-unread" id="unseen_message_count"></span></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <ul class="list-unstyled feeds_widget" id="unseen_messages">
                                <li>
                                    <div class="feeds-left"><i class="fa fa-check"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-danger">Issue Fixed <small class="float-right text-muted">11:05</small></h4>
                                        <small>WE have fix all Design bug with Responsive</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="feeds-left"><i class="fa fa-user"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title">New User <small class="float-right text-muted">10:45</small></h4>
                                        <small>I feel great! Thanks team</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="feeds-left"><i class="fa fa-thumbs-o-up"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title">7 New Feedback <small class="float-right text-muted">Today</small></h4>
                                        <small>It will give a smart finishing to your site</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="feeds-left"><i class="fa fa-question-circle"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-warning">Server Warning <small class="float-right text-muted">10:50</small></h4>
                                        <small>Your connection is not private</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="feeds-left"><i class="fa fa-shopping-cart"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title">7 New Orders <small class="float-right text-muted">11:35</small></h4>
                                        <small>You received a new oder from Tina.</small>
                                    </div>
                                </li>                                   
                            </ul>
                            {{-- <div class="dropdown-divider"></div>
                            <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a> --}}
                        </div>
                    </div>
                    <div class="dropdown d-flex">
                        <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="dropdown-icon fe fe-user"></i>{{ __('Profile') }}</a>
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <a class="dropdown-item" href="{{ route('api-tokens.index') }}"><i class="dropdown-icon fe fe-cloud"></i>{{ __('API Tokens') }}</a>
                            @endif

                            {{-- <a class="dropdown-item" href="app-setting.html"><i class="dropdown-icon fe fe-settings"></i> Settings</a>
                            <a class="dropdown-item" href="javascript:void(0)"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="dropdown-icon fe fe-mail"></i> Inbox</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon fe fe-send"></i> Message</a> --}}
                            
                            <div class="dropdown-divider"></div>
                            {{-- <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon fe fe-help-circle"></i> Need help?</a> --}}
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"><i class="dropdown-icon fe fe-log-out"></i> {{ __('Logout') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>