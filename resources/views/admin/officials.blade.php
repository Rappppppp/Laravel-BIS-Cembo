<!doctype html>
<html>
    <head>
    @include('admin.components.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
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

            img {
                display: block;
                max-width: 100%;
            }
            .preview {
                overflow: hidden;
                width: 160px; 
                height: 160px;
                margin: 10px;
                border: 1px solid red;
            }
            .modal-lg{
                max-width: 1000px !important;
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
                    <div class="parallax-bg-img" style="background-image: url('{{ asset('storage/images/Rectangle 109.png') }}'); padding-bottom: 5%; height: 100vh;">
                        <div class="container-fluid pb-0" id="officials">
                            <div class="text-white">
                                <!-- START: This form should be hidden -->
                                <form action="{{ route('admin.officials.add') }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Add a Barangay Official?');">
                                    @csrf
                                    <!-- <select name="official_name">
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
                                </select> -->

                                    <br>
                                    <input type="file" name="official_photo" class="image" accept=".png, .jpg, .jpeg">
                                    <br>
                                    <!-- <button class="button btn-warning btn add" type='submit'>Add</button> -->
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
                                                src="{{ $official->photo ?? asset('storage/images/blank_profile_pic.webp') }}" >
                                                
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
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add Barangay Official
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('admin.officials.add') }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Add a Barangay Official?');">
                        @csrf

                        <input type="hidden" id="official_photo" name="official_photo"/>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="crop">Crop</button>
                        <button type="submit" class="btn btn-primary" id="crop">Submit</button>
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
<script>
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;
    $("body").on("change", ".image", function (e) {
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });
    $("#crop").click(function () {
        canvas = cropper.getCroppedCanvas({
            width: 500,
            height: 500,
        });
        canvas.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                base64data = reader.result;

                $('#official_photo').val(base64data);
            }
        });
    })
</script>