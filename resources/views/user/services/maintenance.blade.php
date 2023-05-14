<!doctype html>
<html lang="en">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('storage/stylesheets/bootstrap.min.css') }}">
<!-- Custom -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
<link rel="stylesheet" href="{{ asset('storage/stylesheets/services/maintenance.css') }}">
<link rel="stylesheet" href="{{ asset('storage/stylesheets/services/maintenance.css') }}">
<title>
    Maintenance
</title>

<body>
    <div class="wrapper">
        @include('user.parts.header')
            <!--Content-->
            <main>
                <div class="content">
                    <div class="bg-image" style="background-image: url('{{ asset('storage/images/services/background.png') }} ');">
                        <div class="container-fluid" id="maintenance-container">
                            <p class="title">MAINTENANCE</p>
                            <p class="text-content">Health centers provide access to basic health care
                                services in the communities that need them most. Their doors are open
                                to everyone – families and children, farm workers and the homeless,
                                and those who are uninsured, on Medicaid, or have private insurance. </p>
                            <hr
                                style="width: 100%; height: 0.5px; border-width:0; color:antiquewhite; background-color: white;">
                            <img src="{{ asset('storage/images/services/maintenance.jpg') }}" id="img-maintenance">
                        </div>
                        <!--ROAD-->
                        <div class="container-fluid" id="road-container">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-7 col-sm-4">
                                            <img src="{{ asset('storage/images/services/road.jpg') }}" id="road">
                                        </div>
                                        <div class="col">
                                            <p class="titlecap1">ROAD</p>
                                            <p class="textcontent1">Health centers provide access to basic health
                                                care
                                                services in the communities that need them most. Their doors are
                                                open
                                                to everyone – families and children, farm workers and the homeless,
                                                and those who are uninsured, on Medicaid, or have private insurance.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--GARBAGE COLLECTING-->
                        <div class="container-fluid" id="garbage-container">
                            <div class="row">
                                <div class="col">
                                    <p class="titlecap2">GARBAGE COLLECTING</p>
                                    <p class="textcontent2">Health centers provide access to basic health care
                                        services in the communities that need them most. Their doors are open
                                        to everyone – families and children, farm workers and the homeless,
                                        and those who are uninsured, on Medicaid, or have private insurance.</p>
                                </div>
                                <div class="col-lg-6 col-md-8 col-sm-4">
                                    <img src="{{ asset('storage/images/services/gargbage.jpg') }}" id="garbage">
                                </div>
                            </div>
                        </div>
                        <!-- ELECTRICAL -->
                        <div class="container-fluid" id="electrical-container">
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('storage/images/services/electrical.jpg') }}" id="electrical">
                                </div>
                                <div class="col-lg-6 col-md-4 col-sm-4">
                                    <p class="titlecap3">ELECTRICAL</p>
                                    <p class="textcontent3">Health centers provide access to basic health care
                                        services in the communities that need them most. Their doors are open
                                        to everyone – families and children, farm workers and the homeless,
                                        and those who are uninsured, on Medicaid, or have private insurance.</p>
                                </div>
                            </div>
                        </div>
                        <!-- WATER -->
                        <div class="container-fluid" id="water-container">
                            <div class="row">
                                <div class="col">
                                    <p class="titlecap4">WATER</p>
                                    <p class="textcontent4">Health centers provide access to basic health care
                                        services in the communities that need them most. Their doors are open
                                        to everyone – families and children, farm workers and the homeless,
                                        and those who are uninsured, on Medicaid, or have private insurance.</p>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-4">
                                    <img src="{{ asset('storage/images/services/water.jpg') }}" id="water">
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