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
            <main>
                <div id="content">
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
                                                <th>Barangay ID</th>
                                                <th>Role</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('admin.show', $user->id) }}">{{ $user->barangay_id }}</a>
                                                </td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-center">Active</td>
                                                <td style="display: flex;justify-content: space-evenly;align-items: stretch;">
                                                    <form action="{{ route('admin.delete', ['id' => $user->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-danger btn-sm float-end" value="Delete">
                                                    </form>
                                                    <form action="" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        <input type="hidden" name="_method" value="">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-warning btn-sm float-end" value="Edit">
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

<!--* BOOTSTRAP JS-->
<script src="{{ asset('storage/javascripts/admin_homepage.js') }}"></script>
<script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>

<!--* DATA TABLES -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>