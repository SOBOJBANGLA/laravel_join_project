<div class="header">
  <img src="images/Pro gaming logo.png" alt="BengalBet" class="header-logo" />

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
      @endif

      <button class="country-btn">🇧🇩</button>
  </div>
</div>
