<div>
    <br><br><br><br>
    <br>
    <div class="container">
        <div class="row" style="width: 100%">
            <div class="col-md-12 mb-4">
                <input type="text" class="form-control" placeholder="Search..." wire:model.live="search">
            </div>
            @foreach ($friends as $member)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg" alt="Card image cap">
                            <h6 class="card-title">{{ $member->name1 }} {{ $member->name2 }} {{ $member->name3 }}</h6>
                            <p class="card-text mx-auto">{{ $member->username }}</p>
                            <a href="/profile?id={{ $member->id }}" class="btn btn-primary mx-auto" wire:navigate>Show profile</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br><br><br>
        {{ $friends->links() }}
    </div>
    <br><br><br><br><br>
</div>
