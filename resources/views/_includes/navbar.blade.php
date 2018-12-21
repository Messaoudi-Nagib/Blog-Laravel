<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" >{{env("APP_NAME")}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    @if(Session::has("user"))
        <div class="links">

            <a class="mr-3 text-white" href="{{ route("users.logout") }}"> {{ Session::get("user")->firstname }}</a>
        </div>
    @else
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{ route("users.login") }}">Connexion</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route("users.create") }}">Inscription</a>
            </li>
        </ul>
    </div>

        @endif
</nav>
