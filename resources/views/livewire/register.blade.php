<div>
<div style="margin-top: 5em;">
    <!-- ======= About Section ======= -->
   <section id="about" class="about">

    <div class="row">
            <div class="col-1">

            </div>
            <form wire:submit="save" class="php-email-form col-lg-6 col-md-10 " method="POST">
                <div class="row">
                    <div class="col-4 col-sm-10">
                        <input type="text"  wire:model="first_name" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="col-4 col-sm-10">
                        <input type="text" wire:model="middle_name" class="form-control" placeholder="Middle Name" required>
                    </div>
                    <div class="col-4 col-sm-10">
                        <input type="text" wire:model="last_name" class="form-control" placeholder="Last Name" required>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                        {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="row mt-2">
                    <div class="col-8 col-sm-10 ">
                        <input type="email" class="form-control" wire:model="email" placeholder="Email" required>
                    </div>
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                    {{ session('error') }}
                    </div>
                    @endif
                    <div class="col-4 col-sm-10 ">
                        <input type="date" class="form-control" wire:model="date_of_birth" required>
                        @error('date_of_birth')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4">
                        <input type="number" class="form-control" wire:model="phone_number" placeholder="phone_number" required>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success">
                    {{ session('status') }}
                    </div>
                    @endif
                    <div class="col-4">
                        <input type="text" class="form-control" wire:model="username" placeholder="username" required>                        
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success">
                    {{ session('status') }}
                    </div>
                    @endif
                    <div class="col-4">
                        <select class="form-select" wire:model="gender" aria-label="Default select example">
                            <option value="male">male</option>
                            <option value="female">female</option>
                          </select>                    
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4">
                        <input type="file" class="form-control" wire:model="photo" placeholder="photo">                        
                    </div>
                    <div class="col-6">
                        <input type="password" wire:model='password' class="form-control" placeholder="Password">
                    </div>
                    <div class="col-6">
                       
                    </div>
                </div>
                @if (!session('status'))
                <div class="row mt-5">
                <div class="col-6">
                <button class="btn btn-primary w-75" type="submit">Submit</button>
                </div>
                </div>
    @endif
              </form>
 

        <div class="col-lg-4 col-md-10 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{asset('assets/img/signup.png')}}"  class="img-fluid float-right" alt="">
          
        </div>
    </div>
 
</div>
