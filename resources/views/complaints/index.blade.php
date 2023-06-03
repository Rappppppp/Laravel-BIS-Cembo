<!-- <style>
.popup-card {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.popup-content {
  background-color: white;
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  text-align: left;
}

.close-btn {
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close-btn:hover {
  color: red;
  cursor: pointer;
}
</style>

<h3>Complaint Form</h3>
<a class="nav-link" href="{{ route('user.homepage') }}" onclick="event.preventDefault();
            this.closest'form').submit(); " role="button">
    Back
</a>
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if (session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form method="POST" action="{{ route('complaints.submit') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <x-label for="complaint">Nature of Complaint</x-label>
        <select class="block mt-1 w-full" type="text" name="complaint" id="complaint" required>
            <option value="Noise disturbance">Noise disturbance</option>
            <option value="Illegal parking">Illegal parking</option>
            <option value="Waste management issues">Waste management issues</option>
            <option value="Animal control complaints">Animal control complaints</option>
            <option value="Water supply problems">Water supply problems</option>
            <option value="Electrical or power outages">Electrical or power outages</option>
            <option value="Street lighting issues">Street lighting issues</option>
            <option value="Public health concerns">Public health concerns</option>
            <option value="Road maintenance complaints">Road maintenance complaints</option>
            <option value="Public safety and security concerns">Public safety and security concerns</option>
            <option value="Building code violations">Building code violations</option>
            <option value="Violation of barangay ordinances">Violation of barangay ordinances</option>
            <option value="Boundary disputes">Boundary disputes</option>
            <option value="Public transportation issues">Public transportation issues</option>
            <option value="Community disputes or conflicts">Community disputes or conflicts</option>
            <option value="Others">Others</option>
        </select>
    </div>

    <div>
        <x-label for="location">Location</x-label>
        <x-input class="block mt-1 w-full" type="text" name="location" id="location" value="{{ old('location') }}" required />
    </div>

    <div>
        <h3>Address</h3>
        <x-label for="stnum">Description</x-label>
        <x-input class="block mt-1 w-full" type="text" name="description" id="description" value="{{ old('description') }}" required />
    </div>
    <br>
    <div>
        <x-label for="photo">Upload ID</x-label>
        <input class="block mt-1 w-full" type="file" name="evidence" id="evidence" accept=".jpg, .jpeg, .png" /><br>
        <i>Supporting evidence (Max Size: 2048x2048, Accepts: jpg, jpeg, png)</i>
    </div>
    <br>
    <div class="flex items-center justify-end mt-4">
        <button type="submit" class="">Submit</button>
    </div>
</form> -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report</title>
    <link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/Report.css') }}" rel="stylesheet">
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
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/complaints" id="nav-active-link">Report</a>
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
                <div class="parallax-bg-img" style="background-image: url('{{ asset('storage/res/img/bg/BG.png') }}'); min-height: 100vh;">
                    <div class="container-fluid" id="intro-container">
                        <span id="intro">Report</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title">Disclaimer: False Accusations, Prank Reports, and Their Potential
                                Punishments</span>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid" id="description-container-b">
                            <span>The following disclaimer is intended to provide general information and should not be
                                considered legal advice. If you have specific concerns or questions about the legal
                                implications of making false accusations or prank reports, it is recommended that you
                                consult with a qualified legal professional. </span>
                        </div>
                    </div>
                    <hr id="spacer">
                    <div class="row container-fluid" style="min-height: 50vh; padding: 0; margin: 0; padding-top: 5%;"
                        id="content-container-b">
                        <div class="col">
                            <div class="row" style="height: fit-content; padding: 10px;">
                                <span id="category-label">Nature of the Complaint</span>
                                <hr id="spacer-2">
                            </div>
                            <div class="row" style="height: fit-content; padding: 10px;">
                                <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                                    <div class="container-fluid" id="input">
                                        <div class="select">
                                            <select id="type">
                                                <option disabled selected>Select Nature of Complaint</option>
                                                <option value="BrgyID.html">Brgy-ID</option>
                                                <option value="BrgyClearance.html">Brgy-Clearance</option>
                                                <option value="Indigency.html">Indigency</option>
                                            </select>
                                            <div class="select_arrow">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-2 col-sm-12 my-2">
                                    <input type="text" placeholder="Description">
                                </div>
                            </div>
                            <div class="row" style="height: fit-content; padding: 10px;">
                                <span id="category-label">Address</span>
                                <hr id="spacer-2">
                            </div>
                            <div class="row" style="height: fit-content; padding: 10px;">
                                <div class="col">
                                    <input type="text" placeholder="Location">
                                </div>
                            </div>
                            <div class="row" style="height: fit-content; padding: 10px; margin-top: 20px;">
                                <div class="col-lg-4 col-md-4 col-sm-12 ms-auto" style="text-align: end;">
                                    <button type="button" id="reset-btn">Reset</button>
                                    <button type="button" id="submit-btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title">False accusations:</span>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid" id="description-container-b">
                            <span>False accusations refer to intentionally making untrue statements or allegations
                                against someone, often with the intention to harm their reputation, cause distress, or
                                achieve personal gain. False accusations can have severe consequences, both legally and
                                personally. It is essential to recognize that making false accusations is morally wrong
                                and may result in legal action.</span>
                            <br><br>
                            <span>Punishments for false accusations may vary depending on the jurisdiction and the
                                specific circumstances of the case. Potential legal consequences can include civil
                                liability for defamation, slander, or libel, which may result in financial penalties,
                                damages, or compensation for the affected party. Additionally, making false accusations
                                may constitute a criminal offense in some cases, such as perjury or filing a false
                                police report, leading to criminal charges, fines, or imprisonment.</span>
                        </div>
                    </div>
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title">Prank Reports:</span>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid" id="description-container-b">
                            <span>Prank reports involve falsely reporting emergencies, crimes, or other incidents with
                                the intent to deceive or cause a disruption. Pranks of this nature can endanger public
                                safety, waste valuable resources, and create unnecessary panic or distress. It is
                                crucial to understand that engaging in prank reports is irresponsible and can have
                                serious consequences.</span>
                            <br><br>
                            <span>The punishment for prank reports may depend on the jurisdiction and the nature of the
                                incident. In many places, making false emergency reports is considered a criminal
                                offense, potentially leading to charges such as false reporting, public mischief, or
                                making a false alarm. The consequences may include legal penalties, fines, community
                                service, probation, or even imprisonment. Additionally, individuals involved in prank
                                reports may be held accountable for the costs incurred by emergency services or other
                                entities as a result of their actions.</span>
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
    <script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>
    <script src="{{ asset('storage/popper.js') }}"></script>
</body>

</html>