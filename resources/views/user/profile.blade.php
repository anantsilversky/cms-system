<x-home-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>

    <div class="card mb-8" style="margin-top: 8%">
        <h3 class="text-center" style="margin-top: 5%">
        <i style="font-size: 60%; margin-right:1%;" class="fas fa-fw fa-lock"></i>
        Account Details 
        <i style="font-size: 50%; margin-left:1%" class="fas fa-fw fa-pen"></i>
        <a class="text-decoration-none" style="font-size: 70%" href="{{route('users.edit', $user)}}">Edit</a>
        </h3>
        
        <div class="text-center">
            <strong class="text-success">{{session('success')}}</strong>
        </div>
        <div class="card-body">
            <div style="display: flex">
                <div class="card" style="padding-left: 4%; border: none; padding-top: 4%; padding-bottom: 4%; width: 60%">
                    <h4>Name : <span style="font-size: 80%; margin-left:3%">{{$user->name}}</span></h4>
                    <br>
                    <h4>Username : <span style="font-size: 80%; margin-left:3%">{{$user->username}}</span></h4>
                    <br>
                    <h4>Email : <span style="font-size: 80%; margin-left:3%">{{$user->email}}</span></h4>
                    <br>
                    <h4>Age : <span style="font-size: 80%; margin-left:3%">{{$user->age}}</span></h4>
                    <br>
                    <h4>Password : <span style="font-size: 80%; margin-left:3%">********</span></h4>
                </div>
                <div class="card" style="width: 40%; padding:4%; border: none; ">
                    <img alt="Image unavailable" src="{{asset('storage/images/'.$user->profile_image)}}">
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            Created {{$user->created_at->diffForHumans()}}
            <br>
            Updated {{$user->updated_at->diffForHumans()}}
        </div>
    </div>
    @endsection
</x-home-master>