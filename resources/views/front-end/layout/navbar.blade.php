<nav class="navbar navbar-expand-lg sticky-top " style="background-color: #FFFFFC">
    <div class="container-fluid p-2 align-items-center justify-content-center" style="margin-inline: 9vw; font-size: 1rem">
      <a class="navbar-brand fw-semibold fs-4 m-0" href=" {{  route('home')  }} ">{{ __('Schuhe') }}</a>
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto gap-4">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{  route('product.men')  }}">{{ __('Men') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{  route('product.women')  }}">{{ __('Women') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{  route('product.brand')  }}">{{ __('Brand') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">{{ __('My Order') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('user.cart') }}">{{ __('My Cart') }}</a>
          </li>
        </ul>
        <form class="d-flex me-2" role="search">
          <input class="form-control text-decoration-none rounded-5 me-1" style="border: none; background-color: #E5E5E7" type="search" placeholder="search" aria-label="Search">
          <button class="btn" type="submit"><i class="bi bi-search"></i></button>
        </form>
        <ul class="navbar-nav">
            <li class="nav-item dropdown m-0">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person fs-4 nav-link"></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('user.profile') }}">Edit Profile</a></li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                        this.closest('form').submit();"><i class="far fa-sign-out-alt"></i>Log out</a>
                    </form>
                </li>
                </ul>
              </li>
        </ul>
      </div>
    </div>
</nav>
