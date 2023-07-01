<x-home-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
    <div class="card mb-4 " style="margin-top: 8%; padding-left:4%; padding-right:4%;">

    <h1 class="mb-0 text-center" style="margin-top: 3%">Create</h1>
    <p class=" text-center text-danger">* Required Fields</p>
    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
            <div class=" form-group mx-auto " style="width:500px">
                <h3><span class="text-danger">* </span>Title :</h3>
                <input type="text" name="title" value="{{old('title')}}" placeholder="Enter title" class="form-control @error('title') is-invalid @enderror" Required>
            </div>
            @error('title') 
            <div class=" form-group mx-auto " style="width:500px">
                <strong class="text-danger">{{$message}}</strong>
            </div>
            @enderror
            <br>
            <div class=" form-group mx-auto" style="width:500px">
                <h3><span class="text-danger">* </span>Description :</h3>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" required placeholder="Enter description" cols="30" rows="2">{{old('description')}}</textarea>
            </div>
            @error('description')
            <div class=" form-group mx-auto " style="width:500px">
                <strong class="text-danger">{{$message}}</strong>
            </div>
            @enderror
            <br>
            <div class=" form-group mx-auto" style="width:500px">
                <h3><span class="text-danger">* </span>Image :</h3>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" Required>
            </div>
            @error('image')
            <div class=" form-group mx-auto " style="width:500px">
                <strong class="text-danger">{{$message}}</strong>
            </div>
            @enderror
            <br>
            <div class="card-footer text-muted text-center">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
    </form>
    </div>
    @endsection
</x-home-master>