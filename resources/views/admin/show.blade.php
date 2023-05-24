<!doctype html> 
<head>
    @include('admin.components.head')
</head>
<body>
    <div class="wrapper">    
        <header>
            @include('admin.components.sidenav')
            @include('admin.components.nav')
        </header>
            <!-- Content -->
            <script>
                // Hide success message after 5 seconds
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 5000);
            </script>
            <main>
                <div id="content">
                    @if (session('success'))
                        <div id="success-message" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="parallax-bg-img" style="background-image: url('res/Rectangle\ 68.png');">
                        <div class="card">
                            <div class="card-header" id="message">
                            <div class="block mb-8">
                                <a class="text-dark btn btn-warning" href="{{ url()->previous() }}">Back to list</a>
                            </div>
                                <div class="row">
                                    <div class="col col-sm-12">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="user_data">
                                        <h3>Personal Information</h3>
                                        <thead>
                                            <tr>
                                                <th>ID : Barangay ID</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Age</th>
                                                <th>Birthday</th>
                                                <th>Birthplace</th>
                                                <th>Nationality</th>
                                                <th>Religion</th>
                                                <th>Civil Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>{{ $user->id }} : {{ $user->barangay_id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td> {{ $information->gender }}</td>
                                                @php
                                                    $birthdate = new DateTime($information->date_of_birth);
                                                    $today = new DateTime();
                                                    $age = $today->diff($birthdate)->y;
                                                @endphp
                                                <td>{{ $age }}</td>
                                                <td>{{ $information->date_of_birth }}</td>
                                                <td>{{ $information->place_of_birth }}</td>
                                                <td>{{ $information->nationality }}</td>
                                                <td>{{ $information->religion }}</td>
                                                <td>{{ $information->civil_status }}</td>
                                            </tr>
                               
                                        </tbody>
                                    </table>

                                    <table class="table table-striped table-bordered" id="user_data">
                                        <h3>Contact Information</h3>
                                        <thead>
                                            <tr>
                                                <th>Contact Number</th>         
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Provincial Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>{{ $contact->contact_number }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $contact->house_number }} {{ $contact->street_name }} {{ $contact->barangay_name }} {{ $contact->city_name }}</td>
                                                <td>{{ $contact->prov_house_number }} {{ $contact->prov_street_name }} {{ $contact->prov_barangay_name }} {{ $contact->prov_city_name }} {{ $contact->prov_name }}</td>
                                            </tr>
                               
                                        </tbody>
                                    </table>

                                    <table class="table table-striped table-bordered" id="user_data">
                                        <h3>Makatizen Information</h3>
                                        <thead>
                                            <tr>
                                                <th>Registered Voter?</th>
                                                <th>Head of Household?</th>
                                                <th>Social Sector</th>
                                                <th>Vaccine Status</th>
                                                <th>No. Years in Makati</th>
                                                <th>No. Years in Barangay Cembo</th>
                                                <th>No. Years in Current Address</th>
                                                <th>Relationship to the Head of Family</th>
                                                <th>Cards Owned</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>{{ $makatizen->registered_voter ? 'Yes' : 'No' }}</td>
                                                <td>{{ $makatizen->head_of_household ? 'Yes' : 'No' }}</td>

                                                <td>{{ $makatizen->social_sector }}</td>
                                                <td>{{ $makatizen->vaccine_status }}</td>
                                                <td>{{ $makatizen->years_makati }}</td>
                                                <td>{{ $makatizen->years_barangay_cembo }}</td>
                                                <td>{{ $makatizen->years_current_address }}</td>
                                                <td>{{ $makatizen->relationship_head_family }}</td>
                                                @if($makatizen->yellow_card || $makatizen->blue_card || $makatizen->white_card || $makatizen->makatizen_card || $makatizen->philhealth_card)
                                                <td>{{ implode(', ', array_filter([card_name($makatizen->yellow_card, 'Yellow Card'), card_name($makatizen->blue_card, 'Blue Card'), card_name($makatizen->white_card, 'White Card'), card_name($makatizen->makatizen_card, 'Makatizen Card'), card_name($makatizen->philhealth_card, 'PhilHealth Card')] )) }}</td>
                                                @endif

                                                @php
                                                function card_name($value, $name) {
                                                switch ($value) {
                                                    case 1:
                                                    return $name;
                                                    default:
                                                    return null;
                                                }
                                                }
                                                @endphp
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Footer -->
        </div>
    </body>
</html>

<!-- Optional JavaScript -->
<script src="{{ asset('storage/javascripts/admin_homepage.js') }}"></script>

<!--* BOOTSTRAP JS-->
<script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>


   

