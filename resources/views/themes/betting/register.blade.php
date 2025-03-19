<div id="signupModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img src="images/Pro gaming logo.png" alt="BengalBet Logo" />
        <h2>Sign up</h2>
        <form id="signupForm" action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Phone Number with Country Code -->
            <input type="tel" name="phone" id="signupPhone" placeholder="Phone Number" required />
            <input type="hidden" name="country_code" id="countryCode">

            <input type="password" name="password" placeholder="Password" required />
  
            <button type="submit">Submit</button>
            <p>Already a member? <a href="#" id="goToLogin">Log in</a></p>
            <p>I certify that I am at least 18 years old and agree to <a href="#">Terms & Conditions</a>.</p>
        </form>
    </div>
  </div>


