<!doctype html>
@include('admin.components.head')
    <link rel="stylesheet" href="{{ asset('storage/stylesheets/admin_posts.css') }}">
    <html lang="en">

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

                                                    <form action="{{ route('admin.posts.post') }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            <input type="hidden" name="facebook_id" value="{{ $post['id'] }}">
                                                            <input type="hidden" name="message" value="{{ $post['message'] }}">
                                                            <input type="hidden" name="full_picture" value="{{ $post['full_picture'] }}">
                                                            <input type="hidden" name="created_time" value="{{ $post['created_time']->format('Y-m-d H:i:s') }}">
                                                            <input type="hidden" name="link" value="{{ $post['permalink_url'] }}">
                                                            <input type="submit" class="btn btn-success" value="Post"/>
                                                    </form><br>
                                                    <form action="{{ route('admin.posts.delete', [$post['id']]) }}" method="POST" onsubmit="return confirm('Do you want to delete this post?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" class="btn btn-danger" value="Remove"/>
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
                <form method="post" id="form_post" enctype="multipart/form-data">
                    <div class="modal-header" id="dynamic_modal_title">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title_post" id="title_post" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Body</label>
                            <textarea type="text" placeholder="Make an Announcement" name="body_post" id="body_post"
                                rows="5" cols="50" class="form-control w-100 display-5" required></textarea>
                        </div>
                        <div>
                            <input type="file" name="update-image" id="image_post">
                        </div>

                        <div class="modal-footer mt-2">
                            <input type="hidden" name="id" id="id" />
                            <input type="hidden" name="action" id="action" value="Add" />
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                id="close_button">Close</button>
                            <button type="submit" class="btn btn-primary" id="action_button">Add</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    </html>
<!--* BOOTSTRAP JS-->
<script src="{{ asset('storage/javascripts/admin_homepage.js') }}"></script>
<script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>