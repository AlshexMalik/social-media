<div class="">
    <section  class=" d-flex align-items-center">
        
        <div class="container mt-5">


            @if ($showbox == null)
 
              <input type="text" class="form-control w-25 " placeholder="Search" wire:model.live="query">
 
            @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
            @endif
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">email</th>
                    <th scope="col">phone number</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                  <tr>
                    
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}}{{$user->middle_name}}{{$user->last_name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>
                        <button class="btn btn-danger" type="button" wire:click="delet({{$user->id}})">Delete</button>
                        <button class="btn btn-warning" type="button" wire:click="aa({{$user->id}})">Update</button>
                    </td>
                  </tr>
                  @endforeach 
                  
                </tbody>
              </table>
              {{ $users->links() }}
            @elseif($showbox != null)
            <div class="container">
              @if (session('status'))
              <div class="alert alert-success">
              {{ session('status') }}
              </div>
              @endif
            </div>
            <div class="row">
              <div class="col-3"></div>
              <div class="col-6">
            <form wire:submit.prevent="updateData" action="update">
              <div class="form-group m-2">
                <input type="text" wire:model="id">
                <input type="text" class="form-control" wire:model="first_name" placeholder="Firs Name">
              </div>
              <div class="form-group m-2">
                 
                <input type="text" class="form-control" wire:model="middle_name" placeholder="Midlle Name">
              </div>
              <div class="form-group m-2">
                 
                <input type="text" class="form-control" wire:model="last_name" placeholder="Last Name">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          </div>
          <div class="col-3"></div>
            @endif
             


            </div>  
       
        
</section>
</div>
