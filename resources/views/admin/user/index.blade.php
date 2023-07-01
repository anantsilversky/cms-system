<x-admin-master>
    @Section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
    <h1 class="text-center">Users</h1>
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
    @if(count($users) > 0)
    <!-- Blog Post -->
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%">Id</th>
              <th style="width: 15%">Name</th>
              <th style="width: 20%">Username</th>
              <th style="width: 30%">Email</th>
              <th style="width: 5%">Age</th>
              <th style="width: 15%">Profile Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          
          <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->username}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->age}}</td>
              <td><img src="{{asset('storage/images/'.$user->profile_image)}}" alt="Image unavailable" width="100%" height="100"></td>
              <td>
                <form method="POST" onsubmit="return confirm('Are you sure want to delete?')" action="{{route('users.destroy', $user)}}">
                    @method('DELETE')
                    @csrf
                    <button style="width: 78px" class="btn btn-outline-danger">Delete</button>
                </form>
                <br>
                <a href="{{route('roles.index')}}?userid={{$user->id}}">
                   <button class="btn btn-outline-primary" style="width:57%">Roles</button>
                </a>
                <br><br>
                <a href="{{route('permissions.index')}}?userid={{$user->id}}">
                   <button class="btn btn-outline-primary" style="width:78%">Permissions</button>
                </a>
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
        {{$users->links()}}
      </div>
    </div>
    @endsection
</x-admin-master>