<!doctype html>
<html lang="en">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('storage/stylesheets/bootstrap.min.css') }}">
    <!-- Custom -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet" href="{{ asset('storage/stylesheets/services/agricultural.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/stylesheets/services/agricultural-responsive.css') }}">
<title>
    Agricultural
</title>

<body>
    <div class="wrapper">
        @include('user.parts.header')
            <!--Content-->
            <main>
                <div class="content">
                    <div class="bg-image" style="background-image: url('{{ asset('storage/images/services/background.png') }}'">
                        <div class="container-fluid" id="agricultural">
                            <p class="title"> AGRICULTURAL </p>
                            <p class="text-content">Health centers provide access to basic health care
                                services in the communities that need them most. Their doors are open
                                to everyone – families and children, farm workers and the homeless,
                                and those who are uninsured, on Medicaid, or have private insurance. </p>
                            <hr
                                style="width: 100%; height: 0.5px; border-width:0; color:antiquewhite; background-color: white;">
                            <img src="{{ asset('storage/images/services/tree-planting1.jpg') }}" id="img-tree">
                        </div>
                        <div class="container-fluid" id="content-container">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-4">
                                    <div class="img-cleanup">
                                        <img src="{{ asset('storage/images/services/clean-up-drive.jpg') }}" id="cleanup-driver">
                                    </div>
                                    <div class="container-fluid" id="texts">
                                        <div class="text-content">
                                            <p class="titlecap1">CLEAN-UP DRIVE</p>
                                            <p class="text1">Serve as the frontliners in the barangay in providing
                                                basic health services. They play a vital role in
                                                accomplishing the primary health care approach towards
                                                health empowerment by providing accessible and acceptable</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-4">
                                    <div class="img-seminar">
                                        <img src="{{ asset('storage/images/services/clean-up-drive.jpg') }}" id="seminar">
                                    </div>
                                    <div class="container-fluid" id="texts">
                                        <div class="text-content">
                                            <p class="titlecap2">RECYCLING SEMINAR</p>
                                            <p class="text2">Serve as the frontliners in the barangay in providing
                                                basic health services. They play a vital role in
                                                accomplishing the primary health care approach towards
                                                health empowerment by providing accessible and acceptable</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Footer -->
            <footer class="page-footer">
                <div class="container">
                </div>

                <div class="container-fluid" id="footer-footer">
                    <div class="container" id="bottom">
                        <p class="float-md-left">Made possible by UMak Students</p>
                        <p class="float-md-right">Copyright &copy; 2022 Management Website by Cembo</p>
                    </div>
                </div>
            </footer>
    </div>
    <!--* BOOTSTRAP JS-->
    <script src="{{ asset('storage/javascripts/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>
</body>

</html>