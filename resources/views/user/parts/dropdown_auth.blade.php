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
            @elseif(Auth::user()->role == 'Barangay Official')
                <a class="dropdown-item" href="/admin">View Residents</a>
            @endif 
    
            <div class="dropdown-divider"></div>
            <a class="dropdown-item p-0" href="#"> 
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