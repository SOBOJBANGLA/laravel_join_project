<!-- navbar -->
<nav class="navbar navbar-expand-md fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{ asset('images/Pro gaming logo.png') }}" alt="BengalBet" class="header-logo"/>
        </a>
        <button
            class="navbar-toggler p-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                {{-- <li class="nav-item ">
                    <a class="nav-link {{menuActive('home')}}" href="{{route('home')}}">@lang('Home') </a>
                </li> --}}
                <div class="accordion d-block d-md-none shadow-sm rounded">
                    <div class="accordion-item">
                        <a class="accordion-button bg-primary- text-white {{menuActive('front')}}" href="{{route('home')}}"> <i class="fa fa-home"></i> @lang('HOME') </a>
                    </div>
                </div>
                    <div class="accordion d-block d-md-none shadow-sm rounded border-" id="exampleAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-primary- text-white fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseExample11" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-dice"></i> CASINO LIVE
                                </button>
                            </h2>
                            <div id="collapseExample11" class="accordion-collapse collapse">
                                <div class="accordion-body- bg-light">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <a href="{{route('dream.gaming')}}" class="text-decoration-none text-dark">
                                                <i class="far fa-circle"></i> Dream Gaming
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{route('evolution.live')}}" class="text-decoration-none text-dark">
                                                <i class="far fa-circle"></i> Evolution Live
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{route('ezugi.live')}}" class="text-decoration-none text-dark">
                                                <i class="far fa-circle"></i> Ezugi Live
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="{{route('pragmatic.play.live')}}" class="text-decoration-none text-dark">
                                                <i class="far fa-circle"></i> Pragmatic Play Live
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="{{route('sa.gaming')}}" class="text-decoration-none text-dark">
                                                <i class="far fa-circle"></i> SA Gaming
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="{{route('sexy')}}" class="text-decoration-none text-dark">
                                                <i class="far fa-circle"></i> Sexy
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="accordion d-block d-md-none shadow-sm rounded border-" id="exampleAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-primary- text-white fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample12" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-dice"></i> Crash Game
                            </button>
                        </h2>
                        <div id="collapseExample12" class="accordion-collapse collapse">
                            <div class="accordion-body- bg-light">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="{{route('spribe')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> Spribe
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="accordion d-block d-md-none shadow-sm rounded border-" id="exampleAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-primary- text-white fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample13" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-dice"></i> Slot Game
                            </button>
                        </h2>
                        <div id="collapseExample13" class="accordion-collapse collapse">
                            <div class="accordion-body- bg-light">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="{{route('cqnine')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> CQ9
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('easy.gaming')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> Eazy Gaming
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('ideal')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> iDeal
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('jbl.gaming')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> JDB Gaming
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('jili')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> Jili
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('pg.soft')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> Pg Soft
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('pgs.gaming')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> Pgs Gaming
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('pragmatic.gaming')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> Pragmatic
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('tada.gaming')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> TADA Gaming
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('yea.bet')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> Yea Bet
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="accordion d-block d-md-none shadow-sm rounded border-" id="exampleAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-primary- text-white fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample14" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-dice"></i> Sports
                            </button>
                        </h2>
                        <div id="collapseExample14" class="accordion-collapse collapse">
                            <div class="accordion-body- bg-light">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="{{route('bti')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> BTI
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('esports')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> E Sports
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('luck.sport')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> Luck Sports Gaming
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('saba.sports')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> SABA Sports
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('united.sports')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> United Gaming
                                        </a>
                                    </li>

                                    <li class="list-group-item">
                                        <a href="{{route('wm')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> WM
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="accordion d-block d-md-none shadow-sm rounded border-" id="exampleAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-primary- text-white fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample15" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-dice"></i> Table Game
                            </button>
                        </h2>
                        <div id="collapseExample15" class="accordion-collapse collapse">
                            <div class="accordion-body- bg-light">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="{{route('table.game')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> Table Game
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion d-block d-md-none shadow-sm rounded border-" id="exampleAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-primary- text-white fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample16" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-dice"></i> Lottery
                            </button>
                        </h2>
                        <div id="collapseExample16" class="accordion-collapse collapse">
                            <div class="accordion-body- bg-light">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="{{route('lottery')}}" class="text-decoration-none text-dark">
                                            <i class="far fa-circle"></i> Lottery Game
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                               {{-- <li class="nav-item"> --}}
                                   {{-- <a class="nav-link {{menuActive('about')}}" href="{{route('about')}}">@lang('About')</a> --}}
                               {{-- </li> --}}
                               {{-- <li class="nav-item"> --}}
                                   {{-- <a class="nav-link {{menuActive('faq')}}" href="{{route('faq')}}">@lang('FAQ')</a> --}}
                               {{-- </li> --}}
                               {{-- <li class="nav-item"> --}}
                                   {{-- <a class="nav-link {{menuActive('blog')}}" href="{{route('blog')}}">@lang('Blog')</a> --}}
                               {{-- </li> --}}
                               {{-- <li class="nav-item"> --}}
                                   {{-- <a class="nav-link {{menuActive('contact')}}" href="{{route('contact')}}">@lang('Contact')</a> --}}
                               {{-- </li> --}}
            </ul>
        </div>
        <div class="navbar-text">
            <button onclick="darkMode()" class="btn-custom light night-mode">
                <i class="fal fa-moon"></i>
            </button>


            @auth
                <div class="dropdown user-dropdown d-inline-block">
                    <button class="dropdown-toggle">
                        <i class="fal fa-user"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{menuActive('user.home')}}" href="{{route('user.home')}}">
                                <i class="fa fa-home"></i>
                                @lang('Dashboard')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{menuActive('user.addFund')}}" href="{{route('user.addFund')}}">
                                <i class="fal fa-money-bill"></i>
                                @lang('Make a deposit')
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item {{menuActive('user.payout.money')}}"
                               href="{{route('user.payout.money')}}">
                                <i class="fas fa-envelope-open-dollar"></i>
                                @lang('withdraw funds')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{menuActive('user.referral')}}" href="{{route('user.referral')}}">
                                <i class="fal fa-user-friends"></i>
                                @lang('invite friends')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{menuActive('user.profile')}}" href="{{route('user.profile')}}">
                                <i class="fal fa-user"></i>
                                @lang('personal profile')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{menuActive('user.betHistory')}}"
                               href="{{route('user.betHistory')}}">
                                <i class="fal fa-history"></i>
                                @lang('bet history')
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                @lang('Sign Out')
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth

            <!-- notification panel -->
            <div class="notification-panel" id="pushNotificationArea">
                @auth
                    @if(config('basic.push_notification') == 1)
                        <button class="dropdown-toggle" v-cloak>
                            <i class="fal fa-bell"></i>
                            <span v-if="items.length > 0" class="count">@{{ items.length }}</span>
                        </button>
                        <ul class="notification-dropdown">
                            <div class="dropdown-box">
                                <li>
                                    <a v-for="(item, index) in items"
                                       @click.prevent="readAt(item.id, item.description.link)"
                                       class="dropdown-item" href="javascript:void(0)">
                                        <i class="fal fa-bell"></i>
                                        <div class="text">
                                            <p v-cloak>@{{ item.formatted_date }}</p>
                                            <span v-cloak v-html="item.description.text"></span>
                                        </div>
                                    </a>
                                </li>
                            </div>
                            <div class="clear-all fixed-bottom">
                                <a v-if="items.length > 0" @click.prevent="readAll"
                                   href="javascript:void(0)">@lang('Clear all')</a>
                                <a v-if="items.length == 0"
                                   href="javascript:void(0)">@lang('You have no notifications')</a>
                            </div>
                        </ul>
                    @endif
                @endauth

                @guest
                    <!-- login register button -->
                    <button
                        class="btn-custom"
                        data-bs-toggle="modal"
                        data-bs-target="#registerModal">
                        @lang('Join')
                    </button>
                    <button
                        class="btn-custom"
                        data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        @lang('Login')
                    </button>
                @endguest
            </div>
        </div>
    </div>
</nav>

@if(in_array(Request::route()->getName(),['home','category','tournament','match']))

    <div class="bottom-bar fixed-bottom text-center">
        <a href="{{route('home')}}" class="text-dark">
            <i class="fa fa-home"></i>
            @lang('Home')
        </a>
        <a href="javascript:void(0)" class="text-dark" onclick="toggleSidebar('leftbar')">
            <i class="far fa-globe-americas"></i>
            @lang('Sports')
        </a>

        <a href="javascript:void(0)" class="text-dark" onclick="toggleSidebar('rightbar')">
            <i class="fal fa-ticket-alt"></i>
            @lang('Bet Slip')
        </a>

        @guest
            <a href="{{route('login')}}" class="text-dark">
                <i class="fa fa-sign-in"></i>
                @lang('Login')
            </a>
        @endguest

        @auth
            <a href="{{route('user.home')}}" class="text-dark">
                <i class="fal fa-user"></i>
                @lang('Dashboard')
            </a>
        @endauth

    </div>
@endif
