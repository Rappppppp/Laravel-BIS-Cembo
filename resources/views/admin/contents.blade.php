<!doctype html>
<html>
    <head>
    @include('admin.components.head')
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
                    <div class="parallax-bg-img">
                        <div class="container-fluid pb-0" id="officials">
                            <div class="container-fluid" id="header-container">
                            </div>
                            <div class="container-fluid" id="content-container" style="border-radius: 0;">
                                <div class="row">
                                    <textarea id="editor" name="editor"></textarea>
                                    
                                </div>
                                <button id="editor_submitBtn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>

<script src="{{ asset('storage/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace('editor');</script>
<!--* AJAX-->
<script src="{{ asset('storage/javascripts/jquery.js') }}"></script>

<!-- CKEDITOR -->
<script>
$(document).ready(function() {
    $('#editor_submitBtn').on('click', function() {
        var editorData = CKEDITOR.instances.editor.getData();
        console.log(editorData);
    });
});
</script>
<!--* BOOTSTRAP JS-->
<script src="{{ asset('storage/javascripts/admin_homepage.js') }}"></script>
<script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>
