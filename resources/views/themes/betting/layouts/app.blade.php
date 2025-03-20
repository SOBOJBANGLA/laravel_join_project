<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BengalBet</title>


    @include('partials.seo')

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
  />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    rel="stylesheet"
  />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    rel="stylesheet"
  />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    rel="stylesheet"
  />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
        :root {
          --sidebar-width: 250px;
          --sidebar-collapsed-width: 70px;
          --primary-color: #ff6b00;
          --secondary-color: #2c2c2c;
          --text-color: #ffffff;
        }
  
        body {
          background-color: #1a1a1a;
          color: var(--text-color);
          font-family: Arial, sans-serif;
        }

        .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background: #fff; /* Adjust background as needed */
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .logo-container {
        flex-grow: 1;
        text-align: center;
    }

    .logo-container a {
        display: inline-block;
    }

    .header-logo {
        height: 50px; /* Adjust as needed */
    }

    .auth-buttons {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .login-btn, .signup-btn, .country-btn {
        padding: 8px 12px;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }

    .user-dropdown {
        position: relative;
    }

    .dropdown-toggle {
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
    }

    .dropdown-toggle i {
        font-size: 18px;
        vertical-align: middle;
    }

    .dropdown-menu {
        position: absolute;
        right: 0;
        top: 100%;
        background: white;
        border: 1px solid #ddd;
        border-radius: 5px;
        display: none;
    }

    .user-dropdown:hover .dropdown-menu {
        display: block;
    }


        /* Sidebar Styles */
        .sidebar {
          position: fixed;
          left: 0;
          top: 0;
          height: 100vh;
          width: var(--sidebar-width);
          background-color: var(--secondary-color);
          transition: all 0.3s;
          z-index: 1000;
          display: flex;
          flex-direction: column;
        }
  
        .sidebar.collapsed {
          width: var(--sidebar-collapsed-width);
        }
  
        .sidebar-header {
          padding: 15px;
          display: flex;
          justify-content: space-between;
          align-items: center;
          flex-shrink: 0;
        }
  
        .sidebar-content {
          flex: 1;
          display: flex;
          flex-direction: column;
          overflow: hidden;
        }
  
        .main-menu {
          flex-shrink: 0;
        }
  
        .submenu-container {
          flex: 1;
          overflow-y: auto;
          scrollbar-width: none; /* Firefox */
          -ms-overflow-style: none; /* IE and Edge */
        }
  
        .submenu-container::-webkit-scrollbar {
          display: none; /* Chrome, Safari, Opera */
        }
  
        .sidebar-menu {
          list-style: none;
          padding: 0;
          margin: 0;
        }
  
        .sidebar-menu li {
          padding: 10px 15px;
          display: flex;
          align-items: center;
          cursor: pointer;
          transition: all 0.5s;
          color: #9a9a9a;
        }
  
        .sidebar-menu li:hover {
          background-color: rgba(255, 107, 0, 0.1);
          color: #ffffff;
        }
  
        .sidebar-menu .menu-icon {
          margin-left: 1px;
          margin-right: 1px;
          text-align: center;
          transition: all 0.3s;
          color: #9a9a9a;
        }
  
        .sidebar-menu .rc {
          display: block;
          margin-left: auto;
        }
  
        .sidebar-menu li:hover .menu-icon {
          color: #ffffff;
        }
  
        .menu-text {
          display: block;
          margin-left: 12px;
          margin-right: 1px;
          transition: all 0.3s;
          color: #9a9a9a;
        }
  
        .sidebar-menu li:hover .menu-text {
          color: #ffffff;
        }
  
        .sidebar.collapsed .menu-text {
          display: none;
        }
  
        /* Main Content Styles */
        .main-content {
          margin-left: var(--sidebar-width);
          padding: 0 10px;
          transition: all 0.3s;
        }
  
        .main-content.expanded {
          margin-left: var(--sidebar-collapsed-width);
        }
  
        /* Header Styles */
        .header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 10px 20px;
          background-color: var(--secondary-color);
        }
  
        .header-logo {
          height: 50px;
          margin-right: auto;
        }
  
        .auth-buttons {
          display: flex;
          align-items: center;
          gap: 10px;
        }
  
        .auth-buttons button {
          background-color: var(--primary-color);
          border: none;
          color: var(--text-color);
          padding: 8px 20px;
          border-radius: 5px;
          font-weight: 500;
          transition: all 0.3s;
        }
  
        .auth-buttons button:hover {
          background-color: #ff8533;
        }
  
        .login-btn {
          background-color: #ff6b00 !important;
        }
  
        .signup-btn {
          background-color: #1e1e1e !important;
          border: 1px solid #ff6b00 !important;
        }
  
        .country-btn {
          padding: 8px 15px !important;
          background-color: transparent !important;
          border: 1px solid #ff6b00 !important;
        }
  
        /* Category Icons */
        .category-section {
          margin: 20px 0;
          position: relative;
          z-index: 100;
        }
  
        .category-section.sticky {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          background: #1a1a1a;
          padding: 15px;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
          margin: 0;
        }
  
        .category-item {
          text-align: center;
          padding: 1px 1px;
          border-radius: 8px;
          margin: 5px;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          min-height: 65px;
          transition: all 0.3s;
        }
  
        .category-item:hover {
          transform: translateY(-2px);
          box-shadow: 0 4px 15px rgba(255, 107, 0, 0.3);
        }
  
        .category-item i {
          font-size: 25px;
          margin-bottom: 8px;
          color: rgb(7, 7, 7);
        }
  
        .category-item div {
          font-size: 14px;
          font-weight: 500;
          color: white;
        }
  
        @media (max-width: 600px) {
          .category-item {
            min-height: 60px;
            padding: 8px 5px;
          }
  
          .category-item i {
            font-size: 18px;
            margin-bottom: 5px;
          }
  
          .category-item div {
            font-size: 12px;
          }
        }
  
        /* Sports Section */
        .sports-item {
          background-color: #3a2410;
          padding: 20px;
          border-radius: 10px;
          text-align: center;
          margin: 10px;
        }
  
        /* Favorites Section */
        .favorites-item {
          margin: 10px;
        }
  
        .favorites-item img {
          width: 100%;
          border-radius: 10px;
        }
  
        .featured-item {
          margin: o 5px;
        }
  
        /* Mobile Styles */
        @media (max-width: 600px) {
          .sidebar {
            transform: translateX(-100%);
          }
  
          .sidebar.show {
            transform: translateX(0);
          }
  
          .main-content {
            margin-left: 0;
          }
  
          .auth-buttons {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-around;
            padding: 10px;
            background-color: var(--secondary-color);
            z-index: 900;
          }
  
          .mobile-menu-button {
            display: block !important;
          }
        }
  
        .mobile-menu-button {
          display: none;
        }
  
        /* Carousel Styles */
        .owl-carousel .owl-item img {
          border-radius: 10px;
        }
  
        .section-title {
          color: var(--primary-color);
          margin: 20px 0;
          font-weight: bold;
        }
  
        :root {
          --primary: #ff6b00;
          --secondary: #1e1e1e;
          --dark: #0a0a0a;
          --accent: #ffd700;
          --gradient: linear-gradient(135deg, #ff6b00, #ff8f00);
        }
  
        body {
          background: var(--dark);
          color: white;
          font-family: "Segoe UI", Arial, sans-serif;
          overflow-x: hidden;
        }
  
        .side-menu {
          background: linear-gradient(
            180deg,
            var(--secondary) 0%,
            rgba(30, 30, 30, 0.95) 100%
          );
          width: 80px;
          position: fixed;
          top: 0;
          left: 0;
          height: 100vh;
          z-index: 1000;
          padding-top: 20px;
          box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
          backdrop-filter: blur(10px);
          transition: all 0.3s ease;
          overflow-y: auto;
          overflow-x: hidden;
        }
  
        .side-menu:hover,
        .side-menu.expanded {
          width: 280px;
        }
  
        .nav-item {
          padding: 15px;
          color: #ffffff90;
          transition: all 0.3s ease;
          cursor: pointer;
          position: relative;
          display: flex;
          align-items: center;
          white-space: nowrap;
        }
  
        .nav-item:hover {
          color: var(--accent);
          background: rgba(255, 255, 255, 0.05);
        }
  
        .nav-item i {
          width: 50px;
          text-align: center;
          font-size: 1.2em;
        }
  
        .nav-item span {
          opacity: 0;
          transition: opacity 0.3s ease;
        }
  
        .side-menu:hover .nav-item span,
        .side-menu.expanded .nav-item span {
          opacity: 1;
        }
  
        .nav-item .arrow {
          margin-left: auto;
          transition: transform 0.3s ease;
          opacity: 0;
        }
  
        .side-menu:hover .nav-item .arrow,
        .side-menu.expanded .nav-item .arrow {
          opacity: 1;
        }
  
        .nav-item.active .arrow {
          transform: rotate(90deg);
        }
  
        .submenu {
          max-height: 0;
          overflow: hidden;
          transition: max-height 0.3s ease;
          background: rgba(0, 0, 0, 0.2);
        }
  
        .submenu.active {
          max-height: 500px;
        }
  
        .submenu .nav-item {
          padding-left: 65px;
        }
  
        .side-menu:hover .submenu .nav-item,
        .side-menu.expanded .submenu .nav-item {
          padding-left: 65px;
        }
  
        .menu-toggle {
          display: none;
          position: fixed;
          top: 20px;
          right: 20px;
          z-index: 1001;
          background: var(--gradient);
          border: none;
          padding: 10px;
          border-radius: 8px;
          cursor: pointer;
          transition: all 0.3s ease;
        }
  
        .menu-overlay {
          display: none;
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background: rgba(0, 0, 0, 0.5);
          z-index: 999;
          opacity: 0;
          transition: opacity 0.3s ease;
        }
  
        .main-content {
          margin-left: 80px;
          padding: 0 10px;
          min-height: 100vh;
          background: radial-gradient(
            circle at top right,
            #1a1a1a 0%,
            var(--dark) 100%
          );
          transition: margin-left 0.3s ease;
        }
  
        .side-menu:hover + .main-content,
        .side-menu.expanded + .main-content {
          margin-left: 280px;
        }
  
        @media (max-width: 768px) {
          .menu-toggle {
            display: block;
          }
  
          .side-menu {
            transform: translateX(-100%);
            width: 280px;
          }
  
          .side-menu.active {
            transform: translateX(0);
          }
  
          .side-menu .nav-item span,
          .side-menu .nav-item .arrow {
            opacity: 1;
          }
  
          .main-content {
            margin-left: 0;
          }
  
          .side-menu:hover + .main-content,
          .side-menu.expanded + .main-content {
            margin-left: 0;
          }
  
          .menu-overlay.active {
            display: block;
            opacity: 1;
          }
        }
        /* modal */
        .modal {
          background: url("your_background_image.jpg") no-repeat center center
            fixed;
          background-size: cover;
          font-family: sans-serif;
          margin: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          min-height: 100vh;
        }
        .modal {
          display: none;
          position: fixed;
          z-index: 1;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.4);
          z-index: 2000;
        }
  
        .modal-content {
          background-color: #222;
          margin: 15% auto;
          padding: 20px;
          border: 1px solid #ccc;
          width: 300px;
          border-radius: 5px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
          color: white;
        }
  
        .close {
          color: white;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }
  
        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }
  
        img {
          display: block;
          margin: 0 auto 10px;
        }
  
        input[type="text"],
        input[type="password"],
        input[type="tel"] {
          width: 100%;
          padding: 10px;
          margin-bottom: 10px;
          background-color: #333;
          border: 1px solid #555;
          color: white;
          border-radius: 3px;
        }
  
        button {
          background-color: orange;
          color: white;
          padding: 10px 20px;
          border: none;
          cursor: pointer;
          border-radius: 3px;
        }
  
        .verification-code {
          display: flex;
          align-items: center;
        }
  
        .verification-code input {
          flex-grow: 1;
          margin-right: 10px;
        }
  
        .verification-code button {
          padding: 8px;
          border-radius: 3px;
        }
  
        a {
          color: orange;
          text-decoration: none;
        }
        .iti__country {
  color: black !important;
  font-weight: normal !important;
}

      </style>
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
/* .category-bar-container {
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
} */
.category-bar-container {
            background: #111;
            padding: 10px 0;
        }

        .category-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ff7f00;
            padding: 15px;
            border-radius: 5px;
        }

        .category-item {
            color: white;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            padding: 10px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .category-item i {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .category-item:hover {
            color: #fff;
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
/* .category-item {
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
} */

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


{{-- @include($theme.'partials.nav')
<br>
<br> --}}
{{--@include($theme.'partials.banner')--}}

{{-- @yield('content')

@include($theme.'partials.bottombar')
@include($theme.'partials.footer')



@stack('extra-content')

@include($theme.'partials.modal-form') --}}


<button class="menu-toggle">
    <i class="fas fa-bars"></i>
  </button>

  <div class="menu-overlay"></div>
<!-- Navbar STart -->
@include('front.layouts.sidebar')

<div class="main-content">
    <!-- Header -->
    @include('front.layouts.header')
    @include('front.login')
    @include('front.register')


    @yield('content')
  </div>


   <!-- JAVASCRIPTS -->
   <script
   src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
   crossorigin="anonymous"
 ></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script> --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
 <script src="assets/Js/Auth.js"></script>
 <script>
   $(document).ready(function () {
     // Sticky Category Section
     const categorySection = $(".category-section");
     const categorySectionTop = categorySection.length
       ? categorySection.offset().top
       : 0;

     $(window).scroll(function () {
       if ($(window).scrollTop() >= categorySectionTop) {
         categorySection.addClass("sticky");
         $("body").css("padding-top", categorySection.outerHeight());
       } else {
         categorySection.removeClass("sticky");
         $("body").css("padding-top", 0);
       }
     });

     // Initialize all carousels
     $(".main-slider").owlCarousel({
       items: 1,
       loop: true,
       margin: 10,
       nav: true,
       dots: true,
       autoplay: true,
       autoplayTimeout: 5000,
     });

     $(".category-carousel").owlCarousel({
       loop: true,
       margin: 10,
       nav: true,
       responsive: {
         0: { items: 2 },
         600: { items: 4 },
         1000: { items: 8 },
       },
     });

     $(".sports-carousel").owlCarousel({
       loop: true,
       margin: 10,
       nav: true,
       responsive: {
         0: { items: 2 },
         600: { items: 3 },
         1000: { items: 5 },
       },
     });

     $(".favorites-carousel").owlCarousel({
       loop: true,
       margin: 10,
       nav: true,
       responsive: {
         0: { items: 1 },
         600: { items: 2 },
         1000: { items: 3 },
       },
     });

     $(".featured-carousel").owlCarousel({
       loop: true,
       margin: 10,
       nav: true,
       responsive: {
         0: { items: 2 },
         600: { items: 3 },
         1000: { items: 6 },
       },
     });

     // Menu Toggle Functionality
     const menuToggle = document.querySelector(".menu-toggle");
     const sideMenu = document.querySelector(".side-menu");
     const menuOverlay = document.querySelector(".menu-overlay");

     // Handle menu toggle
     menuToggle.addEventListener("click", () => {
       sideMenu.classList.toggle("active");
       menuToggle.classList.toggle("active");
       menuOverlay.classList.toggle("active");

       const icon = menuToggle.querySelector("i");
       icon.classList.toggle("fa-bars");
       icon.classList.toggle("fa-times");
     });

     // Handle submenu toggles
     const menuItems = document.querySelectorAll(".nav-item");
     menuItems.forEach((item) => {
       if (
         item.nextElementSibling &&
         item.nextElementSibling.classList.contains("submenu")
       ) {
         item.addEventListener("click", () => {
           item.classList.toggle("active");
           item.nextElementSibling.classList.toggle("active");
         });
       }
     });

     // Close menu when clicking overlay
     menuOverlay.addEventListener("click", () => {
       sideMenu.classList.remove("active");
       menuToggle.classList.remove("active");
       menuOverlay.classList.remove("active");

       const icon = menuToggle.querySelector("i");
       icon.classList.add("fa-bars");
       icon.classList.remove("fa-times");
     });

     // Handle window resize
     window.addEventListener("resize", () => {
       if (window.innerWidth > 768) {
         sideMenu.classList.remove("active");
         menuToggle.classList.remove("active");
         menuOverlay.classList.remove("active");

         const icon = menuToggle.querySelector("i");
         icon.classList.add("fa-bars");
         icon.classList.remove("fa-times");
       }
     });

     $(document).ready(function () {
       $("#openLoginModal").click(function () {
         $("#loginModal").css("display", "block");
       });

       $("#openSignupModal").click(function () {
         $("#signupModal").css("display", "block");
       });

       $(".close").click(function () {
         $(".modal").css("display", "none");
       });

       $("#goToSignup").click(function (e) {
         e.preventDefault();
         $("#loginModal").css("display", "none");
         $("#signupModal").css("display", "block");
       });

       $("#goToLogin").click(function (e) {
         e.preventDefault();
         $("#signupModal").css("display", "none");
         $("#loginModal").css("display", "block");
       });

       // Add your actual login/signup logic here.  This is just for showing/hiding modals.
     });
   });
 </script>

{{-- <script src="{{ asset($themeTrue . 'js/bootstrap.bundle.min.js') }}"></script> --}}
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
