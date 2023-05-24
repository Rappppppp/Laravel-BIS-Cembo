<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About us</title>
    <link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/Aboutus.css') }}" rel="stylesheet">
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
                        <span id="intro">About Us</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title">Introduction</span>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid" id="description-container-b">
                            <span>Barangay Cembo is situated along the Pasig River and belongs to the Second District of
                                Makati City. It is under the North East Cluster or Cluster 6 with Guadalupe Viejo, West
                                Rembo and Northside. Based on the 2015 Census of Population conducted by the Philippine
                                Statistics Authority (PSA), Cembo has 26,213 total population and a percentage share of
                                4.50%. By population density, on the other hand, considering its land area and
                                population count, the barangay has 61 persons per 1,000 square meters.This barangay has
                                a total land area of 426,700 square meters and it is predominantly residential. Cembo
                                BLISS and the New Building of Makati Science High School are located within Barangay
                                Cembo. </span>
                        </div>
                    </div>
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title">Vision</span>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid" id="description-container-b">
                            <span>Cembo, a popular acronym for Central Enlisted Men’s Barrio, has its beginning in 1949,
                                when the first batch of enlisted servicemen from the Infantry Group, Philippine Ground
                                Force, Florida Blanca, Pampanga arrived at the Fort William McKinley (now Fort
                                Bonifacio). They were directed to settle at big rolling open tract of land adjacent to
                                the North Gate (Gate I) which was mostly covered by a dense growth of cogon grass. The
                                place was selected to be the site for the housing area of the enlisted personnel of the
                                Philippine Ground Force.</span>
                            <br><br>
                            <span>As the bulk of the whole command came later, the housing area became congested. M/Sgt.
                                Teofilo Bautista, the barrio Lieutenant and Assistant Reservation Officer, was directed
                                by the higher headquarter offices to lead a survey team for the location of the
                                unoccupied space in the vast sprawling reservation thus West Rembo was created.
                                Subsequently, the other barrios were created like the East Rembo, Comembo, and Pembo to
                                accommodate the increasing population of the military personnel.</span>
                        </div>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-c">
                        <span id="intro">Our Values</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title">Mission</span>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid" id="description-container-b">
                            <span>Barangay Cembo to be a safe and secured place to live in for its constituents and
                                other stakeholders will advocate and provide continuous information dissemination and
                                intensified actions and programs on the social, economic, infrastructure, environmental
                                management and institutional sectors.</span>
                        </div>
                    </div>
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title">Vision</span>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid" id="description-container-b">
                            <span>Barangay Cembo to be livable and disaster resilient community with safe and secured
                                environment for its God-loving, productive and responsible citizens who will enjoy easy
                                access to employment opportunities and basic services through the efficient and
                                excellent public service of its leaders.</span>
                        </div>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-c">
                        <span id="intro">Meet the Crew</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" id="content-container-a" style="padding-top: 0;">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid" id="content-container-a" style="padding-top: 0;">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6" id="portrait-container">
                                <div class="container-fluid" id="polaroid">
                                    <div style="background-image: url('storage/res/img/sample/7588.webp');" id="image">
                                    </div>
                                    <div class="container-fluid" id="name-container">
                                        Adele
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        The Quick Brown Fox Jumps Over The Lazy Dog
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
            <div class="container-fluid" id="footer-footer">
                <div class="container" id="bottom">
                    <p>Copyright &copy; 2022</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>