<x-admin-master>
    @section('content')
    <a href="{{url()->previous()}}" class="text-decoration-none text-reset">&larr; Back</a>
    <h1 class="text-center">Update</h1>
    <p class="text-danger text-center"><i class="fas fa-fw fa-asterisk"></i> Required Fields</p>
    <form action="{{route('roles.update', $role)}}" method="POST">  
        @method('PUT')
        @csrf
        <div class="form-group mx-auto" style="width: 30%; margin-top:3%">
            <label for="name" style="font-weight: bold; font-size:150%"><i class="fas fa-fw fa-asterisk text-danger" style="font-size: 70%"></i> Name :</label>
            <input type="text" id="name" placeholder="Enter name" name="name" value="{{$role->name}}" class="form-control @error('name') is-invalid @enderror">
        </div>
        @error('name')
        <div class="form-group mx-auto" style="width: 30%">
            <strong class="text-danger">{{$message}}</strong>
        </div>
        @enderror
        <div class="form-group mx-auto" style="width: 30%;">
            <label for="slug" style="font-weight: bold; font-size:150%"><i class="fas fa-fw fa-asterisk text-danger" style="font-size: 70%"></i> Slug :</label>
            <input type="text" id="slug" placeholder="Enter slug" name="slug" value="{{$role->slug}}" class="form-control @error('slug') is-invalid @enderror">
        </div>
        @error('slug')
        <div class="form-group mx-auto" style="width: 30%">
            <strong class="text-danger">{{$message}}</strong>
        </div>
        @enderror
        <br>
        <div class="form-group mx-auto d-flex justify-content-center">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
    @endsection
</x-admin-master>