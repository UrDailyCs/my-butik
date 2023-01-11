<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="padding: 2rem 2rem 2rem 2rem">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.png') }}" alt="" width="35" height="30"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="justify-content: space-between; ">
            <div class="navbar-nav">
                @auth
                    <a class="nav-item nav-link active" href="/home"><i class="fa fa-home"></i> Home</a>
                    @if (auth()->user()->role ==='member')
                        <a class="nav-item nav-link" href="/cart"><i class="fa fa-shopping-cart"></i> Cart</a>
                        <a class="nav-item nav-link" href= "/history"><i class="fa fa-file-text-o"></i> History</a>
                    @endif
                @endauth
            </div>
            <div class="navbar-nav">
                @auth
                    @if (auth()->user()->role ==='admin')
                        <a class="nav-item nav-link" href="/item/add"><i class="fa fa-plus-circle"></i> Add item</a>
                    @endif
                    @if (auth()->user()->role ==='member')
                        <span class="navbar-text">
                            <b>Your Point(s): {{ number_format(auth()->user()->points, '0', ',', '.') }}</b>
                        </span>
                    @endif
                    <div class="d-flex">
                        <a class="nav-item nav-link" href="/profile"><i class="fa fa-user-circle"></i> Profile</a>
                    </div>
                    <div class="d-flex">
                        <a class="nav-item nav-link" href="/logout">Logout</a>
                    </div>
                @else
                    <a class="nav-item nav-link" href="/login">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
