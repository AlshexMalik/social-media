<div>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-3">
              <img class="card-img-bottom  ads" src="{{ asset('storage/photos/ads (1).png') }}" alt="cccc">
              <style>
                .ads{
                  width: 20%;
                  height: 200px;
                  position: fixed;
                  top: 
                }
              </style>
            </div>
            <div class="col-6 mt-5 ">
              <div class="mx-5 my-3">
                <a class="btn btn-primary w-100" href="/AddPost" wire:navigate>Add + post</a>
              </div>
              @foreach ($posts as $post)
              <div class="card shadow bg-grey p-3 card   mx-5 mb-3">
                <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <p class="card-text">{{$post->description}}</p>
                  <p class="card-text"><small class="text-muted">{{ $this->timeAgo($post->created_at) }}</small></p>
                </div>
                @if ($post->photo)
                <img class="card-img-bottom w-100" src="{{ asset('storage/photos/' . $post->photo) }}" alt="Card image cap">
            @else
                <img class="card-img-bottom w-100" src="https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg" alt="Card image cap">
            @endif

                <div class="card-body inline">
                  <span id="likesCount{{$post->id}}">{{$post->like}}</span>
                @if($this->like($post->id))
                  <button class="btn" onclick="toggleButtons()" wire:click="unlike({{$post->id}})"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                    </svg> liked </button>
                @else
                  <button class="btn" onclick="toggleButtons()" wire:click="likee({{$post->id}})">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                    </svg></i> like </button>
                @endif
                <script>
                  function toggleButtons() {
                    var button1 = document.getElementById("button1");
                    var button2 = document.getElementById("button2");
                    
                    // Toggle the visibility of the buttons
                    if (button1.style.display === "none") {
                      button1.style.display = "inline-block";
                      button2.style.display = "none";
                    } else {
                      button1.style.display = "none";
                      button2.style.display = "inline-block";
                    }
                  }
                  </script>
                  <div wire:loading wire:target.delay.longest="likee">Liked Bob...</div>
                  @if (!$boxVisible)
                  <button class="btn " wire:click="toggleBoxVisibility({{$post->id}})">Comment</button>
                  @endif
                  <a class="btn" href="/comment/{{$post->id}}" wire:navigate>Show comment</a>


                  @if($boxVisible & $id == $post->id)
                  <form wire:submit.prevent="submit({{$post->id}})">
                    <input type="hidden" value="{{$post->id}}"  class="form-control" wire:model="idd">
                    <input type="text" class="form-control" wire:model.live="comment" placeholder="Comment ........">
                    <button type="submit" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                      <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                    </svg></button>
                    <div wire:loading wire:target.delay.longest="submit">
            
                      commented
              
                    </div>
                  </form>
                  @endif
                </div>
              </div>
              @endforeach
            </div>
          <div class="col-3">
            <img class="card-img-bottom  ads" src="{{ asset('storage/photos/ads (2).png') }}" alt="cccc">
          </div>
        </div>
    </div>
</div>
id