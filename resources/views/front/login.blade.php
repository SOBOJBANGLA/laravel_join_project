<div id="loginModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img src="{{ asset('images/Pro gaming logo.png') }}" alt="BengalBet Logo" />
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            {{-- <input type="tel" name="phone" placeholder="Phone Number"  :value="old('phone')" required /> --}}
            <input type="tel" name="phone_code" placeholder="Phone Number"  :value="old('phone_code')" required />
            <input type="password" name="password" placeholder="Password" id="loginPassword" required />
            <a href="#">Forgot password?</a>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="#" id="goToSignup">Sign Up</a></p>
        </form>
    </div>
</div>