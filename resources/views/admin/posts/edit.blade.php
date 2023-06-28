<x-admin-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>

    <h1 class="mb-0 text-gray-800 text-center">Update</h1>
    <br>
    <p class=" text-center text-danger">* Required Fields</p>
    <br>
    <form method="post" action="{{route('posts.update', $post)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class=" form-group mx-auto " style="width:500px">
            <h3><span class="text-danger">* </span>Title :</h3>
            <input type="text" name="title" value="{{$post->title}}" placeholder="Enter title" class="form-control @error('title') is-invalid @enderror" Required>
        </div>
        @error('title') 
        <div class=" form-group mx-auto " style="width:500px">
            <strong class="text-danger">{{$message}}</strong>
        </div>
        @enderror
        <br>
        <div class=" form-group mx-auto" style="width:500px">
            <h3><span class="text-danger">* </span>Description :</h3>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" required placeholder="Enter description" cols="30" rows="2">{{$post->description}}</textarea>
        </div>
        @error('description')
        <div class=" form-group mx-auto " style="width:500px">
            <strong class="text-danger">{{$message}}</strong>
        </div>
        @enderror
        <br>
        <div class=" form-group mx-auto" style="width:500px">
            <h3><span class="text-danger">* </span>Image :</h3>
            <input type="file" name="image" value="{{ $post->image }}" class="form-control @error('image') is-invalid @enderror" Required>
        </div>
        <div class="text-center">
            <img src="{{asset('storage/images/'.$post->image)}}"  width="100" height="100">
        </div>
        @error('image')
        <div class=" form-group mx-auto " style="width:500px">
            <strong class="text-danger">{{$message}}</strong>
        </div>
        @enderror
        <br>
        <div class="form-group text-center">
            <a>
                <button class='btn btn-outline-success'>
                    Update
                </button>
            </a>
        </div>
    </form>
    @endsection
</x-admin-master>