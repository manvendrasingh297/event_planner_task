<div class="nave_menu">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{ asset('public/assets/images/logo.png') }}" />
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('/')}}">HOME</a></li> 
                    @if(!\Auth::check()) 
                        <li><a href="{{ route('login') }}">LOGIN</a></li> 
                        <li><a href="{{ route('register') }}">SIGNUP</a></li>  
                    @else
                        <li><a href="{{ route('event_list') }}">EVENT</a></li>
                        <li><a href="{{ url('front_logout') }}">LOGOUT</a></li></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>