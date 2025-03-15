@extends('front.layouts.app')

@section('title','Home Page')

@section('content')
  <!-- Slider -->
  <div class="owl-carousel main-slider">
    <div class="item">
      <img src="images/image_155351.jpg" alt="Slide 1" />
    </div>
    <div class="item">
      <img src="images/image_202415.jpg" alt="Slide 2" />
    </div>
    <div class="item">
      <img src="images/image_203748.jpg" alt="Slide 3" />
    </div>
  </div>

  <!-- Categories Section -->
  <div class="d-flex">
    <img
      src="images/index-announcement-icon.png"
      alt="index-announcement-icon"
    /><marquee behavior="" direction=""
      >Lorem Ipsum is simply dummy text of the printing and typesetting
      industry. Lorem Ipsum has been the industry's standard dummy</marquee
    >
  </div>

  <h6 class="section-title">Categories</h6>
  <div
    class="owl-carousel category-carousel"
    style="
      background: linear-gradient(45deg, #ff6b00, #ff8533);
      padding: 2px 0;
    "
  >
    <div class="category-item">
      <i class="fas fa-futbol"></i>
      <div>Sports</div>
    </div>
    <div class="category-item">
      <i class="fas fa-dice"></i>
      <div>Casino</div>
    </div>
    <div class="category-item">
      <i class="fas fa-dice"></i>

      <div>Slots</div>
    </div>
    <div class="category-item">
      <i class="fas fa-table"></i>
      <div>Table</div>
    </div>
    <div class="category-item">
      <i class="fas fa-chart-line"></i>
      <div>Crash</div>
    </div>
    <div class="category-item">
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
    </div>
  </div>

  <!-- Sports Section -->
  <h6 class="section-title">Sports</h6>
  <div class="owl-carousel sports-carousel">
    <div class="sports-item">
      <i class="fas fa-cricket-bat-ball"></i>
      <div>CRICKET</div>
    </div>
    <div class="sports-item">
      <i class="fas fa-football-ball"></i>
      <div>Sportsbook</div>
    </div>
    <div class="sports-item">
      <i class="fas fa-running"></i>
      <div>SBO</div>
    </div>
    <div class="sports-item">
      <i class="fas fa-horse-head"></i>
      <div>HORSEBOOK</div>
    </div>
    <div class="sports-item">
      <i class="fas fa-chart-bar"></i>
      <div>iNsports</div>
    </div>
  </div>

  <!-- Favorites Section -->
  <h6 class="section-title">Favourites</h6>
  <div class="owl-carousel favorites-carousel">
    <div class="favorites-item">
      <img src="images/image_1.jpg" alt="Favorite 1" />
    </div>
    <div class="favorites-item">
      <img src="images/image_2.jpg" alt="Favorite 1" />
    </div>
    <div class="favorites-item">
      <img src="images/image_3.jpg" alt="Favorite 1" />
    </div>
    <div class="favorites-item">
      <img src="images/bn_nz.jpg" alt="Favorite 1" />
    </div>
    <div class="favorites-item">
      <img src="images/nz_eng.jpg" alt="Favorite 2" />
    </div>
    <div class="favorites-item">
      <img src="images/sa_pak.jpg" alt="Favorite 3" />
    </div>
  </div>

  <h6 class="section-title">Featured Games</h6>
  <div class="owl-carousel featured-carousel">
    <div class="favorites-item">
      <img src="images/JILI-SLOT-014.png" alt="Favorite 1" />
    </div>
    <div class="favorites-item">
      <img src="images/JILI-SLOT-023.png" alt="Favorite 1" />
    </div>
    <div class="favorites-item">
      <img src="images/JILI-SLOT-027.png" alt="Favorite 1" />
    </div>
    <div class="favorites-item">
      <img src="images/124.png" alt="Favorite 1" />
    </div>
    <div class="favorites-item">
      <img src="images/1340277.png" alt="Favorite 2" />
    </div>
    <div class="favorites-item">
      <img src="images/89.png" alt="Favorite 3" />
    </div>
  </div>
@endsection
