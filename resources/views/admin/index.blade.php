<x-admin-master>
    @section('content')
    <h1 class="mb-0">Dashboard</h1>
    <br><br>
    @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="card mb-4">
            <img src="{{asset('storage/images/'.$post->image)}}" width="200" height="200" alt="Image Unavailable">
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{$post->description}}</p>
                <a href="{{route('posts.show', [$post])}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted {{$post->created_at->diffForHumans()}} by {{$post->user->name}}
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
</x-admin-master>