<x-home-master>
    @section('content')
    <h1 style="margin-top: 10%">Welcome, {{Auth::user()->name}} !</h1>
    @endsection
</x-home-master>