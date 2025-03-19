@auth
<div class="mobile-bottom-nav d-md-none">
    <a href="{{ route('game.home') }}" class="nav-item">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <a href="{{ route('user.home') }}" class="nav-item">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
    <a href="{{ route('user.addFund') }}" class="nav-item">
        <i class="fas fa-wallet"></i>
        <span>Deposit</span>
    </a>
    <a href="{{ route('user.payout.money') }}" class="nav-item">
        <i class="fas fa-money-bill-wave"></i>
        <span>Withdraw</span>
    </a>
    <a href="{{ route('user.profile') }}" class="nav-item">
        <i class="fas fa-user"></i>
        <span>Profile</span>
    </a>
</div>
@endauth