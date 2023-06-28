<x-admin-master>

    @section('content')

        <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
        <h1 class="mt-4">{{$post->title}} <i style="font-size: 40%" class="fas fa-fw fa-pen"></i><span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size: 50%"><a class="text-decoration-none" href="{{route('posts.edit', $post)}}">Edit</a></span></h1>

        <!-- Author -->
        <p class="lead">
            by
            <a href="{{route('users.show', [Auth::user()])}}">{{Auth::user()->name}}</a>
        </p>

        <!-- Date/Time -->
        <p>Posted {{$post->created_at->diffForHumans()}}</p>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{asset('storage/images/'.$post->image)}}" width="200" height="200">

        <!-- Post Content -->
        <p class="lead">{{$post->description}}</p>

        <blockquote class="blockquote">
            <footer class="blockquote-footer">Anant
            </footer>
        </blockquote>
        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,
                vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                lacinia congue felis in faucibus.
            </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,
                vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                lacinia congue felis in faucibus.

                
            </div>
        </div>
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>

        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>

    @endsection

</x-admin-master>
