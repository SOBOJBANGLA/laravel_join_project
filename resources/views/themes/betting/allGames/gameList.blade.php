@extends($theme.'layouts.app')
@section('title',trans('Home'))

@section('content')

    <!-- wrapper -->
    <div id="getMatchList" v-cloak>
       
            @include($theme.'partials.home.slider')

            <div class="d-flex">
                
                <img
                  src="{{asset('images/index-announcement-icon.png')}}"
                  alt="index-announcement-icon"
                /><marquee behavior="" direction=""
                  >Lorem Ipsum is simply dummy text of the printing and typesetting
                  industry. Lorem Ipsum has been the industry's standard dummy</marquee
                >
              </div>


            <h6 class="section-title">Categories</h6>
            {{-- <div
              class="owl-carousel category-carousel"
              style="
                background: linear-gradient(45deg, #ff6b00, #ff8533);
                padding: 2px 0;
              "
            > --}}

    <!-- Category Bar -->
  
    
    <div class="category-bar-container">
        <div class="category-bar">
            <div class="category-item active" data-category="CASINO LIVE"><i class="fas fa-dice"></i> Casino Live</div>
            <div class="category-item" data-category="Crash Game"><i class="fas fa-chart-line"></i> Crash</div>
            <div class="category-item" data-category="Slot Game"><i class="fas fa-coins"></i> Slots</div>
            <div class="category-item" data-category="Sports"><i class="fas fa-futbol"></i> Sports</div>
            <div class="category-item" data-category="Table Game"><i class="fas fa-table"></i> Table</div>
            <div class="category-item" data-category="Lottery"><i class="fas fa-ticket"></i> Lottery</div>
        </div>
    </div>

    


            {{-- <div class="category-item" data-category="Sports">
                <i class="fas fa-futbol"></i>
                <div>Sports</div>
              </div>
              <div class="category-item" data-category="CASINO LIVE">
                <i class="fas fa-dice"></i>
                <div>Casino</div>
              </div>
              <div class="category-item" data-category="Slot Game">
                <i class="fas fa-dice"></i>
          
                <div>Slots</div>
              </div>
              <div class="category-item" data-category="Table Game">
                <i class="fas fa-table"></i>
                <div>Table</div>
              </div>
              <div class="category-item" data-category="Crash Game">
                <i class="fas fa-chart-line"></i>
                <div>Crash</div>
              </div>
              <div class="category-item" data-category="Lottery">
                <i class="fas fa-ticket"></i>
                <div>Lottery</div>
              </div>
              <div class="category-item">
                <i class="fas fa-fish"></i>
                <div>Fishing</div>
              </div>
              <div class="category-item">
                <i class="fas fa-gamepad"></i>
                <div>Arcade</div>
              </div> --}}
      

    <!-- Options Bar -->
    <div class="options-bar" id="options-bar">
        <!-- Default options will be loaded here -->
    </div>


            {{-- @include($theme.'partials.home.navbar') --}}
            {{--            @if(Request::routeIs('match'))--}}
            {{--                @include($theme.'partials.home.match')--}}
            {{--            @else--}}
            {{--                @include($theme.'partials.home.content')--}}
            {{--            @endif--}}
            

            <div class="row">
                @foreach($games as $games)
                    <div class="col-6 col-md-4"> <!-- Two per row on mobile, three on desktop -->
                        <div class="card" style="width: 100%">
                            <img class="card-img-top"
                                 src="{{$games->game_icon}}"
                                 alt="Card image cap" style="height: 200px;width: 100%">
            
                            @if(Auth::user())
                                <div class="card-body">
                                    <h5 class="card-title">{{$games->game_name}}</h5>
            
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$games->id}}"> <a href="{{route('game.open',$games->game_uuid)}}" target="_blank" style="color:white">
                                        Play </a>
                                    </button>
            
                                    <!-- Modal -->
                                    {{--  <div class="modal fade" id="exampleModal{{$games->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel{{$games->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel{{$games->id}}">Game Rules</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    সেরাবাজি ক্যাসিনোর নিয়মাবলীঃ (অত্যন্ত গুরুত্বপূর্ণ!)
                                                    <br><br>
                                                    লাভ এবং ক্ষতির অনুপাত:
                                                    ১ ক্রেডিট বাংলাদেশী টাকায় ১০ টাকার সমান । [ ১ = ১০ ]
            
                                                    কেউ যদি লাইভ ক্যাসিনো তে ১০ টাকা বাজি ধরেন তাহলে তার বাংলাদেশী টাকায়
                                                    ১০০ টাকা বাজি ধরা হয়েছে । কারণ লাইভ ক্যাসিনো গুলা ক্রেডিট আকারে কাজ
                                                    করতেছে ।
            
                                                    সমস্ত ক্যাসিনোর লাভ এবং ক্ষতির হিসাব এখন থেকে ১:১০ অনুপাত অনুযায়ী
                                                    হবে।
                                                    <br><br>
                                                    জয়ের নিয়ম:
                                                    ক্যাসিনোতে প্রতি ১ ক্রেডিট জয়ের জন্য আপনার এক্সচেঞ্জ অ্যাকাউন্টে ১০
                                                    গুণ বেশি পরিমাণ ক্রেডিট যোগ হবে।
                                                    উদাহরণ: যদি আপনি ক্যাসিনোতে ১,০০০ ক্রেডিট জিতেন, তাহলে আপনার
                                                    এক্সচেঞ্জ অ্যাকাউন্টে ১০,০০০ ক্রেডিট যোগ হবে।
            
                                                    <br><br>
                                                    ক্ষতির নিয়ম:
                                                    ক্যাসিনোতে প্রতি ১ ক্রেডিট ক্ষতির জন্য আপনার এক্সচেঞ্জ অ্যাকাউন্ট
                                                    থেকে ১০ গুণ বেশি পরিমাণ ক্রেডিট কাটা হবে।
                                                    উদাহরণ: যদি আপনি ক্যাসিনোতে ১,০০০ ক্রেডিট হারান, তাহলে আপনার
                                                    এক্সচেঞ্জ অ্যাকাউন্ট থেকে ১০,০০০ ক্রেডিট কেটে নেওয়া হবে।
                                                </div> 
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                    <a href="{{route('game.open',$games->game_uuid)}}" target="_blank">
                                                        <button type="button" class="btn btn-primary">Play</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>  
                            @else
                                <div class="card-body">
                                    <a href="{{route('login')}}" class="btn btn-primary">Play</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            


        </div>

  
@endsection

@push('script')

    @php
        $segments = request()->segments();
        $last  = end($segments);

    @endphp


    <script>
        $.ajax({
            type: "POST",
            url: "{{ route('game.callback') }}",
            data: {
                '_token': "{{ csrf_token() }}",
            },
            success: function (data) {
                console.log(data);


            }
        });
    </script>


    <script>
        let getMatchList = new Vue({
            el: "#getMatchList",
            data: {

                loaded: true,
                currency_symbol: "{{config('basic.currency_symbol')}}",
                currency: "{{config('basic.currency')}}",
                minimum_bet: "{{config('basic.minimum_bet')}}",
                allSports_filter: [],
                upcoming_filter: [],

                selectedData: {},
                betSlip: [],
                totalOdds: 0,
                minimumAmo: 1,
                return_amount: 0,
                win_charge: "{{config('basic.win_charge')}}",
                form: {
                    amount: ''
                },
                showType: 'live'
            },
            mounted() {
                var showType = localStorage.getItem('showType');
                if (showType == null) {
                    localStorage.setItem("showType", 'live');
                }
                this.showType = localStorage.getItem("showType")

                this.getMatches();
                this.getSlip();
                this.getEvents();


            },
            methods: {
                async getMatches() {
                    var _this = this;
                    var _segment = "{{Request::segment(1)}}"
                    var routeName = "{{Request::route()->getName()}}"
                    var $lastSegment = "{{$last}}"

                    var $url = '{{route('allSports')}}';

                    if (routeName == 'category') {
                        $url = '{{route('allSports')}}?categoryId=' + $lastSegment;
                    }
                    if (routeName == 'tournament') {
                        $url = '{{route('allSports')}}?tournamentId=' + $lastSegment;
                    }

                    if (routeName == 'match') {
                        $url = '{{route('allSports')}}?matchId=' + $lastSegment;
                    }


                    await axios.get($url)
                        .then(function (response) {
                            _this.allSports_filter = response.data.liveList;
                            _this.upcoming_filter = response.data.upcomingList;
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                },

                addToSlip(data) {
                    if (data.is_unlock_question == 1 || data.is_unlock_match == 1) {
                        return 0;
                    }
                    var _this = this;
                    const index = _this.betSlip.findIndex(object => object.match_id === data.match_id);
                    if (index === -1) {
                        _this.betSlip.push(data);
                        Notiflix.Notify.Success("Added to Bet slip");
                    } else {
                        var result = _this.betSlip.map(function (obj) {
                            if (obj.match_id == data.match_id) {
                                obj = data
                            }
                            return obj
                        });
                        _this.betSlip = result

                        Notiflix.Notify.Info("Bet slip has been updated");
                    }
                    _this.totalOdds = _this.oddsCalc(_this.betSlip)
                    localStorage.setItem("newBetSlip", JSON.stringify(_this.betSlip));
                },
                getSlip() {
                    var _this = this;
                    var selectData = JSON.parse(localStorage.getItem('newBetSlip'));
                    if (selectData != null) {
                        _this.betSlip = selectData;
                    } else {
                        _this.betSlip = []
                    }
                    _this.totalOdds = _this.oddsCalc(_this.betSlip)
                },

                removeItem(obj) {
                    var _this = this;
                    _this.betSlip.splice(_this.betSlip.indexOf(obj), 1);
                    _this.totalOdds = _this.oddsCalc(_this.betSlip)

                    var selectData = JSON.parse(localStorage.getItem('newBetSlip'));
                    var storeIds = selectData.filter(function (item) {
                        if (item.id === obj.id) {
                            return false;
                        }
                        return true;
                    });
                    localStorage.setItem("newBetSlip", JSON.stringify(storeIds));
                },

                oddsCalc(obj) {
                    var ratio = 1;
                    for (var property in obj) {
                        ratio *= parseFloat(obj[property].ratio);
                    }
                    return ratio.toFixed(3);
                },

                decrement() {
                    if (this.form.amount > this.minimumAmo) {
                        this.form.amount--;
                        this.return_amount = parseFloat(this.form.amount * this.totalOdds).toFixed(3);

                        return 0;
                    }
                    return 1;
                },
                increment() {
                    this.form.amount++;
                    this.return_amount = parseFloat(this.form.amount * this.totalOdds).toFixed(3);
                    return 0;
                },
                calc(val) {
                    if (isNaN(val)) {
                        val = 0
                    }
                    if (0 >= val) {
                        val = 0;
                    }
                    this.return_amount = parseFloat(val * this.totalOdds).toFixed(2);
                },

                goMatch(item) {
                    var $url = '{{ route("match", [":match_name",":match_id"]) }}';
                    $url = $url.replace(':match_name', item.slug);
                    $url = $url.replace(':match_id', item.id);
                    window.location.href = $url;
                },

                getEvents() {
                    let _this = this;
                    // Pusher.logToConsole = true;
                    let pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
                        encrypted: true,
                        cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
                    });
                    var channel = pusher.subscribe('match-notification');

                    channel.bind('App\\Events\\MatchNotification', function (data) {
                        console.log(data)
                        if (data && data.type == 'Edit') {
                            _this.updateEventData(data)
                        } else if (data && data.type != 'Edit') {
                            _this.enlistedEventData(data)
                        }
                    });

                },
                updateEventData(data) {
                    var _this = this;
                    var list = _this.allSports_filter;
                    const result = list.map(function (obj) {
                        if (obj.id == data.match.id) {
                            obj = data.match
                        }
                        return obj
                    });
                    _this.allSports_filter = result


                    var list2 = _this.upcoming_filter;


                    const upcomingResult = list2.map(function (obj) {
                        if (obj.id == data.match.id) {
                            obj = data.match
                        }
                        return obj
                    });

                    _this.upcoming_filter = upcomingResult
                },
                enlistedEventData(data) {
                    var _this = this;
                    if (data && data.type == 'Enlisted') {
                        var list = _this.allSports_filter;
                        list.push(data.match);
                    }
                    if (data && data.type == 'UpcomingList') {
                        var upcomingList = _this.upcoming_filter;
                        upcomingList.push(data.match);
                    }
                },
                betPlace() {
                    var _this = this;
                    var authCheck = "{{auth()->check()}}"
                    if (authCheck !== '1') {
                        window.location.href = "{{route('login')}}"
                        return 0;
                    }
                    if (_this.betSlip.length == 0) {
                        Notiflix.Notify.Failure("Please make a bet slip");
                        return 0
                    }
                    if (_this.form.amount == '') {
                        Notiflix.Notify.Failure("Please put a amount");
                        return 0
                    }
                    if (0 > (_this.form.amount)) {
                        Notiflix.Notify.Failure("Please put a valid amount");
                        return 0
                    }
                    if (parseInt(_this.minimum_bet) > parseInt(_this.form.amount)) {
                        Notiflix.Notify.Failure("Minimum Bet " + _this.minimum_bet + " " + _this.currency);
                        return 0
                    }
                    axios.post('{{route('user.betSlip')}}', {
                        amount: _this.form.amount,
                        activeSlip: _this.betSlip,
                    })
                        .then(function (response) {
                            if (response.data.errors) {
                                for (err in response.data.errors) {
                                    let error = response.data.errors[err][0]
                                    Notiflix.Notify.Failure("" + error);
                                }
                                return 0;
                            }
                            if (response.data.newSlipMessage) {
                                Notiflix.Notify.Warning("" + response.data.newSlipMessage);
                                var newSlip = response.data.newSlip;
                                var unlisted = _this.getDifference(_this.betSlip, newSlip);
                                const newUnlisted = unlisted.map(function (obj) {
                                    obj.is_unlock_match = 1;
                                    obj.is_unlock_question = 1;
                                    return obj
                                });
                                _this.betSlip.concat(newSlip, newUnlisted);
                                localStorage.setItem("newBetSlip", JSON.stringify(_this.betSlip));
                                return 0;
                            }

                            if (response.data.success) {
                                _this.betSlip = [];
                                localStorage.setItem("newBetSlip", JSON.stringify(_this.betSlip));
                                Notiflix.Notify.Success("Your bet has place successfully");

                                return 0;
                            }

                        })
                        .catch(function (err) {

                        });
                },

                getDifference(array1, array2) {
                    return array1.filter(object1 => {
                        return !array2.some(object2 => {
                            return object1.id === object2.id;
                        });
                    });
                },
                slicedArray(items) {
                    return Object.values(items)[0];
                },
                liveUpComing(type) {
                    localStorage.setItem("showType", type);
                    this.showType = type
                }


            }
        });
        // Category data with routes and icons
// Category data with routes
 const categoryOptions = {
            "CASINO LIVE": {
        "Dream Gaming": { "route": "<?= route('dream.gaming') ?>", "image": "<?= asset('assets/option/provider-awcmdg.png') ?>" },
        "Evolution Live": { "route": "<?= route('evolution.live') ?>", "image": "<?= asset('assets/option/provider-evo.png') ?>" },
        "Ezugi Live": { "route": "<?= route('ezugi.live') ?>", "image": "<?= asset('assets/option/icon-sbtech.png') ?>" },
        "Pragmatic Play Live": { "route": "<?= route('pragmatic.play.live') ?>", "image": "<?= asset('assets/option/provider-awcmpp.png') ?>" },
        "SA Gaming": { "route": "<?= route('sa.gaming') ?>", "image": "<?= asset('assets/option/provider-awcmsg.png') ?>" },
        "Sexy": { "route": "<?= route('sexy') ?>", "image": "<?= asset('assets/option/provider-awcmsexy.png') ?>" }
    },
    "Crash Game": {
        "Spribe": { "route": "<?= route('spribe') ?>", "image": "<?= asset('assets/option/provider-jdbaspribe.png') ?>" }
    },
    "Slot Game": {
        "CQ9": { "route": "<?= route('cqnine') ?>", "image": "<?= asset('assets/option/provider-cq9.png') ?>" },
        "Eazy Gaming": { "route": "<?= route('easy.gaming') ?>", "image": "<?= asset('assets/option/icon-promotion.png') ?>" },
        "iDeal": { "route": "<?= route('ideal') ?>", "image": "<?= asset('assets/option/provider-awcmdg.png') ?>" },
        "JDB Gaming": { "route": "<?= route('jbl.gaming') ?>", "image": "<?= asset('assets/option/provider-jdb.png') ?>" },
        "Jili": { "route": "<?= route('jili') ?>", "image": "<?= asset('assets/option/provider-awcmjili.png') ?>" },
        "Pg Soft": { "route": "<?= route('pg.soft') ?>", "image": "<?= asset('assets/option/provider-pg.png') ?>" },
        "Pgs Gaming": { "route": "<?= route('pgs.gaming') ?>", "image": "<?= asset('assets/option/provider-pg.png') ?>" },
        "Pragmatic": { "route": "<?= route('pragmatic.gaming') ?>", "image": "<?= asset('assets/option/provider-awcmpt.png') ?>" },
        "TADA Gaming": { "route": "<?= route('tada.gaming') ?>", "image": "<?= asset('assets/option/provider-awcmrt.png') ?>" },
        "Yea Bet": { "route": "<?= route('yea.bet') ?>", "image": "<?= asset('assets/option/provider-awcmyesbingo.png') ?>" }
    },
    "Sports": {
        "BTI": { "route": "<?= route('bti') ?>", "image": "<?= asset('assets/option/icon-sbtech.png') ?>" },
        "E Sports": { "route": "<?= route('esports') ?>", "image": "<?= asset('assets/option/icon-sportbook.png') ?>" },
        "Luck Sports Gaming": { "route": "<?= route('luck.sport') ?>", "image": "<?= asset('assets/option/provider-awcmpp.png') ?>" },
        "SABA Sports": { "route": "<?= route('saba.sports') ?>", "image": "<?= asset('assets/option/provider-saba.png') ?>" },
        "United Gaming": { "route": "<?= route('united.sports') ?>", "image": "<?= asset('assets/option/provider-awcmdg.png') ?>" },
        "WM": { "route": "<?= route('wm') ?>", "image": "<?= asset('assets/option/provider-worldmatch.png') ?>" },
        "Cricket": { "route": "<?= route('cricket.games') ?>", "image": "<?= asset('assets/option/icon-bat.png') ?>" }
    },
    "Table Game": {
        "Table Game": { "route": "<?= route('table.game') ?>", "image": "<?= asset('assets/option/icon-sbov2.png') ?>" }
    },
    "Lottery": {
        "Lottery Game": { "route": "<?= route('lottery') ?>", "image": "<?= asset('assets/option/provider-awcmkm.png') ?>" }
    }
        };

        // Function to load options dynamically
        function loadOptions(category) {
    let optionsHtml = '';
    if (categoryOptions[category]) {
        Object.entries(categoryOptions[category]).forEach(([option, data]) => {
            optionsHtml += `
                <a href="${data.route}" class="option-item">
                    <img src="${data.image}" alt="${option}">
                    <span>${option}</span>
                </a>`;
        });
    }
    $("#options-bar").html(optionsHtml);
}


        // Load first category options by default
        $(document).ready(function () {
            let firstCategory = $(".category-item:first").data("category");
            loadOptions(firstCategory);

            // Category click event
            $(".category-item").click(function () {
                $(".category-item").removeClass("active");
                $(this).addClass("active");
                let category = $(this).data("category");
                loadOptions(category);
            });
        });
    </script>
@endpush

