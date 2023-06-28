<x-home-master>


    @section('content')
    <h1 class="my-4"> Posts
    </h1>

    <!-- Blog Post -->
    @if(count($posts) > 0)
        @foreach($posts as $post)

        <div class="card mb-4">
            <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
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

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>
    
    @else
    <h3 class="my-4">Currently there are no posts ! </h3>
    @endif
    @endsection


</x-home-master>