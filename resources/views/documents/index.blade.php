<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request</title>
    <link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/Request.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper"> <!-- Fixes Footer to Bottom -->
        <!-- Nav -->
        @include('documents.header')
        <!-- Content -->
        <main>
            <div id="content">
                <div class="parallax-bg-img" style="background-image: url('{{ asset('storage/res/img/bg/BG.png') }}'); min-height: 100vh;">
                    @include('documents.intro')
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