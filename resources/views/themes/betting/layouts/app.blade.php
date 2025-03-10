<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 


    @include('partials.seo')


    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/skitter.css') }}"/>
    @stack('css-lib')
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/animate.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/owl.theme.default.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/aos.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/jquery.fancybox.min.css') }}"/>

    <script src="{{ asset('assets/admin/js/fontawesome/fontawesomepro.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/style.css') }}"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        @media (max-width: 768px) {
    .skitter-large-box {
        width: 100% !important;
        height: auto !important;
    }

   
    .skitter {
        width: 100% !important;
        height: auto !important;
        min-height: 150px !important; 
        max-height: 250px !important; 
        overflow: hidden !important; 
    }

  
    .skitter img.downBars {
        width: 100% !important;
        height: auto !important;
        object-fit: contain !important;
    }

  
    .skitter .label_text {
        bottom: 10px !important;
        font-size: 12px !important;
    }

    .skitter .label_text h2 {
        font-size: 14px !important;
    }
    
    .card-img-top {
        height: 120px !important;  
        object-fit: cover !important;  
    }

    
    .card-body {
        padding: 8px !important;  
    }

    
    .btn-custom, .btn-primary {
        font-size: 12px !important;
        padding: 5px 10px !important;  
    }

   
    .col-6, .col-md-4 {
        padding: 5px !important; 
    }

   
    .modal-body {
        font-size: 14px !important;
    }
}

     
html, body {
    overflow-x: hidden; 
    width: 100%; 
    margin: 0; 
}

/* Mobile Bottom Navigation Bar */
.mobile-bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #8FB568;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 8px 0; 
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
    z-index: 1050;
    height: 60px; 
    transition: transform 0.3s ease-in-out; 
}


.mobile-bottom-nav {
    transform: translateY(0); 
}

