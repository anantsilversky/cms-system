<x-admin-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>

    <h1 class="mb-0 text-center">Create</h1>
    <br>
    <p class=" text-center text-danger"><i class="fas fa-fw fa-asterisk"></i> Required Fields</p>
    <br>
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
        <div class="form-group mx-auto" style="width:90px">
            <a>
                <button class='btn btn-outline-success'>
                    submit
                </button>
            </a>
        </div>
    </form>
    @endsection
</x-admin-master>