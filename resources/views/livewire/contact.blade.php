<div>
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">

        <div class="container" data-aos="fade-up">
   
          <header class="section-header">
            <h2>Contact</h2>
            <p>Contact Us</p>
          </header>
   
          <div class="row gy-4">
   
            <div class="col-lg-6">
   
              <div class="row gy-4">
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Address</h3>
                    <p>100m Terminal,<br>Erbil , 44001</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-telephone"></i>
                    <h3>Call Us</h3>
                    <p>+964(750-738-4168)<br>+1 6678 254445 41</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Us</h3>
                    <p>kakohama61@example.com<br>info@example.com</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-clock"></i>
                    <h3>Open Hours</h3>
                    <p>Sunday - Thirsday<br>9:00AM - 02:00PM</p>
                  </div>
                </div>
              </div>
   
            </div>
   
            <div class="col-lg-6">
              <form wire:submit="save" class="php-email-form">
                <div class="row gy-4">
   
                  <div class="col-md-6">
                    <input type="text" wire:model="name" class="form-control" placeholder="Your Name" required>
                  </div>
   
                  <div class="col-md-6 ">
                    <input type="email" class="form-control" wire:model="email" placeholder="Your Email" required>
                  </div>
   
                  <div class="col-md-12">
                    <input type="text" class="form-control" wire:model="subject" placeholder="Subject" required>
                  </div>
   
                  <div class="col-md-12">
                    <textarea class="form-control" wire:model="message" rows="6" placeholder="Message" required></textarea>
                  </div>
   
                  <div class="col-md-12 text-center">
                    <button type="submit">Send Message</button>
                  </div>
   
                </div>
              </form>
   
            </div>
   
          </div>
   
        </div>
   
      </section><!-- End Contact Section -->
   
</div>
