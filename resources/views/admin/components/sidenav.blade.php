<div id="nav">
    <div id="sidebar">
        <div class="container-fluid" id="sidebar-content-container">
            <!-- images/Makati_City.png -->
            <img src="{{ asset('storage/res/img/logo/cembo-logo.png') }}" class="img-fluid rounded-circle mt-2" id="logo">
        <div class="dropdown-divider"></div>
        <nav>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/"><i
                            class="fa fa-solid fa-lg fa-home pr-2 sb-icon" id="q-icon"></i><span
                            class="sb-label">Home</span><i class="fa fa-solid fa-chevron-right pl-4 sb-arrow"
                            id="q-icon"></i></a>
                </li>
                @if(auth()->user()->role === 'Admin' || auth()->user()->role === 'Barangay Official')
                    <li class="nav-item">
                        <a class="nav-link" href="/admin"><i
                                class="fa fa-solid fa-lg fa-table pr-2 sb-icon" id="q-icon"></i><span
                                class="sb-label">Tables</span><i class="fa fa-solid fa-chevron-right pl-4 sb-arrow"
                                id="q-icon"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/charts"><i
                                class="fa fa-solid fa-lg fa-pie-chart pr-2 sb-icon" id="q-icon"></i><span
                                class="sb-label">Charts</span><i
                                class="fa fa-solid fa-chevron-right pl-4 sb-arrow" id="q-icon"></i></a>
                    </li>

                    <div class="dropdown-divider"></div>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/document-requests"><i
                                class="fa fa-solid fa-lg fa fa-file-text pr-2 sb-icon" id="q-icon"></i><span
                                class="sb-label">Document Requests</span><i
                                class="fa fa-solid fa-chevron-right pl-4 sb-arrow" id="q-icon"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/complaint-requests"><i
                                class="fa fa-solid fa-lg fa-book pr-2 sb-icon" id="q-icon"></i><span
                                class="sb-label">Complaint Requests</span><i
                                class="fa fa-solid fa-chevron-right pl-4 sb-arrow" id="q-icon"></i></a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/posts"><i
                                class="fa fa-solid fa-lg fa-bullhorn pr-2 sb-icon" id="q-icon"></i><span
                                class="sb-label">Events and Announcements</span><i
                                class="fa fa-solid fa-chevron-right pl-4 sb-arrow" id="q-icon"></i></a>
                    </li>
                @endif
                <div class="dropdown-divider d-none d-lg-block"></div>
                <li class="nav-item align-self-center">
                    <i class="fa fa-solid fa-4x fa-circle-chevron-left d-none d-lg-block mt-5"
                        onclick="toggle_sidebar()" id="q-icon-toggler"></i>
                </li>
            </ul>
        </nav>
    </div>
</div>