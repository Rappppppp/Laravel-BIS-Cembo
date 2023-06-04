<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>About us</title>
    <link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    @if(auth()->user()->role == 'Content Manager' || 'Admin')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    @endif
    <link href="{{ asset('storage/css/Aboutus.css') }}" rel="stylesheet">
    <style>
        .btn-content {
            float: right;
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
@auth
<body>
    <div class="wrapper"> <!-- Fixes Footer to Bottom -->
        <!-- Nav -->
        <header>
            <div class="container-fluid" id="nav">
                @include('user.parts.dropdown_logo')
                <nav class="navbar navbar-expand-md">
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/complaints">Report</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/documents">Request</a>
                            </li>
                            @endauth
                            <li class="nav-item">
                                <a class="nav-link" href="/services">Services</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="/aboutus" id="nav-active-link">About Us</a>
                            </li>
                        </ul>
                        @include('user.parts.dropdown_auth')
                    </div>
                </nav>
            </div>
        </header>
        <!-- Content -->
        <main>
            <div id="content">
                <div class="parallax-bg-img" style="background-image: url('{{ asset('storage/res/img/bg/BG.png') }}'); min-height: 100vh;">
                    <div class="container-fluid" id="intro-container">
                        <span id="intro">About Us</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content">Introduction</span>
                            @if(auth()->user()->role == 'Content Manager' || 'Admin')
                            <button class="btn btn-warning introduction-edit btn-content" data-id="{{ $introduction->id }}">Edit</button>
                            @endif
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid introduction-container" id="description-container-b">
                            {!! $introduction->html_content !!}
                        </div>
                    </div>
                    @if(auth()->user()->role == 'Content Manager' || 'Admin')
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content">History</span>
                            <button class="btn btn-warning history-edit-1 btn-content" data-id="{{ $history->id }}">Edit</button>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid history-container-1" id="description-container-b">
                            {!! $history->html_content !!}
                        </div>
                    </div>
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content"> cont. (History) </span>
                            <button class="btn btn-warning history-edit-2 btn-content" data-id="{{ $history_cont->id }}">Edit</button>
                        </div>
                        <div class="container-fluid">
                            <br>
                        </div>
                        <div class="container-fluid history-container-2" id="description-container-b">
                            {!! $history_cont->html_content !!}
                        </div>
                    </div>
                    @else
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content">History</span>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid history-container-1" id="description-container-b">
                            {!! $history->html_content !!}
                        </div>
                        <div class="container-fluid history-container-2" id="description-container-b">
                            {!! $history_cont->html_content !!}
                        </div>
                    </div>
                    @endif
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-c">
                        <span id="intro" class="disp-content">Our Values</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content">Mission</span>
                            @if(auth()->user()->role == 'Content Manager' || 'Admin')
                            <button class="btn btn-warning mission-edit btn-content" data-id="{{ $mission->id }}">Edit</button>
                            @endif
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid mission-container" id="description-container-b">
                            {!! $mission->html_content !!}
                        </div>
                    </div>
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title" class="disp-content">Vision</span>
                            @if(auth()->user()->role == 'Content Manager' || 'Admin')
                            <button class="btn btn-warning vision-edit btn-content" data-id="{{ $vision->id }}">Edit</button>
                            @endif
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <div class="container-fluid vision-container" id="description-container-b">
                            {!! $vision->html_content !!}
                        </div>
                    </div>
                    <hr id="spacer">
                    @if (session('official_success'))
                        <div id="success-message" class="alert alert-success">
                            {{ session('official_success') }}
                        </div>
                    @endif
                    <div class="container-fluid" id="content-container-c">
                        <span id="intro">Meet the Crew</span>
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid input-group" style="background-color: #04091D80;">
                        @if(auth()->user()->role == 'Content Manager' || 'Admin')
                            <input type="file" class="form-control image" style="margin: 1rem;" name="official_photo" accept=".png, .jpg, .jpeg">
                        @endif
                    </div>
                    <div class="container-fluid" id="content-container-a">
                        <div class="row" style="justify-content: space-evenly;">
                            <div class="col-lg-4 col-sm-6" id="portrait-container">
                                <hr>
                                <span id="title">Barangay Officials</span>
                                <hr>
                                <div class="container-fluid" id="polaroid">
                                    <img id="image" src="{{ $punong_barangay->photo ?? asset('storage/images/blank_profile_pic.webp') }}" >
                                  
                                    <div class="container-fluid" id="name-container">
                                        {{ $punong_barangay->name ?? '' }}
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        {{ $punong_barangay->position ?? '' }}
                                    </div>
                                    @if(auth()->user()->role == 'Content Manager' || 'Admin')
                                    <form action="{{ route('user.officials.remove', ['id' => $punong_barangay->id ]) }}" method="POST" onsubmit="return confirm('Do you want to remove this Barangay official?');" class="d-inline-block mb-2">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="container-fluid button btn btn-danger" value="Remove">
                                    </form>
                                    @endif
                                </div>
                                <hr>
                                <span id="title">Barangay Kagawad</span>
                                <hr>

                                @for ($i = 0; $i < count($barangay_kagawad); $i += 2)
                                <div class="row">
                                    @for ($j = $i; $j < min($i + 2, count($barangay_kagawad)); $j++)
                                        <div class="col-lg-6 col-sm-6" id="portrait-container">
                                            <div class="container-fluid" id="polaroid">
                                                <div style="background-image: url('{{ $barangay_kagawad[$j]['photo'] ?? asset('storage/images/blank_profile_pic.webp') }}');'" id="image-2">
                                                </div>
                                                <div class="container-fluid" id="name-container">
                                                    {{ $barangay_kagawad[$j]['name'] ?? 'Official' }}
                                                </div>
                                                <div class="container-fluid" id="description-container-c">
                                                    {{ $barangay_kagawad[$j]['position'] ?? 'Position' }}
                                                </div>
                                                @if(auth()->user()->role == 'Content Manager' || 'Admin')
                                                <form action="{{ route('user.officials.remove', ['id' => $barangay_kagawad[$j]['id'] ]) }}" method="POST" onsubmit="return confirm('Do you want to remove this Barangay official?');" class="d-inline-block mb-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="container-fluid button btn btn-danger" value="Remove">
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                @endfor
                            </div>
                            <div class="col-lg-4 col-sm-6" id="portrait-container">
                                <hr>
                                <span id="title">SK Officials</span>
                                <hr>
                                <div class="container-fluid" id="polaroid">
                                <img id="image" src="{{ $sk_chairperson->photo ?? asset('storage/images/blank_profile_pic.webp') }}" >
                                    <div class="container-fluid" id="name-container">
                                        {{ $sk_chairperson->name ?? '' }}
                                    </div>
                                    <div class="container-fluid" id="description-container-c">
                                        {{ $sk_chairperson->position ?? '' }}
                                    </div>
                                    @if(auth()->user()->role == 'Content Manager' || 'Admin')
                                    <form action="{{ route('user.officials.remove', ['id' => $sk_chairperson->id ]) }}" method="POST" onsubmit="return confirm('Do you want to remove this Barangay official?');" class="d-inline-block mb-2">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="container-fluid button btn btn-danger" value="Remove">
                                    </form>
                                    @endif
                                </div>
                                <hr>
                                <span id="title">SK Kagawad</span>
                                <hr>
    
                                @for ($i = 0; $i < count($sk_kagawad); $i += 2)
                                <div class="row">
                                    @for ($j = $i; $j < min($i + 2, count($sk_kagawad)); $j++)
                                        <div class="col-lg-6 col-sm-6" id="portrait-container">
                                            <div class="container-fluid" id="polaroid">
                                                <div style="background-image: url('{{ $sk_kagawad[$j]['photo'] ?? asset('storage/images/blank_profile_pic.webp') }}');" id="image-2">
                                                </div>
                                                <div class="container-fluid" id="name-container">
                                                    {{ $sk_kagawad[$j]['name'] ?? 'Official' }}
                                                </div>
                                                <div class="container-fluid" id="description-container-c">
                                                    {{ $sk_kagawad[$j]['position'] ?? 'Position' }}
                                                </div>
                                                @if(auth()->user()->role == 'Content Manager' || 'Admin')
                                                <form action="{{ route('user.officials.remove', ['id' => $sk_kagawad[$j]['id'] ]) }}" method="POST" onsubmit="return confirm('Do you want to remove this Barangay official?');" class="d-inline-block mb-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="container-fluid button btn btn-danger" value="Remove">
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        @include('user.parts.footer')
    </div>

  
    <div class="modal fade" id="crop-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                <form action="{{ route('user.officials.add') }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Add a Barangay Official?');">
                        @csrf
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <img id="crop_image" src="https://avatars0.githubusercontent.com/u/3456749">
                                </div>
                                <div class="col-md-4">
                                    <div class="preview"></div>
                                    <select name="official_name" class="ml-2 mt-2 form-control">
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

                                    <select name="official_title" class="ml-2 mt-2 form-control">
                                        @php
                                            $existing_officials_position = $addedOfficials->pluck('position')->toArray();
                                        @endphp    
                                        <option value='Punong Barangay' @if(in_array('Punong Barangay', $existing_officials_position)) disabled @endif>Punong Barangay</option>
                                        <option value='Barangay Kagawad'>Barangay Kagawad</option>
                                        <option value='SK Chairperson' @if(in_array('SK Chairperson', $existing_officials_position)) disabled @endif>SK Chairperson</option>
                                        <option value='SK Kagawad'>SK Kagawad</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>

                        <input type="hidden" id="official_photo" name="official_photo"/>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="crop">Crop</button>
                        <button type="submit" class="btn btn-primary" id="submit" disabled>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--* AJAX-->
    <script src="{{ asset('storage/javascripts/jquery.js') }}"></script>
    @if(auth()->user()->role == 'Content Manager' || 'Admin')
    <script src="{{ asset('storage/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('storage/ckeditor/aboutus.config.js') }}"></script>
    <!-- <script>
        $(document).ready(function() {
        $('.introduction-edit-btn').click(function() {
            // Create Bootstrap modal
            var modal = $(
            '<div class="modal fade" tabindex="-1" role="dialog">' +
                '<div class="modal-dialog" role="document">' +
                    '<div class="modal-content">' +
                        '<div class="modal-header">' +
                            '<h5 class="modal-title">Content Edited</h5>' +
                            '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
                            '</div>' +
                            '<div class="modal-body">' +
                            '<p>Content edited successfully!</p>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>');

            // Append modal to the body
            $('body').append(modal);

            // Show the modal
            modal.modal('show');

            // Remove the modal from the DOM when it is hidden
            modal.on('hidden.bs.modal', function() {
            modal.remove();
            });
        });
        });
    </script> -->
    <script>
        var $modal = $('#crop-modal');
        var image = document.getElementById('crop_image');
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
                    $('#submit').attr("disabled", false);
                }
            });
        })
    </script>
    <script>
        setTimeout(function() {
            document.getElementById("success-message").style.display = "none";
        }, 3000); // 3 seconds delay
    </script>
    @endif
</body>
@endauth
</html>