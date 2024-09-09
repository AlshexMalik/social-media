<div class=" mt-5">
 <!-- start toppost -->
 <section class="d-flex align-items-center" id="postInhome">
  <div class="container">

       <section id="testimonials" class="testimonials">

<div class="container" data-aos="fade-up">

 <header class="section-header">
   <h2>Top Fans</h2>
   <p>You Can See Top Post</p>
 </header>

 <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
  
   <div class="swiper-wrapper">
    @php
     $x = 0;   
    @endphp
    @foreach($toppost as $post)
     <div class="swiper-slide">
       <div class="testimonial-item">
        <div class="stars">
          @for ($i = $x; $i < 5; $i++)
          <i class="bi bi-star-fill"></i>
      @endfor
      @php
      $x++;   
     @endphp
         </div>
        <p>
          {{ $post->description  }}
         </p>
         <div class="profile mt-auto">
           <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
           <h3>{{ $post->username }}</h3>
           <h4>{{$post->title}}</h4>
           <h4><i class="bi bi-heart-fill" style="color: #be4815;"> </i>{{$post->like}}</h4>
         </div>
       </div>
     </div><!-- End toppost-->
     @endforeach 

   </div>
   <div class="swiper-pagination"></div>
 </div>

</div>

</section>
</div>
</section>
</div>

