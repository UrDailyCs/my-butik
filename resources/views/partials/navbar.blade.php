<nav class="navbar navbar-expand-lg navbar-warning bg-white" style="padding: 2rem 2rem 2rem 2rem">


    <a class="navbar-brand" href="/">MaiBoutique</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="justify-content: space-between; ">

        <div class="navbar-nav">

            @auth
                <a class="nav-item nav-link active" href="/home">Home</a>
                <a class="nav-item nav-link" href="/search">Search</a>
                @if ( auth()->user()->role ==='member')
                    <a class="nav-item nav-link" href="/cart/{{ auth()->user()->username }}">Cart</a>
                    <a class="nav-item nav-link" href= "/history/{{ auth()->user()->username }}">History</a>
                @endif
                <a class="nav-item nav-link" href="/profile/{{ auth()->user()->username }}">Profile</a>
            @endauth
        </div>

        <div class="navbar-nav">
            @auth
            @if ( auth()->user()->role ==='admin')
                <a class="nav-item nav-link" href="/add_item">Add item</a>
            @endif

                <a class="nav-item nav-link" href="/logout">Logout</a>

            @else
                <a class="nav-item nav-link" href="/login">Login</a>
            @endauth


        </div>

    </div>
  </nav>
