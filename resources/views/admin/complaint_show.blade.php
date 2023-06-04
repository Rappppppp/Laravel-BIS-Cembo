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
                    <div class="parallax-bg-img" style="background-image: url('res/Rectangle\ 68.png');">
                        <div class="card">
                            <div class="card-header" id="message">
                            <div class="block mb-8">  
                                <a class="text-dark btn" href="{{ url()->previous() }}">Back to list</a>

                                <form class="d-inline-block" action="{{ route('complaintApproved.send', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="under investigation">
                                    <input type="submit" class="btn btn-success btn-sm ml-2" value="Investigate" 
                                    @if ($request->status == 'pending')
                                        enabled
                                    @else
                                        disabled
                                    @endif>
                                </form>
                                <form class="d-inline-block" action="{{ route('complaintDenied.send', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="denied">
                                    <input type="submit" class="btn btn-warning btn-sm ml-2" value="Reject" 
                                    @if ($request->status == 'pending')
                                        enabled
                                    @else
                                        disabled
                                    @endif>
                                </form> 
                                <form class="d-inline-block" action="{{ route('complaints.delete', [$request->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm ml-2" value="Delete" 
                                @if ($request->status == 'resolved' || 'denied')
                                    enabled
                                @else
                                    disabled
                                @endif>
                                </form>
                                <button class="btn btn-danger ml-2" onclick="fillForm()"><img src="{{ asset('storage/images/pdf.png') }}" style="width: 2rem;">Print PDF</button>
                            </div>
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
                                                <th>Reporter</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $request->name_of_respondent }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-striped table-bordered" id="user_data">
                                        <h3>Complaint Details</h3>
                                        <thead>
                                            <tr>
                                                <th>Nature of Complaint</th>
                                                <th>Location</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>{{ $request->nature_of_complaint }}</td>
                                                <td>{{ $request->location }}</td>
                                                <td>{{ $request->description }}</td>
                                            </tr>
                               
                                        </tbody>
                                    </table>

                                    <!-- <table class="table table-striped table-bordered" id="user_data">
                                        <thead><h3>Uploaded Image</h3></thead>
                                        <tbody>

                                            <td>
                                                <a href="{{ asset(str_replace('public/', '', 'storage/' . $request->supporting_evidence)) }}" target="_blank">
                                                    <img src="{{ asset(str_replace('public/', '', 'storage/' . $request->supporting_evidence)) }}" alt="Uploaded Image" style="width: 100%;">
                                                </a>
                                            </td>
                            
                                        </tbody>
                                    </table> -->
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
        const formUrl = '{{ asset('storage/forms/complaints.pdf') }}'
        const formPdfBytes = await fetch(formUrl).then(res => res.arrayBuffer())

        // Load a PDF with form fields
        const pdfDoc = await PDFDocument.load(formPdfBytes)

        // Get the form containing all the fields
        const form = pdfDoc.getForm()

        const dateString = "";
        const dateObj = new Date(dateString);

        const options = { 
        year: 'numeric',
        month: 'long',
        day: 'numeric'
        };

        const formattedDate = dateObj.toLocaleDateString('en-US', options);

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

   
