<!doctype html> 
<head>
    @include('admin.components.head')
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
                    <div class="parallax-bg-img">
                        <div class="card">
                                <div class="col col-sm-12">
                                    <div class="jumbotron bg-white vertical-center">
                                        <div class="row row-header">
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
                                        </div>
                                    </div>
                                </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="dataTable">
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
                                    @if ($users->count() > 0)
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
                                                    <!-- <form action="" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        <input type="hidden" name="_method" value="">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-warning btn-sm float-end" value="Edit">
                                                    </form>  -->
                                                    <input type="submit" class="btn btn-warning btn-sm float-end"  data-toggle="modal" data-target="#demoModal" value="Edit">
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        @else
                                        <tr>
                                            <td colspan="4">No data found.</td>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Footer -->
        </div>

<!-- Modal Example Start-->
<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria- 
    labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria- 
                        label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body form-group">
                        <input class="form-control mb-2" type="text" name="first_name" placeholder="First Name" >
                        <input class="form-control mb-2" type="text" name="middle_name" placeholder="Middle Name" >
                        <input class="form-control mb-2" type="text" name="last_name" placeholder="Last Name" >
                        <input class="form-control mb-2" type="text" name="email" placeholder="Email Address" >
                        <div class="col-6" style="padding-right: 8px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data- 
                    dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-primary">Save 
                        changes</button>
                </div>
            </div>
        </div>
    </div>
<!-- Modal Example End-->

    </body>
</html>

<script src="{{ asset('storage/javascripts/admin_homepage.js') }}"></script>
<!--* BOOTSTRAP JS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>
<script src="{{ asset('storage/popper.js') }}"></script>
<script src="{{ asset('storage/javascripts/jquery.js') }}"></script>
<!--* DATA TABLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('storage/css/dataTables.css') }}">
<script type="text/javascript" charset="utf8" src="{{ asset('storage/javascripts/dataTables.js') }}"></script>

<script>
    $(document).ready(function() {
    $('#dataTable').DataTable({
        "columnDefs": [
      {
        "targets": 5, // index of the action column
        "orderable": false // disable sorting for this column
      }
    ]
    });
} );

</script>