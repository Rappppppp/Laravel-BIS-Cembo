<!doctype html> 
<head>
    @include('admin.components.head')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <style>
        .residents_card
        {
            display: inline;
        }
        .card-residents
        {
            background-color: #ffce56;
        }
        .fa-residents
        {
            font-size: xxx-large;
        }
        .fa-residents-span
        {
            margin-left: 1rem;
        }
        #vaccinated,
        #cards,
        #religion {
            display: block;
            box-sizing: border-box;
            height: 30rem;
            width: 688px;
        }
    </style> 
</head>
<body>
    <div class="wrapper">    
        <header>
            @include('admin.components.sidenav')
            @include('admin.components.nav')
        </header>
            <!-- Content -->
            <main>
            <div id="content">
                <div class="parallax-bg-img" style="background-image: url('res/Rectangle\ 68.png');">
                    <div class="jumbotron bg-white vertical-center" style="background-color: #1a2244!important;">
                        <div class="row row-header pb-5">

                            <div class="col-lg-4 col-md-12 col-sm-12 pt-sm-2 residents_card">
                                <div class="card card-residents p-3">
                                Residents
                                <i class="fa fa-residents fa-user" aria-hidden="true"><span class="fa-residents-span">{{ $userCount }}</span></i>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 pt-sm-2 residents_card">
                                <div class="card card-residents p-3">
                                Household
                                <i class="fa fa-residents fa-home" aria-hidden="true"><span class="fa-residents-span">{{ $householdCount }}</span></i>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 pt-sm-2 residents_card">
                                <div class="card card-residents p-3">
                                Families
                                <i class="fa fa-residents fa-users" aria-hidden="true"><span class="fa-residents-span">{{ $familiesCount }}</span></i>
                                </div>
                            </div>
                        </div>

                        <div class="row text-center">
                            <div class="col-lg-6 mt-sm-3">
                                <div class="card">
                                    <h3>Age</h3>
                                    <div class="chart-container">
                                        <canvas id="ages"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-sm-3">
                                <div class="card">
                                    <h3>Gender</h3>
                                    <div class="chart-container">
                                        <canvas id="gender"></canvas>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row text-center mt-lg-5">
                            <div class="col-lg-6 mt-sm-3">
                                <div class="card">
                                    <h3>Civil Status</h3>
                                    <div class="chart-container">
                                        <canvas id="civil_status"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-sm-3">
                                <div class="card">
                                    <h3>Social Sector</h3>
                                    <div class="chart-container">
                                        <canvas id="social_sector"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row text-center mt-lg-5">
                            <div class="col-lg-6 mt-sm-3">
                                <div class="card">
                                    <h3>Cards Owned</h3>
                                    <div class="chart-container">
                                        <canvas id="cards"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-sm-3">
                                <div class="card">
                                    <h3>COVID-19 Vaccine Status</h3>
                                    <div class="chart-container">
                                        <canvas id="vaccinated"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row text-center mt-lg-5">
                            <div class="col-lg-12 mt-sm-3">
                                <div class="card">
                                    <h3>Religion</h3>
                                    <div class="chart-container">
                                        <canvas id="religion"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>

<!--* BOOTSTRAP JS-->
<script src="{{ asset('storage/javascripts/admin_homepage.js') }}"></script>
<script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>
<!-- CHARTS.JS -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-piechart-outlabels"></script>
<script>
    ages = {!! json_encode($ages) !!};
    child = [], teen = [], youngAdult = [], adult = [], senior = [];
    // child 14 and Below, teen 15-17, youngAdult 15-30, adult 18-59, senior 60 and above
    for (var i in ages) {
        if (ages[i] > 60) {
            senior.push(ages[i]);
        } else if (ages[i] >= 18 && ages[i] <= 59) {
            adult.push(ages[i]);
        } else if (ages[i] >= 15 && ages[i] <= 30) {
            youngAdult.push(ages[i]);
        } else if (ages[i] >= 15 && ages[i] <= 17) {
            teen.push(ages[i]);
        } else if (ages[i] <= 14) {
            child.push(ages[i]);
        }
    }
    // Civil Status
    single = '{{ $singleCount }}'
    married = '{{ $marriedCount }}'
    widowed = '{{ $widowedCount }}'
    separated = '{{ $separatedCount }}'
    livein = '{{ $liveinCount }}'
    divorced = '{{ $divorcedCount }}'
    // Gender
    male = '{{ $maleCount }}'
    female = '{{ $femaleCount }}'
    lesbian = '{{ $lesbianCount }}'
    gay = '{{ $gayCount }}'
    otherGender = '{{ $othersCount }}' 
    // Religion
    catholic = '{{ $catholicCount }}'
    iglesia = '{{ $iglesiaCount }}'
    muslim = '{{ $muslimCount }}'
    bornAgain = '{{ $bornagainCount }}'
    adventist = '{{ $adventistCount }}'
    jehovah = '{{ $jehovahCount }}'
    mormons = '{{ $mormonsCount }}'
    buddhist = '{{ $buddhistCount }}'
    otherReligion = '{{ $otherReligionCount }}'
    // Social Sector
    NA = '{{ $naCount }}'
    education = '{{ $educationCount }}'
    health = '{{ $healthCount }}'
    social = '{{ $socialCount }}'
    sports = '{{ $sportsCount }}'
    // Cards
    yellow = '{{ $yellowCount }}'
    blue = '{{ $blueCount }}'
    white = '{{ $whiteCount }}'
    makatizen = '{{ $makatizenCount }}'
    philhealth = '{{ $philhealthCount }}'
    // Vaccome Status
    singleDose = '{{ $singleDoseCount }}'
    vaccinated = '{{ $vaccinatedCount }}'
    vaccineExempt = '{{ $vaccineExemptCount }}'
    unvaccinated = '{{ $unvaccinatedCount }}'
</script>

<script src="{{ asset('storage/javascripts/chartslib.js') }}"></script>
<script src="{{ asset('storage/javascripts/charts.js') }}"></script>