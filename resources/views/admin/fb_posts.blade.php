<!doctype html>
    @include('admin.components.head')
    <link rel="stylesheet" href="{{ asset('storage/stylesheets/admin_posts.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
    .highlight {
        background-color: yellow;
    }

    #full_picture {
        cursor: pointer;
    }
    </style>

    <body>
        <div class="wrapper">
            <!-- Fixes Footer to Bottom -->
            <!-- Nav -->
            @include('admin.components.sidenav')
            @include('admin.components.nav')
                <!-- Content -->
                <main>
                    <div id="content">
                        @if (session('success'))
                            <div id="success-message" class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="parallax-bg-img" style="background-image: url('res/Rectangle\ 68.png');">
                            <h1 class="mt-4 text-center txt-primary pt-2 pb-2"><b>Posts via Facebook</b></h1>
                            <div class="container">

                            @foreach($posts as $post)
                            @if(!empty($post['message']))
                                    <div class="card-group vgr-cards mb-5">
                                        <div class="card">
                                            <div class="card-img-body">
                                                <img class="card-img" style="width: 20rem;"
                                                    src="{{ $post['full_picture'] }}" alt="Card image cap">
                                            </div>
                                            <div class="card-body">
                                                <sub id="date">
                                                {{ $post['created_time']->format('Y-m-d H:i:s') }}
                                                </sub>
                                                
                                                <p class="card-text" id="body" name="body">
                                                {{ isset($post['message']) ? $post['message'] : ''  }}
                                                </p>
                                                <div>
                                                @php
                                                    // Check if the post with this facebook_id exists in the database
                                                    $existsInDatabase = \App\Models\FacebookPostsModel::where('facebook_id', $post['id'])->exists();
                                                @endphp
                                                @if($existsInDatabase)
                                                    <p><b>This post is already stored in the database</b></p>
                                                @endif
                                                    <button class="btn btn-success form_post" data-post-id="{{ $post['id'] }}" id="form_post">Create Post</button>
        
                                                    <br>
                                                    <form action="{{ route('admin.posts.delete', [$post['id']]) }}" method="POST" onsubmit="return confirm('Do you want to delete this post?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" class="btn btn-danger" value="Remove from DB"/>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                            </div>
                            <div class="jumbotron"></div>
                        </div>
                    </div>
                </main>
        </div>
    </body>


    <div class="modal" tabindex="-1" id="action_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.posts.post') }}" method="POST" onsubmit="return confirm('Are you sure?');" enctype="multipart/form-data">
                @csrf
                    <div class="modal-header" id="dynamic_modal_title">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title_post" id="title_post" class="form-control" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Created on</label>
                            <input type="text" name="display_created_time" id="display_created_time" class="form-control" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea type="text" name="display_message" id="display_message" class="form-control" disabled></textarea>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label">Tags</label>
                            <input type="text" name="tags_post" id="tags_post" class="form-control" required/>
                        </div>
                        <div class="mb-3 form-group">
                            <img name="display_full_picture" id="display_full_picture" class="form-control" />
                        </div>
                    </div>

                    <!-- Hidden inputs -->
                    <input type="hidden" name="facebook_id" id="facebook_id">
                    <input type="hidden" name="message" id="message">
                    <input type="hidden" name="full_picture" id="full_picture">
                    <input type="hidden" name="created_time" id="created_time">
                    <input type="hidden" name="link" id="link">

                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            id="close_button">Close</button>
                        <button type="submit" id="submit" class="btn btn-primary" id="action_button">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</html>

<script src="{{ asset('storage/javascripts/admin_homepage.js') }}"></script>
<!--* JQUERY - BOOTSTRAP JS-->
<script src="{{ asset('storage/javascripts/jquery.js') }}"></script>
<script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>
<script src="{{ asset('storage/popper.js') }}"></script>
<!-- AJAX -->
<script>
    $(document).ready(function() {
        // Show modal when the "Create Post" button is clicked
        $("#form_post").click(function() {
            $("#action_modal").modal("show");
        });

        $('#tags_post').on('keydown', function(e) {
            if (e.key === ',') { // Check if spacebar is pressed (keyCode 32)
            e.preventDefault(); // Prevent the default behavior of adding a space

            var inputVal = $(this).val();
            var newValue = inputVal + ',';
            var capitalizedVal = newValue.replace(/\b\w/g, function(match) {
                return match.toUpperCase();
            });
          
            $(this).val(capitalizedVal);
            }
        });

        $('#tags_post').on('keyup', function() {
            var inputVal = $(this).val();
            var capitalizedVal = inputVal.replace(/\b\w/g, function(match) {
                return match.toUpperCase();
            });
            $(this).val(capitalizedVal);
        });

        // Log form values on submit
        $("#submit").click(function() {
            var inputVal = $('#tags_post').val(); // Get the input value
            var tagsArray = inputVal.split(/[ ,]+/); // Split the input by spaces or commas
            filter = tagsArray.filter(item => item);
            console.log(filter); // Display the array in the console for testing
        });

        // Handle the "Create Post" button click event
        $('.form_post').click(function() {
            // Get the post ID
            var postId = $(this).data('post-id');

            // Fetch the relevant data from the post
            var post = getPostById(postId);

            // Set the form inputs based on the fetched data
            $('#title_post').val(post['title']);
            $('#tags_post').val(post['tags']);
            // display
            $('#display_message').val(post['message']);
            $('#display_created_time').val(post['created_time']);
            $('#display_full_picture').attr('src' ,post['full_picture'] )
            // hidden inputs
            $('#message').val(post['message']);
            $('#created_time').val(post['created_time']);
            $('#full_picture').val(post['full_picture'] )
            $('#facebook_id').val(post['fb_id'] )
            $('#link').val(post['permalink_url'] )

            // Show the modal
            $('#action_modal').modal('show');
        });

        
        $("#full_picture").click(function() {
            var inputValue = $(this).val();
            copyToClipboard(inputValue);
            alert("Copied text: " + inputValue);            
        });

        // Function to fetch the post data by ID
        function getPostById(postId) {
            // Loop through the posts and find the one with matching ID
            @foreach($posts as $post)
                @if(!empty($post['message']))
                    if ('{{ $post['id'] }}' === postId) {
                        return {
                            message: '{{ $post['message'] }}',
                            full_picture: '{{ $post['full_picture'] }}'.replace(/&amp;/g, '&'),
                            created_time: '{{ $post['created_time']->format('Y-m-d H:i:s') }}',
                            fb_id: '{{ $post['id'] }}',
                            permalink_url: '{{ $post['permalink_url'] }}'
                        };
                    }
                @endif
            @endforeach
        }
        
    });
</script>
