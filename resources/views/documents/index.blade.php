<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request</title>
    <link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/Request.css') }}" rel="stylesheet">
    <script src="{{ asset('storage/js/Request.js') }}"></script>
    <script src="{{ asset('storage/node_modules/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('storage/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>

<body>
    <div class="wrapper"> <!-- Fixes Footer to Bottom -->
        <!-- Nav -->
        @include('documents.header')
        <!-- Content -->
        <main>
            <div id="content">
                <div class="parallax-bg-img" style="background-image: url('{{ asset('storage/res/img/bg/BG.png') }}'); min-height: 100vh;">
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-b">
                        @include('documents.intro')
                    </div>
                    <hr id="spacer">
                    <div class="container-fluid" id="content-container-a">
                        <div class="container-fluid" id="title-container-a">
                            <span id="title">Available Documents are as follows:</span>
                        </div>
                        <div class="container-fluid">
                            <hr>
                        </div>
                        <br><br>
                        <div class="container-fluid" id="description-container-b">
                            <span id="title">Barangay I.D.</span>
                            <br><br>
                            <span>A Barangay ID (Identification Card) is an official identification card issued by the
                                Barangay, which is the smallest administrative division in the Philippines. It serves as
                                proof of residence and identity within a specific Barangay. The Barangay ID typically
                                contains the individual's name, photo, address, and a unique identification number. It
                                is often required for various local transactions, accessing Barangay services, and
                                participating in community activities.</span>
                        </div>
                        <br><br>
                        <div class="container-fluid" id="description-container-b">
                            <span id="title">Barangay Certificate</span>
                            <br><br>
                            <span>A Barangay Certificate is a document issued by the Barangay to certify certain
                                information or events related to an individual or a specific matter within the
                                Barangay's jurisdiction. It can cover various purposes, such as a Barangay Certificate
                                of Residency, Barangay Certificate of Good Moral Character, Barangay Clearance for
                                employment, Barangay Certificate of No Pending Case, or Barangay Certificate of No
                                Objection, among others. The specific type of Barangay Certificate required depends on
                                the purpose or request of the individual.</span>
                        </div>
                        <br><br>
                        <div class="container-fluid" id="description-container-b">
                            <span id="title">Indigency</span>
                            <br><br>
                            <span>Indigency refers to the condition of extreme poverty or being economically
                                disadvantaged. In the Philippines, an indigent individual or family is someone who lacks
                                the basic necessities of life, such as food, shelter, clothing, and access to essential
                                services. An indigency certificate is a document issued by the local government unit
                                (usually the Barangay) to certify that a person or family qualifies as indigent. This
                                certificate is often required to avail of certain government services and programs, such
                                as healthcare, education, or social welfare assistance.</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer -->
        @include('user.parts.footer')
    </div>

</body>

</html>