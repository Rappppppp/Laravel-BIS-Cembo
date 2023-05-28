<!doctype html>
<html>
    <head>
    @include('admin.components.head')

        <style>
            #namespace {
                background-color: var(--tertiary-color);
                border-bottom-left-radius: 4px;
                border-bottom-right-radius: 4px;
            }

            #portrait-holder {
                height: 100%;
                align-self: center;
                text-align: center;
                align-content: center;
                font-family: var(--primary-font);
                border-width: 10px;
                border-bottom: 0px;
                border-color: var(--quarternary-color);
                box-shadow: 8px -6px 26px 3px rgb(0 0 0 / 45%);
            }

            .container-fluid {
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
                padding-top: 2rem;
            }

            button #add_data {
                margin: 1rem;
                margin-left: -1px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
        @include('admin.components.sidenav')
        @include('admin.components.nav')
            <main>
                <div id="content">
                    @if (session('success'))
                        <div id="success-message" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div id="error-message" class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="parallax-bg-img" style="background-image: url('{{ asset('storage/images/Rectangle 109.png') }}'); padding-bottom: 5%;">
                        <div class="container-fluid pb-0" id="officials">
                            <div class="text-white">
                                <!-- START: This form should be hidden -->
                                <form action="{{ route('admin.officials.add') }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Add a Barangay Official?');">
                                    @csrf
                                    <select name="official_name">
                                    @php
                                        $existing_officials_name = $addedOfficials->pluck('name')->toArray();
                                    @endphp    
                                    
                                    @foreach($officials as $official)
                                        <option value="{{ $official['name'] }}" 
                                        @if(in_array($official['name'], $existing_officials_name)) 
                                            disabled 
                                        @endif>{{ $official['name'] }}</option>
                                    @endforeach

                                </select>

                                <select name="official_title">
                                    @php
                                        $existing_officials_position = $addedOfficials->pluck('position')->toArray();
                                    @endphp    
                                    <option value='Punong Barangay' @if(in_array('Punong Barangay', $existing_officials_position)) disabled @endif>Punong Barangay</option>
                                    <option value='Barangay Kagawad'>Barangay Kagawad</option>
                                    <option value='SK Chairperson' @if(in_array('SK Chairperson', $existing_officials_position)) disabled @endif>SK Chairperson</option>
                                    <option value='SK Kagawad'>SK Kagawad</option>
                                </select>

                                    <br>
                                    <input type="file" name="official_photo" accept=".png, .jpg, .jpeg">
                                    <br>
                                    <button class="button btn-warning btn add" type='submit'>Add</button>
                                </form>
                                <!-- END: This form should be hidden -->
                            </div>
                            <div class="container-fluid" id="header-container">
                            </div>
                            <div class="container-fluid" id="content-container" style="border-radius: 0;">
                                <div class="row">
                                    <!--*BRGY OFFICIALS START-->
                                    @foreach($addedOfficials as $official)
                                    <div class="col-lg-4 col-md-4 col-sm-12 mt-5">
                                        <div class="card" id="portrait-holder">
                                            <img class="card-img-top"
                                                style="background-color: var(--secondary-color);"
                                                src="{{ asset(str_replace('public/', '', 'storage/' . $official->photo)) }}"
                                                onerror="javascript:this.src='{{ asset('storage/images/blank_profile_pic.webp') }}'" 
                                                >
                                            <div class="card-body pt-0">
                                                <div class="container" id="namespace">
                                                    <h4>
                                                    {{ $official->position }}
                                                    </h4>
                                                </div>
                                                <h3>  {{ $official->name }}</h3>
                                            </div>
                                            <div class="mb-2">
                                                <form action="{{ route('admin.officials.remove', ['id' => $official->id]) }}" method="POST" onsubmit="return confirm('Do you want to remove this Barangay official?');" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="button btn btn-danger" value="Remove">
                                                </form> 

                                                <button class="button btn btn-warning d-inline-block">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--*BRGY OFFICIALS END-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>

    <div class="modal" tabindex="-1" id="action_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="form_post" enctype="multipart/form-data" autocomplete="off">
                    <div class="modal-header" id="dynamic_modal_title">
                        <h5 class="modal-title">Edit Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Position</label>
                            <select name="position_post" id="position_post" class="form-control" required>
                                <option value="Barangay Captain" id="position-brgycaptain">Barangay Captain</option>
                                <option value="Barangay Kagawad">Barangay Kagawad</option>
                                <option value="Barangay Chairman">Barangay Chairman</option>
                                <option value="SK Chairman">SK Chairman</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label nameClass">Name</label>
                            <select type="text" name="name_post" id="name_post" class="form-control nameClass" required>
                            </select>
                        </div>

                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="" id="sample_image" />
                                </div>
                                <div class="col-md-4">
                                    <div class="preview"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="file" name="official_profilepic" id="image_post" accept="image/*">
                        </div>

                        <div class="modal-footer mt-2">
                            <input type="hidden" name="id" id="id" />
                            <input type="hidden" name="action" id="action" value="Add" />
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                id="close_button">Close</button>
                            <button type="submit" class="btn btn-primary" id="action_button">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--* AJAX-->
    <script src="{{ asset('storage/javascripts/jquery.js') }}"></script>
    <!--* BOOTSTRAP JS-->
    <script src="{{ asset('storage/javascripts/admin_homepage.js') }}"></script>
    <script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>
