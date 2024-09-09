<div>
  

 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero d-flex align-items-center">

   <div class="container">
     <div class="row">
       <div class="col-lg-6 d-flex flex-column justify-content-center">
         <h1 data-aos="fade-up">We are caring you for growing your Hope</h1>
         <h2 data-aos="fade-up" data-aos-delay="400">I am alone of freelance making websites for you</h2>
         <div data-aos="fade-up" data-aos-delay="600">
           <div class="text-center text-lg-start">
             <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
               <span>Get Started</span>
               <i class="bi bi-arrow-right"></i>
             </a>
           </div>
         </div>
       </div>
       <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
        
         <img src="{{asset('assets/img/hero-img.png')}}" class="img-fluid" alt="">
       </div>
     </div>
   </div>

 </section><!-- End Hero -->
 

<!-- End Testimonials Section -->

 <main id="main">
   <!-- ======= About Section ======= -->
   <section id="about" class="about">

     <div class="container" data-aos="fade-up">
       <div class="row gx-0">

         <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
           <div class="content">
             <h3>What I Do</h3>
             <h2>what is enjoye when you access website </h2>
             <p>
              "Trust me, I'll craft a website that amplifies the joy in your life, Count on me to build a website that enhances your joy-filled experiences, Allow me to create a website that elevates your life experiences and brings you joy."
             </p>
             <div class="text-center text-lg-start">
              
                <button wire:navigate href="/SignIn" class=" btn-read-more d-inline-flex align-items-center justify-content-center align-self-center px-4 py-3">
                  Sign In 
                  <i class="bi bi-arrow-right"></i>
                </button> 
                <button wire:navigate href="/Register" class=" btn-read-more d-inline-flex align-items-center justify-content-center align-self-center px-4 py-3">
                  Sign Up 
                  <i class="bi bi-arrow-right"></i>
                </button> 
              
             </div>
           </div>
         </div>
         <div class="col-lg-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
           <img src="{{asset('assets/img/features.png')}}"  class="img-fluid float-right" alt="">
           
         </div>

       </div>
     </div>

   </section><!-- End About Section -->
  @auth
 
  </main>
 
  @endauth
  @guest
    <livewire:post-inhome>
    <livewire:topfans>
    <livewire:count>
  </main><!-- End #main -->
   
      <livewire:contact/> 
 
 
  @endguest
  
</div>
