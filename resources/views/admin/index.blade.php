<x-admin-master>
    @section('content')
    @if(Auth::user()->hasAccess('Admin'))
        <h1 class="mb-0">Dashboard</h1>
    @endif
    @endsection
</x-admin-master>