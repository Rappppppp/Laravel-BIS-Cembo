<!doctype html> 
<head>
    @include('admin.components.head')
    <script src="{{ asset('storage/pdf-lib/lib.js') }}"></script>
    <script src="{{ asset('storage/pdf-lib/dl-lib.js') }}"></script>
</head>
<body>
    <div class="wrapper">    
        <header>
            @include('admin.components.sidenav')
            @include('admin.components.nav')
        </header>
            <!-- Content -->
            <script>
                // Hide success message after 5 seconds
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 5000);
            </script>
            <main>
                <div id="content">
                    @if (session('success'))
                        <div id="success-message" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="parallax-bg-img">
                        <div class="card">
                            <div class="card-header" id="message">
                            <div class="block mb-8">
                        <form class="d-inline-block" action="{{ route('documents.delete', $document->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <a class="text-dark btn" href="{{ url()->previous() }}">Back to list</a>
                            <input type="submit" class="btn btn-danger ml-2" value="Delete">
                        </form>  
                        <form class="d-inline-block" action="{{ route('requestApproved.send', $document->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to approve this request?');">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="approved">
                            <input type="submit" class="btn btn-success ml-2" value="Approve">
                        </form>
                        <form class="d-inline-block" action="{{ route('requestDenied.send', $document->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to reject this request?');">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="denied">
                            <input type="submit" class="btn btn-warning ml-2" value="Reject">
                        </form>
                        <button class="btn btn-danger ml-2" onclick="fillForm()"><img src="{{ asset('storage/images/pdf.png') }}" style="width: 2rem;"> Print PDF</button>
                        </div>
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
                                                <th>Requestor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-striped table-bordered" id="user_data">
                                        <h3>Emergency Contact Details</h3>
                                        <thead>
                                            <tr>
                                                <th>Address</th>
                                                <th>Requirement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $contact->house_number }} {{ $contact->street_name }} {{ $contact->barangay_name }}, {{ $contact->city_name }}</td>
                                                <td>{{ $document->inputs['requirement'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-striped table-bordered" id="user_data">
                                        <thead><h3>Uploaded Image</h3></thead>
                                        <tbody>

                                            <td>
                                                <a href="{{ asset(str_replace('public/', '', 'storage/' . $document->document_path)) }}" target="_blank">
                                                    <img src="{{ asset(str_replace('public/', '', 'storage/' . $document->document_path)) }}" alt="Uploaded Image" style="width: 100%;">
                                                </a>
                                            </td>
                            
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

<!-- Optional JavaScript -->
<script src="{{ asset('storage/javascripts/admin_homepage.js') }}"></script>

<!--* BOOTSTRAP JS-->
<script src="{{ asset('storage/javascripts/bootstrap.min.js') }}"></script>
<script>
    const { PDFDocument } = PDFLib

    async function fillForm() {
        // Fetch the PDF with form fields
        const formUrl = '{{ asset('storage/forms/indigency.pdf') }}'
        const formPdfBytes = await fetch(formUrl).then(res => res.arrayBuffer())

        // Load a PDF with form fields
        const pdfDoc = await PDFDocument.load(formPdfBytes)

        // Get the form containing all the fields
        const form = pdfDoc.getForm()

        const dateString = "{{ $document->requested_at }}";
        const dateObj = new Date(dateString);

        const options = { 
        year: 'numeric',
        month: 'long',
        day: 'numeric'
        };

        const formattedDate = dateObj.toLocaleDateString('en-US', options);

        const date = form.getTextField('Date')
        const name = form.getTextField('Name')
        const address = form.getTextField('Address')
        const requirement = form.getTextField('Requirement')
   
        date.setText(formattedDate)
        name.setText('{{ $user->name }}')
        address.setText('{{ $contact->house_number }} {{ $contact->street_name }} {{ $contact->barangay_name }}, {{ $contact->city_name }}')
        requirement.setText('{{ $document->inputs["requirement"] }}')

        // Serialize the PDFDocument to bytes (a Uint8Array)
        const pdfBytes = await pdfDoc.save();

        // Create a Blob object from the PDF bytes
        const pdfBlob = new Blob([pdfBytes], { type: "application/pdf" });

        // Create a URL for the Blob
        const pdfUrl = URL.createObjectURL(pdfBlob);

        // Create an <iframe> element
        const iframe = document.createElement("iframe");
        iframe.style.display = "none";

        // Set the URL of the <iframe> to the PDF URL
        iframe.src = pdfUrl;

        // Append the <iframe> to the document body
        document.body.appendChild(iframe);

        // Wait for the <iframe> to load
        iframe.onload = () => {
        // Call the print() method on the <iframe> window
        iframe.contentWindow.print();
        };
    }
  </script>