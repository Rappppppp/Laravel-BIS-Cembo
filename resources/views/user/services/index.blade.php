<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/Services.css') }}" rel="stylesheet">
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
                        <span>Our Services</span>
                    </div>
                    <hr style="height: 10px; background-color: #FCC422; opacity: 100%; margin: 0;">
                    <div class="container-fluid" id="content-container-a">
                        <span>Barangay serves as the primary planning and implementing unit of government policies,
                            plans, programs, projects, and activities in the community, and as a forum wherein the
                            collective views of the people may be expressed, crystallized and considered, and where
                            disputes may be amicably settled.</span>
                    </div>
                    <hr style="height: 10px; background-color: #FCC422; opacity: 100%; margin: 0;">
                    <div class="container-fluid d-lg-block d-md-block d-sm-none d-none" style="padding: 0; width: 100%; overflow: hidden;">
                        <div class="row" style="padding: 0;">
                            <div class="col">
                                <img src="{{ asset('storage/res/img/sample/consulation.jpg') }}" style="width: 125%; height: 100%; background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment: fixed;">
                            </div>
                            <div class="col">
                                <img src="{{ asset('storage/res/img/sample/tree-planting.jpg') }}" id="skewed">
                            </div>
                            <div class="col">
                                <img src="{{ asset('storage/res/img/sample/fire-dept1.jpg') }}" id="skewed">
                            </div>
                            <div class="col" style="overflow: hidden; margin: 0; padding: 0;">
                                <img src="{{ asset('storage/res/img/sample/maintenance.jpg') }}" id="skewed">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" id="content-container-b">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6" id="description-container-a">
                                <img src="{{ asset('storage/res/img/sample/consulation.jpg') }}" class="d-lg-none d-md-none d-sm-block" id="image-for-small">
                                <span style="font-size: 28px; font-weight: bold;">HEALTH CENTER</span>
                                <hr>
                                <span>Serve as the frontliners in the barangay in providing basic health services. They
                                    play a vital role in accomplishing the primary health care approach towards health
                                    empowerment by providing accessible and acceptable</span>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="description-container-a">
                                <img src="{{ asset('storage/res/img/sample/tree-planting.jpg') }}" class="d-lg-none d-md-none d-sm-block" id="image-for-small">
                                <span style="font-size: 28px; font-weight: bold;">AGRICULTURAL</span>
                                <hr>
                                <span>The tree planting activity aims to raise awareness to the society in the importance of planting and saving trees, this will express our concern to the environment, and diminish the unfavorable effects of climate change</span>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="description-container-a">
                                <img src="{{ asset('storage/res/img/sample/fire-dept1.jpg') }}" class="d-lg-none d-md-none d-sm-block" id="image-for-small">
                                <span style="font-size: 28px; font-weight: bold;">FIRE DEPARTMENT</span>
                                <hr>
                                <span>Rescue is the most important function of every fire department. From day one in recruit school, firefighters are programmed that life safety is the number one priority. Rescues are situations where firefighters promise</span>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="description-container-a">
                                <img src="{{ asset('storage/res/img/sample/maintenance.jpg') }}" class="d-lg-none d-md-none d-sm-block" id="image-for-small">
                                <span style="font-size: 28px; font-weight: bold;">Lorem Ipsum</span>
                                <hr>
                                <span>Serve as the frontliners in the barangay in providing basic health services. They
                                    play a vital role in accomplishing the primary health care approach towards health
                                    empowerment by providing accessible and acceptable</span>
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
    <script src="{{ asset('storage/node_modules/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('storage/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>

</html>