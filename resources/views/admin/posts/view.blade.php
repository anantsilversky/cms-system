<x-admin-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>

    <h1 class="mb-0 text-center">Posts</h1>
    <div style="text-align: center;">
      <cite>
        <small>
          <a class="text-decoration-none" href="{{ route('users.show', [Auth::user()]) }}">by {{ Auth::user()->name }}</a>
        </small>
      </cite>
    </div>
    <br>
    @if(session('success'))
      <div class=" form-group text-center">
          <strong class="text-success">{{session('success')}}</strong>
      </div>
    @elseif(session('deleted'))
        <div class=" form-group text-center">
          <strong class="text-danger">{{session('deleted')}}</strong>
        </div>
    @endif
    <br>
    @if(count($posts) > 0)
    <!-- Blog Post -->
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%">Id</th>
              <th style="width: 15%">Title</th>
              <th style="width: 40%">Description</th>
              <th style="width: 10%">Image</th>
              <th>Posted</th>
              <th>Updated</th>
              <th>Actions</th>
            </tr>
          </thead>
          
          <tbody>
          @foreach($posts as $post)
            <tr>
              <td>{{$post->id}}</td>
              <td><a href="{{route('posts.show', $post)}}">{{$post->title}}</a></td>
              <td>{{$post->description}}</td>
              <td><img src="{{asset('storage/images/'.$post->image)}}" width="100%" height="100"></td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
              <td>
                @can('view', $post)
                <a href="{{route('posts.edit', $post)}}"><button class="btn btn-outline-success">Update</button></a>
                @endcan
                <br><br>
                @can('delete', $post)
                <form method="POST" onsubmit="return confirm('Are you sure want to delete?')" action="{{route('posts.destroy', $post)}}">
                  @method('DELETE')
                  @csrf
                  <button style="width: 78px" class="btn btn-outline-danger">Delete</button>
                </form>
                @endcan

              </td>
            </tr>
          @endforeach
    @else    
    <h3>There are no posts currently</h3>    
    @endif    
          </tbody>
        </table>
      </div>
    </div>
    <div class="d-flex">
      <div class="mx-auto">
        {{$posts->links()}}
      </div>
    </div>
    @endsection
</x-admin-master>