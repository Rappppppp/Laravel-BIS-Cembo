<header>
    <div class="container-fluid" id="nav">
        <div class="navbar-toggler d-sm-block d-lg-none d-md-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavbar" id="logo-container">
            <img src="{{ asset('storage/res/img/logo/logo.png') }}" class="img-fluid rounded-circle" id="logo">
        </div>

        <div class="container-fluid d-lg-block d-md-block d-sm-none d-none" id="logo-container">
            <img src="{{ asset('storage/res/img/logo/logo.png') }}" class="img-fluid rounded-circle" id="logo">
        </div>

        <nav class="navbar navbar-expand-md">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/" id="nav-active-link">Home</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/complaints">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/documents">Request</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/aboutus">About Us</a>
                    </li>
                </ul>
                @auth 
                <ul class="navbar-nav" style="margin-left: auto; margin-right: 5%;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                            {{ Auth::user()->personalInformation->first_name }} {{ Auth::user()->personalInformation->last_name }}
                      
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                       
                            @if(Auth::user()->role == 'Admin')
                                <a class="dropdown-item" href="/admin">Admin</a>
                            @endif 
                       
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"> 
                            @if(Auth::check())
                                <form action="{{ url('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="dropdown-item">Log Out
                                    </button>
                                </form>
                            @endif</a>
                        </div>
                    </li>
                </ul>
                @endauth
                @guest
                <ul class="navbar-nav" style="margin-left: auto; margin-right: 5%;">
                    <li>   
                        <a class="nav-link" href="/register" id="navbarDropdown" role="button">Register</a>     
                    </li>
                    <li class="navbar-nav" style=" margin-right: 5%;">  
                        <a class="nav-link" href="/login" id="navbarDropdown" role="button">Login</a>  
                    </li>
                </ul>
                @endguest
            </div>
        </nav>
    </div>
</header>