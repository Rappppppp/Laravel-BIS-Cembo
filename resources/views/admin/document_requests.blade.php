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
                                                <th>Document Requested</th>
                                                <th>Barangay ID</th>
                                                <th>Link</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($requests as $request)
                                            <tr>
                                                <td>{{ $request->document_type }}</td>
                                                <td><a href="{{ route('admin.show', $request->user->id) }}">{{ $request->barangay_id }}</a></td>
                                                <td> 
                                                    <a href="{{ route('admin.documentShow', [
                                                            'document_type' => str_replace(' ', '-', $request->document_type),
                                                            'document_id' => $request->id, 
                                                            'barangay_id' => $request->user->barangay_id
                                                        ]) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2" >View Details</a>
                                                </td>
                                                <td>{{ $request->status }}</td>
                                            </tr>
                                        @endforeach
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

<!--* DATA TABLES -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>