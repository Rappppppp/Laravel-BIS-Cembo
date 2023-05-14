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
            <script>
                // Hide success message after 5 seconds
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 5000);
            </script>
            <main>
                <div id="content">
                    <div class="parallax-bg-img" style="background-image: url('res/Rectangle\ 68.png');">
                        <div class="card">
                        @if (session('success'))
                            <div id="success-message" class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
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
                                                <th>Respondent Name</th>
                                                <th>Complaint</th>
                                                <th>Full Documentation</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($requests as $request)
                                            <tr>
                                                <td><a href="{{ route('admin.show', $request->user->id) }}">{{ $request->name_of_respondent }}</a></td>
                                                <td>{{ $request->nature_of_complaint }}</td>
                                                <td>{{ route('admin.documentShow', ['id' => $request->id]) }}</td>
                                                <td>{{ $request->status }}</td>
                                                <td style="display: flex;justify-content: space-evenly;align-items: stretch;">
                                                    <form action="{{ route('complaintApproved.send', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="under investigation">
                                                        <input type="submit" class="btn btn-success btn-sm float-end" value="Investigate" 
                                                        @if ($request->status == 'pending')
                                                            enabled
                                                        @else
                                                            disabled
                                                        @endif>
                                                    </form>
                                                    <form action="{{ route('complaintDenied.send', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="denied">
                                                        <input type="submit" class="btn btn-warning btn-sm float-end" value="Reject" 
                                                        @if ($request->status == 'pending')
                                                            enabled
                                                        @else
                                                            disabled
                                                        @endif>
                                                    </form> 
                                                    <form action="{{ route('complaints.delete', [$request->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger btn-sm float-end" value="Delete" 
                                                    @if ($request->status == 'resolved' || 'denied')
                                                        enabled
                                                    @else
                                                        disabled
                                                    @endif>
                                                </form>
                                                </td>
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