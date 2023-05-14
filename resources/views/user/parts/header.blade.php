<!-- Nav -->
<header>
    <div class="container-fluid" id="nav">
        <div class="d-flex" id="nav-container">
            <div class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
                id="logo-container">
                <a href="https://www.makati.gov.ph" target="_blank"><img src="{{ asset('storage/images/logo.png') }}"
                        class="img-fluid rounded-circle" id="logo"></a>
            </div>

            <nav class="navbar navbar-expand-md">
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/" id="navbarDropdown">
                                Home<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/services" id="srsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Services
                            </a>
                            <div class="dropdown-menu" aria-labelledby="srsDropdown">
                                <a class="dropdown-item" href="/services">Our Services</a>
                                <a class="dropdown-item" href="/services/health-center">Health Center</a>
                                <a class="dropdown-item" href="/services/agricultural">Agricultural</a>
                                <a class="dropdown-item" href="/services/fire-dept">Fire Department</a>
                                <a class="dropdown-item" href="/services/maintenance">Maintenance</a>
                            </div>
                        </div>
                        <li class="nav-item active">
                            <a class="nav-link" href="/aboutus">
                                About us
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-5">
                        @auth
                            <li>
                                <p class="nav-link text-white m-2">Hello <b>{{ Auth::user()->name }}</b></p>
                            </li>
                            <li>
                                <form action="{{ url('logout') }}"method="post">
                                {{ csrf_field() }}
                                    <button class="nav-link text-white m-2 bg-transparent" type="submit" style="border: none; cursor: pointer;">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>