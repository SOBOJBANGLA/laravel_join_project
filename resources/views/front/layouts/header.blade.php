<div class="header">
    <div class="logo-container">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/Pro gaming logo.png') }}" alt="BengalBet" class="header-logo"/>
        </a>
    </div>

  <div class="auth-buttons">
      @if (!Auth::check())
          <!-- User is NOT logged in -->
          <button class="login-btn" id="openLoginModal">Login</button>
          <button class="signup-btn" id="openSignupModal">Sign up</button>
      @else
          <!-- User is logged in -->
          <form id="logoutForm" action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit">Logout</button>
          </form>

          <div class="dropdown user-dropdown">
            <button class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user"></i>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item {{ menuActive('user.home') }}" href="{{route('user.home')}}">
                        <i class="fa fa-home"></i> @lang('Dashboard')
                    </a>
                </li>
                <li>
                    <a class="dropdown-item {{ menuActive('user.addFund') }}" href="{{route('user.addFund')}}">
                        <i class="fa fa-money-bill"></i> @lang('Make a deposit')
                    </a>
                </li>
                <li>
                    <a class="dropdown-item {{ menuActive('user.payout.money') }}" href="{{route('user.payout.money')}}">
                        <i class="fa fa-wallet"></i> @lang('Withdraw funds')
                    </a>
                </li>
                <li>
                    <a class="dropdown-item {{ menuActive('user.referral') }}" href="{{route('user.referral')}}">
                        <i class="fa fa-user-friends"></i> @lang('Invite friends')
                    </a>
                </li>
                <li>
                    <a class="dropdown-item {{ menuActive('user.profile') }}" href="{{route('user.profile')}}">
                        <i class="fa fa-user"></i> @lang('Personal profile')
                    </a>
                </li>
                <li>
                    <a class="dropdown-item {{ menuActive('user.betHistory') }}" href="{{route('user.betHistory')}}">
                        <i class="fa fa-history"></i> @lang('Bet history')
                    </a>
                </li>
            </ul>
          </div>
      @endif

      <button class="country-btn">🇧🇩</button>
  </div>
</div>
