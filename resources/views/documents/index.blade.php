<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/Request.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper"> <!-- Fixes Footer to Bottom -->
        <!-- Nav -->
        @include('user.parts.nav')
        <!-- Content -->
        <main>
            <div id="content">
                <div class="parallax-bg-img" style="background-image: url('{{ asset('storage/res/img/bg/BG.png') }}'); min-height: 100vh;">
                    <div class="container-fluid" id="intro-container">
                        <span id="intro">Request Documents</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-b">
                        <div class="col-lg-4 col-md-4 col-sm-12 ms-auto" style="padding: 20px;">
                            <div class="container-fluid" id="input">
                                <div class="select" onchange="change(event.target.value)">
                                    <select id="type">
                                        <option disabled selected>Select Document Type</option>
                                        <option value="{{ route('documents.showForm', ['form' => 'brgyid']) }}">Brgy-ID</option>
                                        <option value="">Brgy-Clearance</option>
                                        <option value="">Indigency</option>
                                    </select>
                                    <div class="select_arrow">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr id="spacer">
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
    <script src="{{ asset('storage/js/Request.js') }}"></script>
    <script src="{{ asset('storage/node_modules/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('storage/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>

</html>