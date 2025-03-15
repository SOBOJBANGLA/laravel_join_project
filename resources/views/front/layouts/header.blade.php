<div class="header">
    <!-- <button class="mobile-menu-button btn text-white">
            <i class="fas fa-bars"></i>
        </button> -->
    <img
      src="images/Pro gaming logo.png"
      alt="BengalBet"
      class="header-logo"
    />
    <div class="auth-buttons">
      <button class="login-btn" id="openLoginModal">Login</button>
      <button class="signup-btn" id="openSignupModal">Sign up</button>
      <button class="country-btn">🇧🇩</button>
    </div>
    <!-- modals -->
    <div id="loginModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <img src="images/Pro gaming logo.png" alt="BengalBet Logo" />
        <h2>Login</h2>
        <form>
          <input type="text" placeholder="Username" id="loginUsername" />
          <input
            type="password"
            placeholder="Password"
            id="loginPassword"
          />
          <a href="#">Forgot password?</a>
          <button type="button" id="loginButton">Login</button>
          <p>
            Do not have an account? <a href="#" id="goToSignup">Sign Up</a>
          </p>
        </form>
      </div>
    </div>

    <div id="signupModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <img src="images/Pro gaming logo.png" alt="BengalBet Logo" />
        <h2>Sign up</h2>
        <form>
          <input type="text" placeholder="Username" id="signupUsername" />
          <input
            type="password"
            placeholder="Password"
            id="signupPassword"
          />
          <input type="tel" placeholder="Phone Number" id="signupPhone" />
          <div class="verification-code">
            <input
              type="text"
              placeholder="Verification Code"
              id="signupVerification"
            />
            <button type="button" id="resendCode">&#8635;</button>
          </div>
          <button type="button" id="signupButton">Submit</button>
          <p>Already a member? <a href="#" id="goToLogin">Log in</a></p>
          <p>
            I certify that I am at least 18 years old and that I agree to
            the <a href="#">Terms & Conditions</a>.
          </p>
        </form>
      </div>
    </div>
    <!-- modals end -->
  </div>