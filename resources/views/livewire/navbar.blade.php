<div>
   <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
 
      <a href="{{url('/')}}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>Social-media</span>
      </a>
 
      <nav id="navbar" class="navbar">
        @auth
        <ul>
         
          <li><a class="nav-link scrollto" href="/home" wire:navigate>Home</a></li>
          <li><a class="nav-link scrollto" href="/myfriend" wire:navigate>My Friend</a></li>
          <li><a class="nav-link scrollto" href="/showmembers" wire:navigate>Add Friend</a></li>
          <li><a class="nav-link scrollto btn" href="/profile/{{$username}}" wire:navigate>Profile</a></li>
          <li><a class="nav-link scrollto btn " wire:click="logout()">Logout</a></li>
      </ul>
        @endauth
        @guest
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#testimonials">Top Posts</a></li>
          <li><a class="nav-link scrollto" href="#team">Top Fans</a></li>
          <li><a class="nav-link scrollto" href="#counts">Counts</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        @endguest
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
 
    </div>
  </header><!-- End Header -->

</div>
