<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('images/LB.png') }}" alt="{{ config('app.name', 'Luxury Building') }}">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="/gallery"><i class="fa fa-photo"></i> Gallery</a></li>
                <li><a href="/calc"><i class="fa fa-calculator"></i> Calculator</a></li>
                <li><a href="/contacts"><i class="fa fa-phone-square"></i> Contacts</a></li>
                @if (Auth::guest())

                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a> </li>
                    {{--<li> <a href="{{ route('register') }}"><span class="fa fa-pencil"></span> Register</a></li>--}}
                @else
                    <li class="dropdown">
                        <a href="#" onclick="event.preventDefault();" class="dropdown-toggle" id='user-dropdown' data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="user-dropdown">
                            <li><a href="/cpc">My project</a></li>
                            <li><a href="/ilc">Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="   event.preventDefault();
                                                                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>

                        </ul>

                        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                @endif
            </ul>
        </div>
    </div>
</nav>