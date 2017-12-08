<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="d1.xyz">
    <link rel="icon" href="/favicon.ico">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
    <script src="https://use.fontawesome.com/9712be8772.js"></script>
    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
  </head>

<body>
    <div class="container">
        <div class="row">
            <!-- Fixed navbar -->
            <div class="blog-masthead navbar-fixed-top">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="nav-brand" href="/">EV173<sub><small>.com</small></sub></a>
                </div>
                <nav class="blog-nav">
                  <a class="blog-nav-item active" href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                  <a class="blog-nav-item" href="#">New features</a>
                  <a class="blog-nav-item" href="#">Press</a>
                  <a class="blog-nav-item" href="#">New hires</a>
                  <a class="blog-nav-item" href="#">About</a>
                  <div class="blog-nav-item-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <a class="blog-nav-item" href="{{ route('login') }}">Login</a>
                            <a class="blog-nav-item" href="{{ route('register') }}">Register</a>
                        @else
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ Auth::user()->name }}  

                            <a class="blog-nav-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            (Logout)
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            </form>
                        @endif
                    </div>
                </nav>        
              </div>        
            </div>
        </div>
    </div>
    <div class="container">
        <div class="blog-header"></div><!-- /.just add padding to the top -->
        @if(Session::has('flash_message'))
            <div class="container">      
                <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                </div>
            </div>
        @endif 

        <div class="row">
            <div class="col-md-8 col-md-offset-2">              
                @include ('errors.list') {{-- Including error file --}}
            </div>
        </div>

        <div class="row">
            @yield('content')
        </div> <!-- /.row -->
    </div><!-- /.container -->
    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

</body>
</html>