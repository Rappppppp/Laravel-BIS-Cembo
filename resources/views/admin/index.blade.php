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
                @if (session('success'))
                    <div id="success-message" class="alert alert-success message">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('info'))
                    <div id="info-message" class="alert alert-info message">
                        {{ session('info') }}
                    </div>
                @endif
                   
              
                    <div class="parallax-bg-img">
                        <div class="card">                    
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
                                                @if(auth()->user()->role === 'Barangay Official')
                                                    <!-- The authenticated user is a BarangayOfficial -->
                                                    <td style="display: none;"></td>
                                                @else
                                                <th class="text-center">Action</th>
                                                @endif
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
                                                @if(auth()->user()->role === 'Barangay Official')
                                                    <!-- The authenticated user is a BarangayOfficial -->
                                                    <td style="display: none;"></td>
                                                @else
                                                    <!-- The authenticated user is not a BarangayOfficial -->
                                                    <td style="display: flex; justify-content: space-evenly; align-items: stretch;">
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
                                                        <input type="submit" class="btn btn-warning btn-sm float-end btn-edit" data-user-id="{{ $user->id }}" data-toggle="modal" data-target="#editModalLabel" value="Edit">
                                                    </td>
                                                @endif

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
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                    </div>
                    <div class="modal-body form-group">
                        <form method="POST" action="{{ route('admin.user_update', 'userID' ) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-2">
                                First name
                                <input class="form-control" type="text" name="f_name" />
                            </div>
                            <div class="mb-2">
                                Middle name
                                <input class="form-control" type="text" name="m_name" />
                            </div>
                            <div class="mb-2">
                                Last name
                                <input class="form-control" type="text" name="l_name" />
                            </div>
                            <div class="mb-2">
                                Civil Status
                                <select class="form-control" name="civil_status">
                                    <option disabled selected>Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Live-in">Live-in</option>
                                    <option value="Separated">Separated</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                Religion
                                <select class="form-control" name="religion">
                                    <option disabled selected>Select</option>
                                    <option value="Roman Catholic">Roman Catholic</option>
                                    <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Born Again">Born Again</option>
                                    <option value="Seventh Day Adventist">Seventh Day Adventist</option>
                                    <option value="Saksi ni Jehovah">Saksi ni Jehovah</option>
                                    <option value="Mormons">Mormons</option>
                                    <option value="Buddhist">Buddhist</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                Educational Attainment
                                <select class="form-control" name="educational_attainment">
                                    <option disabled selected>Select</option>
                                    <option>Elementary</option>
                                    <option>High School</option>
                                    <option>College</option>
                                    <option>Master's / Doctorate Degree</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                Role
                                <select class="form-control" name="role">
                                    <option value="Resident">Resident</option>
                                    <option value="Barangay Official">Barangay Official</option>
                                    <option value="Content Manager">Content Manager</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="close_modal" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Example End-->

    </body>
</html>

<script src="{{ asset('storage/javascripts/admin_homepage.js') }}"></script>
<!--* JQUERY - BOOTSTRAP JS-->
<script src="{{ asset('storage/javascripts/jquery.js') }}"></script>
<script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>
<script src="{{ asset('storage/popper.js') }}"></script>
<!--* DATA TABLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('storage/css/dataTables.css') }}">
<script type="text/javascript" charset="utf8" src="{{ asset('storage/javascripts/dataTables.js') }}"></script>

<script>
    // Wait for 3 seconds and then hide the success message
    setTimeout(function() {
        $('.message').fadeOut('slow');
    }, 3000);
</script>

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

<!-- AJAX -->
<script>
    $(document).ready(function() {
        $('.btn-edit').click(function() {
            var userId = $(this).data('user-id');
            fetchUserDetails(userId);
        });

        $('#editModal').on('hidden.bs.modal', function() {
            $(this).find(':input').attr('tabindex', '-1');
        });

        function fetchUserDetails(userId) {
            $.ajax({
                url: '/admin/get/' + userId,
                method: 'GET',
                success: function(response) {
                    // Update the modal content with the fetched details
                    $('#editModal input[name="f_name"]').val(response.information.first_name);
                    $('#editModal input[name="m_name"]').val(response.information.middle_name);
                    $('#editModal input[name="l_name"]').val(response.information.last_name);
                    $('#editModal select[name="civil_status"]').val(response.information.civil_status);
                    $('#editModal select[name="religion"]').val(response.information.religion);
                    $('#editModal select[name="educational_attainment"]').val(response.information.educational_attainment);
                    $('#editModal input[name="email"]').val(response.user.email);
                    $('#editModal select[name="role"]').val(response.user.role);
                    $('.modal-backdrop').remove();
                    $('#editModal').modal('show');

                    actionRoute = "{{ route('admin.user_update', 'userID') }}".replace('userID', response.user.id);
                    $('#editModal form').attr('action', actionRoute);
                },
                error: function(xhr, status, error) {
                    // Handle error if necessary
                }
            });
        }
});
</script>
