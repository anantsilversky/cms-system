<x-home-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
    <form action="{{route('posts.update', $post)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card mb-4 " style="margin-top: 8%; padding-left:4%; padding-right:4%;">
            <h3 class="text-center" style="margin-top: 5%;">Edit Details </h3>
            <div  class="d-flex justify-content-end"> 
                <label for="image">
                    <img class="img-profile rounded-circle" height="90" src="{{asset('storage/images/'.$post->image)}}">
                </label>
            </div>
            <input type="file" id="image" name="image" style="display: none;">
            <cite class="d-flex justify-content-end">click on image to edit</cite>
            @error('image')
            <strong class="text-danger d-flex justify-content-end">{{ $message }}</strong>
            @enderror
            <h5>Title :</h5>
            <input type="text" name="title" required value="{{$post->title}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong class="d-flex justify-content-end">{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Description :</h5>
            <input type="text" name="description" required value="{{$post->description}}" class="form-control @error('username') is-invalid @enderror">
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <div class="card-footer text-muted text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    @endsection
</x-home-master>