<x-admin-master>
    @section('content')
        <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
        <h1 class="text-center">Roles</h1>
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
        @if(count($roles) > 0)
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th style="width: 10%">Options</th>
                    <th style="width: 10%">Id</th>
                    <th style="width: 30%">Name</th>
                    <th style="width: 30%">slug</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                    <td>
                        <input type="checkbox" 
                        @foreach($user->roles as $role_name)
                        @if($role->id == $role_name->id)
                        checked
                        @endif
                        @endforeach>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->slug}}</td>
                    <td>
                        <form action="{{route('roles.update', $role)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$_REQUEST['userid']}}" name="userid">
                            <input type="submit" name="attach" value="Attach" class="btn btn-primary">
                            <input type="submit" name="dettach" value="Detach" class="btn btn-danger">
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            <div class="text-center">
                <a href="{{route('users.index')}}">
                    <button class="btn btn-primary">
                        Done
                    </button>
                </a>
            </div>
        @else    
        <h3>There are no roles currently</h3>    
        @endif    
        </div>
        </div>
        <div class="d-flex">
        <div class="mx-auto">
            {{$roles->links()}}
        </div>
        </div>
    @endsection
</x-admin-master>