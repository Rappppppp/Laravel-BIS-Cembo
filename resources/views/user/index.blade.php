<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    
    <link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/Homepage.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper"> <!-- Fixes Footer to Bottom -->
        <!-- Nav -->
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
                                    @elseif(Auth::user()->role == 'Content Manager')
                                        <a class="dropdown-item" href="/edit-officials">Manage Content</a>
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
                    </div>
                </nav>
            </div>
        </header>
        <!-- Content -->
        <main>
            <div id="content">
                <div class="parallax-bg-img" style="background-image: url('{{ asset('storage/res/img/bg/BG.png') }}');">
                    <div class="container-fluid" id="content-container">
                        @foreach($posts as $post)
                        <div class="container" id="post-container">
                       
                            <div class="row">
                                <div class="col" style="padding: 30px;">
                                    <span>
                                    Posted by: {{ $post['posted_by'] }}
                                    </span>
                                </div>
                                <div class="col" style="padding: 30px; text-align: right;">
                                @php
                                        $post_time = strtotime($post['created_time']);
                                        $current_time = time();
                                        $diff = $current_time - $post_time;

                                        if ($diff < 60) {
                                            $duration = 'less than a minute';
                                        } elseif ($diff < 3600) {
                                            $duration = round($diff/60) . ' minute'.(round($diff/60)>1?'s':'');
                                        } elseif ($diff < 86400) {
                                            $duration = round($diff/3600) . ' hour'.(round($diff/3600)>1?'s':'');
                                        } elseif ($diff < 2592000) {
                                            $duration = round($diff/86400) . ' day'.(round($diff/86400)>1?'s':'');
                                        } elseif ($diff < 31536000) {
                                            $duration = round($diff/2592000) . ' month'.(round($diff/2592000)>1?'s':'');
                                        } else {
                                            $duration = round($diff/31536000) . ' year'.(round($diff/31536000)>1?'s':'');
                                        }
                                    @endphp

                                    {{ $duration }} ago |
                                    <span>{{ date('h:i A', strtotime($post['created_time'])) }}</span>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 15px; margin-right: 15px;">
                                <hr style="height: 5px; background-color: white;">
                            </div>
                            <div class="row" style="padding: 20px;">
                                <span style="font-size: 28px; color: #FCC422;">{{ $post['title'] }}</span>
                            </div>
                            <div class="row" style="padding: 20px; padding-top: 0;">
                                <span>{{ $post['message'] }}</span>
                                <a href="{{ $post['permalink_url'] }}" target="_blank" style="color: #FCC422; text-decoration: none;">More Info...</a>
                            </div>
                            <div class="row">
                                @php
                                    $extension = pathinfo($post['full_picture'], PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ $post['full_picture'] }}">
                                @elseif ($extension === 'mp4')
                                    <video src="{{ $post['full_picture'] }}" controls></video>
                                @else
                                    <p>Unsupported file type</p>
                                @endif
                            </div>

                            <div class="row" style="padding: 20px;">
                                <span>Tags: {{ $post['tags'] }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="page-footer">
            <div class="container-fluid" id="footer-footer">
                <div class="container" id="bottom">
                    <p>Copyright &copy; 2022</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('storage/node_modules/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('storage/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>

</html>