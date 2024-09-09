<div>
    <br>
    <br>
    <br>
    <br>
<br><br>

        @foreach ($showmembers as $member)
          <div class="row" style="width: 100%">
            <div class="col-2 "></div>
              <div class="col-8">
                <div class="card" style="width: 100%;">
                  <div class="row">
                    <div class="col-2"><img  class="card-img-bottom"  src="https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg" alt="Card image cap"></div>
                    <div class="col-10">
                      <br>
                      <div class="card-body">
                       <h5 class="card-title">{{($member->first_name)}}{{($member->middle_name)}}{{($member->last_nameid)}}</h5>
                       <p class="card-text">{{($member->username)}}</p>
                       <button class="btn btn-primary " wire:click="yesadd({{$member->id}})">Add Friend</button>

                       
                      </div>
                   </div>
                  </div>
               </div>
             </div>
            <div class="col-2"></div>
          </div>
          <br><br>
        @endforeach
         <br><br><br><br>    

</div>