/* Icons and Text */
.mobile-bottom-nav .nav-item {
    color: #ffffff;
    text-align: center;
    flex: 1;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* Icons */
.mobile-bottom-nav .nav-item i {
    font-size: 20px;
    margin-bottom: 4px;
}
.mobile-bottom-nav .nav-item:hover {
    color: #ffd700; 
    cursor: pointer; 
}

body {
    padding-bottom: 70px; 
}

/* Hide on Desktop */
@media (min-width: 768px) {
    .mobile-bottom-nav {
        display: none;
    }
}
body {
    background-color: #233645;
    font-family: 'Poppins', sans-serif;
}

/* CATEGORY BAR */
.category-bar-container {
    overflow-x: auto;
    white-space: nowrap;
    padding-bottom: 5px;
}
.category-bar {
    display: flex;
    justify-content: center;
    flex-wrap: nowrap;
    gap: 10px;
    padding: 10px;
    background: #8FB568;
    border-radius: 10px;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
    width: max-content;
}

/* FULL WIDTH CATEGORY BAR ON DESKTOP */
@media (min-width: 768px) {
    .category-bar-container {
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .category-bar {
        width: 100%; 
        border-radius: 0; 
    }
}

/* CATEGORY ITEM */
.category-item {
    color: white;
    padding: 8px 12px;
    cursor: pointer;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 14px;
    font-weight: 600;
    transition: 0.3s;
}
.category-item i {
    font-size: 18px;
}
.category-item:hover, .category-item.active {
    background: white;
    color: #233645;
    transform: scale(1.03);
}

/* OPTIONS BAR */
.options-bar {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 8px;
    padding: 10px;
    
}
.option-item {
    width: 100px;
    height: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    background: #333333;
    color: white;
    font-size: 12px;
    font-weight: bold;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease-in-out;
    text-align: center;
    padding: 6px;
}

.option-item img {
    width: 40px;  
    height: 40px;
    margin-bottom: 5px; 
}

.option-item span {
    display: block;
    text-align: center;
}
.option-item:hover {
    background: white;
    color: #233645;
    transform: translateY(-2px);
}
.option-item i {
    font-size: 24px;
    margin-bottom: 6px;
}

/* RESPONSIVE DESIGN */
@media (max-width: 768px) {
  
    .category-bar-container {
        overflow-x: scroll;
        display: flex;
        justify-content: start;
    }
    .category-bar {
        flex-wrap: nowrap;
    }

    
    .options-bar {
        display: grid;
        grid-template-columns: repeat(5, 1fr); 
        gap: 3px; 
        justify-content: center;
      
    }
   .option-item {
        width: 75px;
        height: 75px;
        font-size: 10px;
        padding: 3px;
    }

    .option-item img {
        width: 30px; 
        height: 30px;
        margin-bottom: 3px;
    }
    .option-item i {
        font-size: 18px;
    }
}

    </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

   <!-- Bootstrap CSS -->
   
    @stack('style')

</head>

<body @if(session()->get('dark-mode') == 'true') class="dark-mode" @endif>


@include($theme.'partials.nav')
<br>
<br>
{{--@include($theme.'partials.banner')--}}

@yield('content')

@include($theme.'partials.bottombar')
@include($theme.'partials.footer')



@stack('extra-content')

@include($theme.'partials.modal-form')

<script src="{{ asset($themeTrue . 'js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/jquery-3.6.0.min.js') }}"></script>


<script src="{{ asset($themeTrue . 'js/jquery.skitter.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/owl.carousel.min.js') }}"></script>

@stack('extra-js')

<script src="{{ asset($themeTrue . 'js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/aos.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset($themeTrue . 'js/script.js') }}"></script>


<script src="{{asset('assets/global/js/pusher.min.js')}}"></script>
<script src="{{asset('assets/global/js/vue.min.js')}}"></script>
<script src="{{asset('assets/global/js/axios.min.js')}}"></script>
<script src="{{asset('assets/global/js/notiflix-aio-2.7.0.min.js')}}"></script>
<!-- Bootstrap JS (needed for offcanvas) -->


<!--Start of Tawk.to Script-->
 {{-- <script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/67781e4f49e2fd8dfe021de0/1igmjcq65';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script> --}}  

 <div id="telegram-chat-btn" style="
     position: fixed;
    bottom: 80px; /* Increase the distance from the bottom */
    right: 20px;
    background: #0088cc;
    padding: 15px 20px;
    border-radius: 50px;
    color: #fff;
    font-weight: bold;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
    cursor: pointer;
    text-align: center;
    z-index: 9999;">
    Chat on Telegram
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let telegramBtn = document.getElementById("telegram-chat-btn");

        // Ensure button stays visible
        telegramBtn.style.display = "block";

        // Open Telegram when button is clicked
        telegramBtn.addEventListener("click", function () {
            window.open("https://t.me/#", "_blank");  // Open chat with @shosy26
        });
    });
</script>
<!--End of Tawk.to Script-->

@include('plugins')

@auth
    @if(config('basic.push_notification') == 1)
        <script>
            'use strict';
            let pushNotificationArea = new Vue({
                el: "#pushNotificationArea",
                data: {
                    items: [],
                },
                mounted() {
                    this.getNotifications();
                    this.pushNewItem();
                },
                methods: {
                    getNotifications() {
                        let app = this;
                        axios.get("{{ route('user.push.notification.show') }}")
                            .then(function (res) {
                                app.items = res.data;
                            })
                    },
                    readAt(id, link) {
                        let app = this;
                        let url = "{{ route('user.push.notification.readAt', 0) }}";
                        url = url.replace(/.$/, id);
                        axios.get(url)
                            .then(function (res) {
                                if (res.status) {
                                    app.getNotifications();
                                    if (link != '#') {
                                        window.location.href = link
                                    }
                                }
                            })
                    },
                    readAll() {
                        let app = this;
                        let url = "{{ route('user.push.notification.readAll') }}";
                        axios.get(url)
                            .then(function (res) {
                                if (res.status) {
                                    app.items = [];
                                }
                            })
                    },
                    pushNewItem() {
                        let app = this;
                        // Pusher.logToConsole = true;
                        let pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
                            encrypted: true,
                            cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
                        });
                        let channel = pusher.subscribe('user-notification.' + "{{ Auth::id() }}");
                        channel.bind('App\\Events\\UserNotification', function (data) {
                            app.items.unshift(data.message);
                        });
                        channel.bind('App\\Events\\UpdateUserNotification', function (data) {
                            app.getNotifications();
                        });
                    }
                }
            });
        </script>
    @endif
@endauth
@stack('script')


@include($theme.'partials.notification')
<script>
    $(document).ready(function () {
        $(".language").find("select").change(function () {
            window.location.href = "{{route('language')}}/" + $(this).val()
        })
    })
    // dark mode
    const darkMode = () => {
        var $theme = document.body.classList.toggle("dark-mode");
        $.ajax({
            url: "{{ route('themeMode') }}/" + $theme,
            type: 'get',
            success: function (response) {
                console.log(response);
            }
        });
    };

</script>

</body>
</html>
