<nav class="navbar navbar-expand" id="top-navbar">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            {{ Auth::user()->role }} {{ Auth::user()->personalInformation->first_name }}
        </li>
        <li class="nav-item">
            <i class="fa fa-solid fa-3x fa-circle-user" id="p-icon"></i>
        </li>

        <li class="nav-item">
        @if(Auth::check())
        <form id="logout-form" action="{{ url('logout') }}" method="POST">
                    {{ csrf_field() }}
            <button type="submit" style="background: none; border-style: none;cursor: pointer;">Logout</button>
        </form>
        @endif
        </li>
        
    </ul>
</nav>