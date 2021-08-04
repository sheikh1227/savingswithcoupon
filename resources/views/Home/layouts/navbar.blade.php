<div class="container" role="navigation">
    <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light mt-3">

        {{-- <a class="navbar-brand" href="index.html"> --}}
        {{-- <img width="250" height="61" src="content/images/logo10075e1f.png?v=2" class="img img-responsive"></a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="show">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
                @if(Auth::user()&&Auth::user()->is_admin)
                    <li class="nav-item"><a class="nav-link" href="show">Admin</a></li>
                @endif

                @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <li class="nav-item"><a class="nav-link" href="login">Login</a></li>

                @endif

            </ul>
        </div>

    </nav>
</div>
