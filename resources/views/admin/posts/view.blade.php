<x-admin-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>

    <h1 class="mb-0 text-gray-800 text-center">Posts</h1>
    <br><br>
    <!-- Blog Post -->
    @if(count($posts) > 0)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Posts Records</h6>
            <cite class="lead">by
                <a class="text-decoration-none" href="{{route('users.show', [Auth::user()])}}">{{Auth::user()->name}}</a>
            </cite>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Posted</th>
                  <th>Updated</th>
                </tr>
              </thead>
              @foreach ($posts as $post)

                <tbody>
                    <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td><img src="{{'storage/images/'.$post->image}}" width="100%" height="100"></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                </tbody>

              @endforeach
            </table>
          </div>
        </div>
      </div>
    @endif
    @endsection
    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('build/assets/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>