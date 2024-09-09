<div>
    <br><br>
     <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 mt-5">
                <form class="m-5" wire:submit.prevent="save">
                    <div class="form-row">
                      <div class="col-3 mx-auto">
                        @if ($photo) 
                        <img style="width: 250px" class="mx-auto" src="{{ $photo->temporaryUrl() }}">
                        @endif
                      </div>
                      <div class="col mb-3">
                        <input type="hidden" value="{{$user}}" wire:model="user_id" class="form-control" >
                      </div>
                      <div class="col mb-3">
                        <input type="text" class="form-control" wire:model="title" placeholder="Title">
                        <div>
                            @error('title') <span class="error">{{ $message }}</span> @enderror 
                        </div>
                        </div>
                      <div class="col mb-3">
                        <input type="text" class="form-control" wire:model="description" placeholder="Description">
                        <div>
                            @error('description') <span class="error">{{ $message }}</span> @enderror 
                        </div>
                        </div>
                      <div class="col mb-3">
                        <input accept="image/jpg" type="file" class="form-control" wire:model="photo">
                        <div>
                            @error('photo') <span class="error">{{ $message }}</span> @enderror 
                        </div>
                        </div>
                      <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                  </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
     </div>
</div>
