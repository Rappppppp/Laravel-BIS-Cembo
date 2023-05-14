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
                                <a href="{{ route('admin.documentRequests') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to list</a>
                            </div>
                                <div class="row">
                                    <div class="col col-sm-12">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="user_data">
                                        <thead>
                                            <tr>
                                                <th>Requested by: </th>
                                                <th>Contact Person</th>
                                                <th>Relationship</th>
                                                <th>Contact Number</th>
                                                <th>Address</th>
                                                <th>Uploaded Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>{{ $request->name }}</td>
                                                <td>{{ $request->inputs['contact_person'] }}</td>
                                                <td>{{ $request->inputs['relationship'] }}</td>
                                                <td>{{ $request->inputs['contact_number'] }}</td>
                                                <td>{{ $request->inputs['stnum'] }} {{ $request->inputs['stadd'] }} {{ $request->inputs['city'] }}, {{ $request->inputs['province'] }}</td>
                                                <td><img src="{{ asset(str_replace('public/', '', 'storage/' . $request->document_path)) }}" alt="Uploaded Image" style="width: 50rem;"></td>
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


   
