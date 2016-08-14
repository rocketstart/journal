<nav class="navbar navbar-default navbar-custom navbar-fixed-top is-fixed is-visible">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Rocketstart Journal</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                @if (auth()->guest())
                    <li><a href="{{ route('show.login') }}">Login</a></li>
                @else
                    <li><a href="{{ route('posts.create') }}">New Story</a></li>
                    <li><a href="{{ route('logout') }}"><em class="fa fa-sign-out"></em></a></li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>