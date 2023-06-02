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
                        <form class="d-inline-block" action="{{ route('documents.delete', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <a class="text-dark btn" href="{{ url()->previous() }}">Back to list</a>
                            <input type="submit" class="btn btn-danger ml-2" value="Delete">
                        </form>  
                        <form class="d-inline-block" action="{{ route('requestApproved.send', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to approve this request?');">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="approved">
                            <input type="submit" class="btn btn-success ml-2" value="Approve">
                        </form>
                        <form class="d-inline-block" action="{{ route('requestDenied.send', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to reject this request?');">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="denied">
                            <input type="submit" class="btn btn-warning ml-2" value="Reject">
                        </form>
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
                                                <th>Requestor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $request->name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-striped table-bordered" id="user_data">
                                        <h3>Emergency Contact Details</h3>
                                        <thead>
                                            <tr>
                                                <th>Mother's Name</th>
                                                <th>Father's Name</th>
                                                <th>Contact Person</th>
                                                <th>Relationship</th>
                                                <th>Contact Number</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>{{ $request->inputs['mother_name'] }} : {{ $request->inputs['mother_contact'] }}</td>
                                                <td>{{ $request->inputs['father_name'] }} : {{ $request->inputs['father_contact'] }}</td>
                                                <td>{{ $request->inputs['contact_person'] }}</td>
                                                <td>{{ $request->inputs['relationship'] }}</td>
                                                <td>{{ $request->inputs['contact_number'] }}</td>
                                                <td>{{ $request->inputs['cp_housenum'] }} {{ $request->inputs['cp_street'] }} {{ $request->inputs['cp_brgy'] }}, {{ $request->inputs['cp_city'] }}</td>
                                            </tr>
                               
                                        </tbody>
                                    </table>

                                    <table class="table table-striped table-bordered" id="user_data">
                                        <thead><h3>Uploaded Image</h3></thead>
                                        <tbody>

                                            <td>
                                                <a href="{{ asset(str_replace('public/', '', 'storage/' . $request->document_path)) }}" target="_blank">
                                                    <img src="{{ asset(str_replace('public/', '', 'storage/' . $request->document_path)) }}" alt="Uploaded Image" style="width: 100%;">
                                                </a>
                                            </td>
                            
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


   
