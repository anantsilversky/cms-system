<x-home-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
    <h1 class="my-4"> Posts</h1>
    @if(session()->exists('success'))
    <strong class="text-success text-center">{{session('success')}}</strong>
    <br><br>
    @endif
    @if(session()->exists('deleted'))
    <strong class="text-danger text-center">{{session('deleted')}}</strong>
    <br><br>
    @endif
    <!-- Blog Post -->
    @if(count($posts) > 0)
        @foreach($posts as $post)

        <div class="card mb-4">
            <img class="card-img-top" src="{{asset('storage/images/'.$post->image)}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{$post->description}}</p>
                <a href="{{route('posts.show', [$post])}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on {{$post->created_at->diffForHumans()}}
            </div>
        </div>

        @endforeach
    
    @else
    <h3 class="my-4">Currently there are no posts ! </h3>
    @endif

    <div class="d-flex">
        <div class="mx-auto">
            {{$posts->links()}}
        </div>
    </div>
    @endsection


</x-home-master>