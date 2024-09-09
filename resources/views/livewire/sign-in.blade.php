<div>
    <div style="margin-top: 5em;">
        <!-- ======= About Section ======= -->
       <section id="about" class="about">
    
        <div class="row">
                <div class="col-lg-1 col-md-1">
    
                </div>
                <form wire:submit="signin" class="php-email-form col-lg-6 col-md-6 " method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-sm-6 ">
                            @if (session()->has('error'))
                            <div class="alert alert-danger">
                            {{ session('error') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-8 col-md-10">
                            <label for="" class=" text-primary mb-2">Enter Email</label>
                            <input required type="email" class="form-control" wire:model="email" placeholder="Email">                        
                            @error('title') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-8 col-md-10">
                            <label for="" class="text-primary mb-2">Enter Passowrd</label>
                            <input required type="password" wire:model='password' class="form-control" placeholder="Password">
                            @error('title') {{ $message }} @enderror
                        </div>
                    </div>
                    @if (!session('status'))
                    <div class="row mt-5">
                    <div class="col-lg-12">
                    <button class="btn btn-primary w-50 mx-auto" type="submit">Submit</button>
                    </div>
                    </div>
                    @endif
                  </form>
     
    
            <div class="col-lg-4 col-md-4 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
              <img src="{{asset('assets/img/signup.png')}}"  class="img-fluid float-right" alt="">
              
            </div>
        </div>
     
    </div>
    