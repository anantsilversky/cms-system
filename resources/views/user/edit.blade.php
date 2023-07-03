<x-home-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>

    <form action="{{route('users.update', $user)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card mb-4 " style="margin-top: 8%; padding-left:4%; padding-right:4%;">
            <h3 class="text-center" style="margin-top: 5%;">Edit Details </h3>
            <div class="d-flex justify-content-end">
                <label for="image" >
                    <img class="img-profile rounded-circle" height="90" src="{{asset('storage/images/'.$user->profile_image)}}" alt="Image unavailable">
                </label>
            </div>
            <input type="file" id="image" name="image" style="display: none;">
            <cite class="d-flex justify-content-end">click on image to edit</cite>
            @error('image')
            <strong class="text-danger d-flex justify-content-end">{{ $message }}</strong>
            @enderror
            <h5>Name :</h5>
            <input type="text" name="name" required value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong class="d-flex justify-content-end">{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Username :</h5>
            <input type="text" name="username" required value="{{$user->username}}" class="form-control @error('username') is-invalid @enderror">
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Email :</h5>
            <input type="email" name="email" required value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Age :</h5>
            <input type="number" name="age" required value="{{$user->age}}" class="form-control @error('age') is-invalid @enderror">
            @error('age')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Password :</h5>
            <input type="password" id="password" name="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Confirm Password :</h5>
            <input type="password" id="password-confirm" placeholder="Enter password" name="password_confirmation" class="form-control ">
    
            <div class="card-footer text-muted text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    @endsection
</x-home-master>