<div class="blog-masthead">
    <nav class="navbar navbar-inverse container" id="nav-bar-custom">
        <div class="container-fluid">
            <div class="navbar-header">
                @if (Auth::check())
                <p class="navbar-brand">
                    Welcome {{Auth::user()->name }}
                </p>
                @else
                <p class="navbar-brand" href="#">
                    Laracast blog
                </p>
                @endif
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Request::path() === '/' ? ' active ' : null }} {{ Request::path() === 'posts' ? ' active ' : null }}">
                    <a href="/">
                        Home
                    </a>
                </li>
                
                @if (Auth::check())
                <li class="{{ Request::path() === 'posts/create' ? ' active ' : null }}">
                    <a href="/posts/create">
                        Create post
                    </a>
                </li>
                @else

        @endif
            </ul>
            <form action="/" class="navbar-form navbar-left" method="GET">
                {{-- {{ csrf_field() }} --}}
                <div class="input-group">
                    <input class="form-control" id="search" name="search" requiredplaceholder="Search" type="text">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search">
                                </i>
                            </button>
                        </div>
                    </input>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                <li>
                    <a href="/logout">
                        <span class="glyphicon glyphicon-log-out">
                        </span>
                        Logout
                    </a>
                </li>
                @else
                <li class="{{ Request::path() === 'register' ? ' active ' : null }}">
                    <a href="/register">
                        <span class="glyphicon glyphicon-user">
                        </span>
                        Register
                    </a>
                </li>
                <li class="{{ Request::path() === 'login' ? ' active ' : null }}">
                    <a href="/login">
                        <span class="glyphicon glyphicon-log-in">
                        </span>
                        Login
                    </a>
                </li>

                @endif
                <li class="{{ Request::path() === 'cv' ? ' active ' : null }}">
                    <a href="/cv">  
                        <span class="glyphicon glyphicon-user">
                        </span>
                        CV
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
