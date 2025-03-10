<!-- FOOTER SECTION -->
@if(!in_array(Request::route()->getName(),['home','category','tournament','match','login','register','register.sponsor','user.check','password.request']))

    <!-- FOOTER SECTION -->
   

    <style>
        .footer-section {
            background: url({{getFile(config('location.logo.path').'footer.jpg')}});
            background-size: cover;
            background-position: center top;
        }
    </style>

@endif


