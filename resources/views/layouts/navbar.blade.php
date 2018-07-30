<nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 .25rem .125rem 0 rgba(0,0,0,.05);">
    <div class="container" style="max-width: 900px;">

        <a class="navbar-brand" href="#"><h2>Laravel</h2></a>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: red;">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>

            </li>
        </ul>

    </div>
</nav>
