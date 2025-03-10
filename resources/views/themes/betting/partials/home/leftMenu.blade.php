@php
    $segments = request()->segments();
    $last  = end($segments);
@endphp


<ul class="main">

    {{--    ========== CASINO MENU --}}

    <li><a data-bs-toggle="collapse" href="#collapse26" role="button" aria-expanded="false"
           aria-controls="collapseExample" class="dropdown-toggle collapsed">
            <i aria-hidden="true" class="fal fa-cricket"></i>
            CASINO LIVE
            <span class="count"><span class="font-italic">(6)</span></span></a>
        <div id="collapse26" class="collapse" style="">
            <ul>
                <li><a href="{{route('dream.gaming')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Dream Gaming</a></li>

                <li><a href="{{route('evolution.live')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Evolution Live</a></li>

                <li><a href="{{route('ezugi.live')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Ezugi Live</a></li>
                <li><a href="{{route('pragmatic.play.live')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Pragmatic Play Live</a></li>
                <li><a href="{{route('sa.gaming')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> SA Gaming</a></li>
                <li><a href="{{route('sexy')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Sexy</a></li>
            </ul>
        </div>
    </li>

    {{--    Crash Game--}}
    <li><a data-bs-toggle="collapse" href="#collapse27" role="button" aria-expanded="false"
           aria-controls="collapseExample" class="dropdown-toggle collapsed">
            <i aria-hidden="true" class="fal fa-cricket"></i>
            Crash Game
            <span class="count"><span class="font-italic">(1)</span></span></a>
        <div id="collapse27" class="collapse" style="">
            <ul>
                {{--                <li><a href="{{route('crash.game')}}" class="sidebar-link "><i--}}
                {{--                            aria-hidden="true" class="far fa-hand-point-right"></i> Crash Games</a></li>--}}

                <li><a href="{{route('spribe')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Spribe</a></li>

                {{--                <li><a href="{{route('x.game')}}" class="sidebar-link "><i--}}
                {{--                            aria-hidden="true" class="far fa-hand-point-right"></i> X Gaming</a></li>--}}
            </ul>
        </div>
    </li>

    {{--    slot Game--}}
    <li><a data-bs-toggle="collapse" href="#collapse28" role="button" aria-expanded="false"
           aria-controls="collapseExample" class="dropdown-toggle collapsed">
            <i aria-hidden="true" class="fal fa-cricket"></i>
            Slot Game
            <span class="count"><span class="font-italic">(10)</span></span></a>
        <div id="collapse28" class="collapse" style="">
            <ul>

                <li><a href="{{route('cqnine')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> CQ9</a></li>

                <li><a href="{{route('easy.gaming')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Eazy Gaming</a></li>

                {{--                <li><a href="{{route('fachai.gaming')}}" class="sidebar-link "><i--}}
                {{--                            aria-hidden="true" class="far fa-hand-point-right"></i> FaChai Gaming</a></li>--}}

                <li><a href="{{route('ideal')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> iDeal</a></li>

                <li><a href="{{route('jbl.gaming')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> JDB Gaming</a></li>

                <li><a href="{{route('jili')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Jili</a></li>

                <li><a href="{{route('pg.soft')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Pg Soft</a></li>

                <li><a href="{{route('pgs.gaming')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Pgs Gaming</a></li>

                <li><a href="{{route('pragmatic.gaming')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Pragmatic</a></li>

                <li><a href="{{route('tada.gaming')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> TADA Gaming</a></li>

                <li><a href="{{route('yea.bet')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Yea Bet</a></li>

            </ul>
        </div>
    </li>

    <li><a data-bs-toggle="collapse" href="#collapse29" role="button" aria-expanded="false"
           aria-controls="collapseExample" class="dropdown-toggle collapsed">
            <i aria-hidden="true" class="fal fa-cricket"></i>
            Sports
            <span class="count"><span class="font-italic">(6)</span></span></a>
        <div id="collapse29" class="collapse" style="">
            <ul>
                <li><a href="{{route('bti')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> BTI</a></li>

                <li><a href="{{route('esports')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> E Sports</a></li>

                <li><a href="{{route('luck.sport')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> Luck Sports Gaming</a></li>

                <li><a href="{{route('saba.sports')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> SABA Sports</a></li>
                <li><a href="{{route('united.sports')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> United Gaming</a></li>

                <li><a href="{{route('wm')}}" class="sidebar-link "><i
                            aria-hidden="true" class="far fa-hand-point-right"></i> WM</a></li>

            </ul>
        </div>
    </li>


    <li>
        <a @if(Request::routeIs('live/casino')) class="active" @endif
        href="{{route('table.game')}}">
            <i class="far fa-globe-americas"></i> <span>{{trans('Table Game')}}</span>
        </a>
    </li>

    <li>
        <a @if(Request::routeIs('live/casino')) class="active" @endif
        href="{{route('lottery')}}">
            <i class="far fa-globe-americas"></i> <span>{{trans('Lottery')}}</span>
        </a>
    </li>


    {{--    <li><a data-bs-toggle="collapse" href="#collapse27" role="button" aria-expanded="false"--}}
    {{--           aria-controls="collapseExample" class="dropdown-toggle collapsed"><i aria-hidden="true"--}}
    {{--                                                                                class="fal fa-cricket"></i>Cricket--}}
    {{--            <span class="count"><span class="font-italic">(5)</span></span></a>--}}
    {{--        <div id="collapse27" class="collapse" style="">--}}
    {{--            <ul>--}}
    {{--                <li><a href="https://prophecy.bugfinder.app/tournament/ipl/28" class="sidebar-link "><i--}}
    {{--                            aria-hidden="true" class="far fa-hand-point-right"></i> IPL</a></li>--}}
    {{--                <li><a href="https://prophecy.bugfinder.app/tournament/world-cup/29" class="sidebar-link "><i--}}
    {{--                            aria-hidden="true" class="far fa-hand-point-right"></i> World Cup</a></li>--}}
    {{--                <li><a href="https://prophecy.bugfinder.app/tournament/big-bash/30" class="sidebar-link "><i--}}
    {{--                            aria-hidden="true" class="far fa-hand-point-right"></i> Big Bash</a></li>--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--    </li>--}}


    {{--    @forelse($gameCategories as $gameCategory)--}}
    {{--        <li>--}}
    {{--            <a--}}
    {{--                class="dropdown-toggle "--}}
    {{--                data-bs-toggle="collapse"--}}
    {{--                href="#collapse{{$gameCategory->id}}"--}}
    {{--                role="button"--}}
    {{--                aria-expanded="true"--}}
    {{--                aria-controls="collapseExample">--}}
    {{--                {!! $gameCategory->icon!!}{{$gameCategory->name}}--}}
    {{--                <span class="count"><span class="font-italic">({{$gameCategory->game_active_match_count}})</span></span>--}}
    {{--            </a>--}}
    {{--            <!-- dropdown item -->--}}

    {{--            <div class="collapse {{($loop->index == 0) ? 'show' :''}}" id="collapse{{$gameCategory->id}}">--}}
    {{--                <ul class="">--}}
    {{--                    @forelse($gameCategory->activeTournament as $tItem)--}}
    {{--                        <li>--}}
    {{--                            <a href="{{route('tournament',[slug($tItem->name) , $tItem->id ])}}"--}}
    {{--                               class="sidebar-link {{( Request::routeIs('tournament') && $last == $tItem->id) ? 'active' : '' }}">--}}
    {{--                                <i class="far fa-hand-point-right"></i> {{$tItem->name}}</a>--}}
    {{--                        </li>--}}
    {{--                    @empty--}}
    {{--                    @endforelse--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </li>--}}
    {{--    @empty--}}
    {{--    @endforelse--}}
</ul>
