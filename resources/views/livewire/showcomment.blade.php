<div>
  <div>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-3"></div>
            <div class="col-6 mt-5 ">
    <div class="card m-5">
      <div class="card-body">
        
        <p class="card-text">{{$posts->description}}</p>
        <p class="card-text"><small class="text-muted">{{ $this->timeAgo($posts->created_at) }}</small></p>
      </div>
      <img class="card-img-bottom w-100"  src="https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg" alt="Card image cap">
      <div class="card-body inline">
        <span id="likesCount{{$posts->id}}">{{$posts->like}}</span>
      @if($this->like($posts->id))
        <button class="btn" onclick="toggleButtons()" wire:click="unlike({{$posts->id}})"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
          </svg> liked </button>
      @else
        <button class="btn" onclick="toggleButtons()" wire:click="likee({{$posts->id}})">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
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
        <button class="btn" wire:click="toggleBoxVisibility({{$posts->id}})" disabled>Commend</button>
        @endif
        <br>
        @if (is_array($showcomment))
        @foreach ($showcomment as $comment)
            @if (is_array($comment))
                <div class="post">
                  <br>
                  <div class="row d-flex justify-content-center">
                    <div class="col ">


                          <div class="card mb-4">
                            <div class="card-body">
                              <p>{{ htmlspecialchars($comment['comment']) }}</p>
                  
                              <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar" width="25"
                                    height="25" />
                                  <p class="small mb-0 ms-2">{{ htmlspecialchars($comment['user_name']) }}</p>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                  <p class="small text-muted mb-0">Upvote?</p>
                                  <i class="far fa-thumbs-up mx-2 fa-xs text-body" style="margin-top: -0.16rem;"></i>
                                  <p class="small text-muted mb-0">3</p>
                                </div>
                              </div>
                            </div>
                          </div>

                          @endif
                          @endforeach
                      @endif
                      

                        </div>
                      </div>
                    </div>
                  </div>

                   
                </div>

         
     
    <div class="post">
    
  
    </div>
        
       
        @if($boxVisible & $id == $posts->id)
        <form wire:submit.prevent="submit({{$posts->id}})">
          <input type="hidden" value="{{$posts->id}}"  class="form-control" wire:model="idd">
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
            </div>
          </div>
        </div>
      </div>
</div>
