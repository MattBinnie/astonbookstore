<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('book.list')}}">Book Store <i class="fas fa-book-open"></i></a> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('book.list') }}">Home <span class="sr-only">(current)</span></a>
        @if(Auth::check())
          <a class="nav-link" href="{{ route('book.shoppingcart') }}"><i class="fas fa-shopping-cart"></i> Cart <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>
        @endif
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <div class="nav-item dropdown navbar-nav mr-auto">
          @if(Auth::check())
            <a class="nav-link" href="{{ route('user.logout') }}">Logout <span class="sr-only"></span></a>
          @else
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Want to order?
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('user.signin') }}"><i class="far fa-address-card"></i> Login</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('user.signup') }}"><i class="fas fa-plus"></i> Sign Up</a>
          @endif
        </div>
      </div>
    </form>
  </div>
</nav>