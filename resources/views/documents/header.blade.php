<header>
    <div class="container-fluid" id="nav">
        @include('user.parts.dropdown_logo')
        <nav class="navbar navbar-expand-md">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/complaints">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/documents" id="nav-active-link">Request</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/aboutus">About Us</a>
                    </li>
                </ul>
                @include('user.parts.dropdown_auth')
            </div>
        </nav>
    </div>
</header>