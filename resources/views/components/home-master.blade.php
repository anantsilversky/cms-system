<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <link href="{{asset('build/assets/app-bbd6a014.css')}}" rel="stylesheet">

    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{asset('build/assets/blog-home.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('home.index')}}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @guest
                @if (Route::has('login'))
                <a class="navbar-brand" href="{{ route('login') }}">
                    <span style="font-size: 80%">Login</span>
                </a>
                @endif

                @if (Route::has('register'))
                <a class="navbar-brand" href="{{ route('register') }}">
                    <span style="font-size: 80%">Register</span>
                </a>
                @endif
            @endguest
            <div class="collapse navbar-collapse justify-content-end " id="navbarResponsive">
                <ul class="navbar-nav">
                    @if(Auth::check())
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post"
                            onsubmit="return confirm('Are you sure you want to logout?');">
                            @csrf
                            <button type="submit" class="nav-link">Logout</button>
                        </form>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                @yield('content')

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card " style="margin-top : 80px; margin-left:40px">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <a class="btn btn-secondary" href="" type="button">Go!</a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card my-4" style="margin-left:40px">
                    <h5 class="card-header">Bio</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature
                        the new Bootstrap 4 card containers!
                    </div>
                </div>
                <!-- Categories Widget -->
                <div class="card my-4" style="margin-left:40px">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{route('posts.index')}}">View your Posts</a>
                                    </li>
                                    <li>
                                        <a href="{{route('posts.create')}}">Create Post</a>
                                    </li>
                                    <li>
                                        <a href="#">Notifications</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        @if(Auth::check())
                                        <a href="{{route('users.show', [Auth::user()])}}">View Profile</a>
                                        @else
                                        <a href="{{route('login')}}">View Profile</a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="#">Your Activity</a>
                                    </li>
                                    <li>
                                        <a href="#">Friends</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 bg-dark mt-auto">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
        </div>
        <!-- /.container -->
    </footer>

    

</body>

</html>