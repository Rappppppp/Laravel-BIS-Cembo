<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Services</title>
    <link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/Services.css') }}" rel="stylesheet">
    <style>
        .btn-content {
            float: right;
        }
    </style>
</head>

<body>
    <div class="wrapper"> <!-- Fixes Footer to Bottom -->
        <!-- Nav -->
        <header>
            <div class="container-fluid" id="nav">
                @include('user.parts.dropdown_logo')
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
                                <a class="nav-link" href="/services"  id="nav-active-link">Services</a>
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
        <!-- Content -->
        <main>
            <div id="content">
                <div class="parallax-bg-img" style="background-image: url('{{ asset('storage/res/img/bg/BG.png') }}'); min-height: 100vh;">
                    <div class="container-fluid" id="intro-container">
                        <span id="intro">Our Services</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <span>Barangay serves as the primary planning and implementing unit of government policies,
                            plans, programs, projects, and activities in the community, and as a forum wherein the
                            collective views of the people may be expressed, crystallized and considered, and where
                            disputes may be amicably settled.</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid d-lg-block d-md-block d-sm-none d-none"
                        style="padding: 0; width: 100%; overflow: hidden;">
                        <div class="row">
                            <div class="col">
                                <div style="background-image: url('{{ asset('storage/res/img/sample/consulation.jpg') }}'); clip-path: none;"
                                    id="skewed">
                                </div>
                            </div>
                            <div class="col">
                                <div style="background-image: url('{{ asset('storage/res/img/sample/tree-planting.jpg') }}');" id="skewed">
                                </div>
                            </div>
                            <div class="col">
                                <div style="background-image: url('{{ asset('storage/res/img/sample/fire-dept1.jpg') }}');" id="skewed">
                                </div>
                                <img src="{{ asset('storage/res/img/sample/fire-dept1.jpg') }}" id="skewed">
                            </div>
                            <div class="col" style="overflow: hidden; margin: 0; padding: 0;">
                                <div style="background-image: url('{{ asset('storage/res/img/sample/maintenance.jpg') }}');" id="skewed">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" id="content-container-b">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6" id="description-container-a">
                                <img src="{{ asset('storage/res/img/sample/consulation.jpg') }}" class="d-lg-none d-md-none d-sm-block"
                                    id="image-for-small">
                                <div class="container-fluid" id="title-container-a">
                                    <span id="title">Health Center</span>
                                    <button class="btn btn-warning health-edit btn-content" data-id="{{ $health->id }}">Edit</button>
                                </div>
                                <div class="container-fluid">
                                    <hr>
                                </div>
                                <div class="container-fluid health-container" id="description-container-b">
                                    {!! $health->html_content !!}
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="description-container-a">
                                <img src="{{ asset('storage/res/img/sample/tree-planting.jpg') }}" class="d-lg-none d-md-none d-sm-block"
                                    id="image-for-small">
                                <div class="container-fluid" id="title-container-a">
                                    <span id="title">Agricultural</span>
                                    <button class="btn btn-warning agricultural-edit btn-content" data-id="{{ $agriculture->id }}">Edit</button>
                                </div>
                                <div class="container-fluid">
                                    <hr>
                                </div>
                                <div class="container-fluid agricultural-container" id="description-container-b">
                                    {!! $agriculture->html_content !!}
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="description-container-a">
                                <img src="{{ asset('storage/res/img/sample/fire-dept1.jpg') }}" class="d-lg-none d-md-none d-sm-block"
                                    id="image-for-small">
                                <div class="container-fluid" id="title-container-a">
                                    <span id="title">Fire Department</span>
                                    <button class="btn btn-warning firedept-edit btn-content" data-id="{{ $firedept->id }}">Edit</button>
                                </div>
                                <div class="container-fluid">
                                    <hr>
                                </div>
                                <div class="container-fluid firedept-container" id="description-container-b">
                                    {!! $firedept->html_content !!}
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="description-container-a">
                                <img src="{{ asset('storage/res/img/sample/maintenance.jpg') }}" class="d-lg-none d-md-none d-sm-block"
                                    id="image-for-small">
                                <div class="container-fluid" id="title-container-a">
                                    <span id="title">Maintenance</span>
                                    <button class="btn btn-warning maintenance-edit btn-content" data-id="{{ $maintenance->id }}">Edit</button>
                                </div>
                                <div class="container-fluid">
                                    <hr>
                                </div>
                                <div class="container-fluid maintenance-container" id="description-container-b">
                                    {!! $maintenance->html_content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        @include('user.parts.footer')
    </div>
    <script src="{{ asset('storage/javascripts/jquery.js') }}"></script>
    <script src="{{ asset('storage/node_modules/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('storage/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    @if(auth()->user()->role == 'Content Manager' || 'Admin')
    <script src="{{ asset('storage/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('storage/ckeditor/services.config.js') }}"></script>
    @endif
</body>

</html>