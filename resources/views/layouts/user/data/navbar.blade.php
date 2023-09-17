<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block d-md-none">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{ route('frontend.user.claim-voucher.index') }}"
            type="button" class="btn btn-outline-primary"><i class="bi bi-ticket-perforated-fill">
              </i>  Claim voucher</a>  &nbsp;&nbsp;&nbsp;  
              <a href="{{ url('/') }}"
            type="button" class="btn btn-outline-primary"><i class="bi bi-house-door">
              </i></a>                     
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="dropdown dropdown-notifications">
                        <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <i data-count="0" class="bi bi-bell-fill notification-icon"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-header">
                                <h6 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h6>
                            </li>
                           <ul class="dropdown-menu">
                            </ul>
                            <li>
                                <p class="text-center py-2 mb-0"><a href="#">See all notification</a></p>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{ auth()->user()->role_name }}</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    @if (Auth::user()->avatar)
                                    <img src="{{Auth::user()->avatar}}" class="user-photo" alt="avatar-{{ Auth::user()->name }}">
                                    @else
                                    <img src="{{ asset('dashboard') }}/assets/images/faces/1.jpg" class="user-photo">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Hello, {{ auth()->user()->name }}!</h6>
                        </li>
                        <li><a class="dropdown-item" href="{{route('user.profile')}}"><i class="icon-mid bi bi-person me-2"></i> My
                                Profile</a></li>
                        <li>
                        <li><a class="dropdown-item" href="{{route('user.profile')}}"><i class="icon-mid bi bi-coin me-2"></i> 
                                0 Points</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="#"  href="{{ route('logout')  }}" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                            </form>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
