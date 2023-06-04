<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About us</title>
    <link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('storage/css/Aboutus.css') }}" rel="stylesheet">
    <style>
        .btn-content {
            float: right;
        }

    </style>
</head>
@auth
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
                                <a class="nav-link" href="/">Home</a>
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
                                <a class="nav-link" href="/aboutus" id="nav-active-link">About Us</a>
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
                 @if (session('success'))
                    <div id="success-message" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="parallax-bg-img" style="background-image: url('{{ asset('storage/res/img/bg/BG.png') }}'); min-height: 100vh;">
                    <div class="container-fluid" id="intro-container">
                        <span id="intro">About Us</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content">Introduction</span>
                            @if(auth()->user()->role == 'Content Manager' || 'Admin')
                            <button class="btn btn-warning introduction-edit btn-content" data-id="{{ $introduction->id }}">Edit</button>
                            @endif
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid introduction-container" id="description-container-b">
                            {!! $introduction->html_content !!}
                        </div>
                    </div>
                    @if(auth()->user()->role == 'Content Manager' || 'Admin')
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content">History</span>
                            <button class="btn btn-warning history-edit-1 btn-content" data-id="{{ $history->id }}">Edit</button>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid history-container-1" id="description-container-b">
                            {!! $history->html_content !!}
                        </div>
                    </div>
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content"> cont. (History) </span>
                            <button class="btn btn-warning history-edit-2 btn-content" data-id="{{ $history_cont->id }}">Edit</button>
                        </div>
                        <div class="container-fluid">
                            <br>
                        </div>
                        <div class="container-fluid history-container-2" id="description-container-b">
                            {!! $history_cont->html_content !!}
                        </div>
                    </div>
                    @else
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content">History</span>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid history-container-1" id="description-container-b">
                            {!! $history->html_content !!}
                        </div>
                        <div class="container-fluid history-container-2" id="description-container-b">
                            {!! $history_cont->html_content !!}
                        </div>
                    </div>
                    @endif
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-c">
                        <span id="intro" class="disp-content">Our Values</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content">Mission</span>
                            @if(auth()->user()->role == 'Content Manager' || 'Admin')
                            <button class="btn btn-warning mission-edit btn-content" data-id="{{ $mission->id }}">Edit</button>
                            @endif
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid mission-container" id="description-container-b">
                            {!! $mission->html_content !!}
                        </div>
                    </div>
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content">Vision</span>
                            @if(auth()->user()->role == 'Content Manager' || 'Admin')
                            <button class="btn btn-warning vision-edit btn-content" data-id="{{ $vision->id }}">Edit</button>
                            @endif
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid vision-container" id="description-container-b">
                            {!! $vision->html_content !!}
                        </div>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-c">
                        <span id="intro">Meet the Crew</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <div class="row" style="justify-content: space-evenly;">
                            <div class="col-lg-4 col-sm-6" id="portrait-container">
                                <hr>
                                <span id="title">Barangay Officials</span>
                                <hr>
                                <div class="container-fluid" id="polaroid">
                                    <img id="image" src="{{ $punong_barangay->photo ? asset(str_replace('public/', '', 'storage/' . $punong_barangay->photo)) : asset('storage/images/blank_profile_pic.webp') }}" >
                                  
                                    <div class="container-fluid" id="name-container">
                                        {{ $punong_barangay->name ?? '' }}
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        {{ $punong_barangay->position ?? '' }}
                                    </div>
                                </div>
                                <hr>
                                <span id="title">Barangay Kagawad</span>
                                <hr>

                                @for ($i = 0; $i < count($barangay_kagawad); $i += 2)
                                <div class="row">
                                    @for ($j = $i; $j < min($i + 2, count($barangay_kagawad)); $j++)
                                        <div class="col-lg-6 col-sm-6" id="portrait-container">
                                            <div class="container-fluid" id="polaroid">
                                                <div style="background-image: url('{{ asset(str_replace('public/', '', 'storage/' . $barangay_kagawad[$j]['photo'])) ?? 'storage/images/blank_profile_pic.webp' }}');'" id="image-2">
                                                </div>
                                                <div class="container-fluid" id="name-container">
                                                    {{ $barangay_kagawad[$j]['name'] ?? 'Official' }}
                                                </div>
                                                <div class="container-fluid" id="description-container-c">
                                                    {{ $barangay_kagawad[$j]['position'] ?? 'Position' }}
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                @endfor
                            </div>
                            <div class="col-lg-4 col-sm-6" id="portrait-container">
                                <hr>
                                <span id="title">SK Officials</span>
                                <hr>
                                <div class="container-fluid" id="polaroid">
                                <img id="image" src="{{ $punong_barangay->photo ? asset(str_replace('public/', '', 'storage/' . $sk_chairperson->photo)) : asset('storage/images/blank_profile_pic.webp') }}" >
                                    <div class="container-fluid" id="name-container">
                                        {{ $sk_chairperson->name ?? '' }}
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        {{ $sk_chairperson->position ?? '' }}
                                    </div>
                                </div>
                                <hr>
                                <span id="title">SK Kagawad</span>
                                <hr>
    
                                @for ($i = 0; $i < count($sk_kagawad); $i += 2)
                                <div class="row">
                                    @for ($j = $i; $j < min($i + 2, count($sk_kagawad)); $j++)
                                        <div class="col-lg-6 col-sm-6" id="portrait-container">
                                            <div class="container-fluid" id="polaroid">
                                                <div style="background-image: url('storage/images/blank_profile_pic.webp');" id="image-2">
                                                </div>
                                                <div class="container-fluid" id="name-container">
                                                    {{ $sk_kagawad[$j]['name'] ?? 'Official' }}
                                                </div>
                                                <div class="container-fluid" id="description-container-c">
                                                    {{ $sk_kagawad[$j]['position'] ?? 'Position' }}
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                @endfor
                            </div>
                        </div>
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
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--* AJAX-->
    <script src="{{ asset('storage/javascripts/jquery.js') }}"></script>
    @if(auth()->user()->role == 'Content Manager' || 'Admin')
    <script src="{{ asset('storage/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('storage/ckeditor/aboutus.config.js') }}"></script>
    <script>
        $(document).ready(function() {
        $('.introduction-edit-btn').click(function() {
            // Create Bootstrap modal
            var modal = $(
            '<div class="modal fade" tabindex="-1" role="dialog">' +
                '<div class="modal-dialog" role="document">' +
                    '<div class="modal-content">' +
                        '<div class="modal-header">' +
                            '<h5 class="modal-title">Content Edited</h5>' +
                            '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
                            '</div>' +
                            '<div class="modal-body">' +
                            '<p>Content edited successfully!</p>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>');

            // Append modal to the body
            $('body').append(modal);

            // Show the modal
            modal.modal('show');

            // Remove the modal from the DOM when it is hidden
            modal.on('hidden.bs.modal', function() {
            modal.remove();
            });
        });
        });
    </script>

    @endif
</body>
@endauth
</html>