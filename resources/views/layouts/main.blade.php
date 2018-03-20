<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/">Cartoonize Bulk Orders</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/"><i class="fas fa-home"></i>

 Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>

Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>

 Login</a>
            </li>
            @else


            

            <li class="nav-item">
              <a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i> My Shopping Cart</a>
            </li>



            <li class="nav-item dropdown">

              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> {{Auth::user()->name}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/my_orders">My Orders</a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" class="dropdown-item">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

              </div>
            </li>
            @endguest
             
        
          </ul>
        </div>
      </div>
    </nav>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" style="margin: 17px 20.8% 0px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" style="margin: 17px 20.8% 0px;">
            <ul>
              <li>{{ session('message') }}</li>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- Page Content -->
    <div class="container">

      @yield('content')

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('bootstrap/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

  </body>

</html>
