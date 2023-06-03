<!doctype html> 
<head>
    @include('admin.components.head')
    <!-- <script src="https://unpkg.com/pdf-lib"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script> -->
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
                                                <td>{{ $document->name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-striped table-bordered" id="user_data">
                                        <h3>Emergency Contact Details</h3>
                                        <thead>
                                            <tr>
                                                <th>Mother's Name</th>
                                                <th>Father's Name</th>
                                                <th>Contact Person</th>
                                                <th>Relationship</th>
                                                <th>Contact Number</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>{{ $document->inputs['mother_name'] }} : {{ $document->inputs['mother_contact'] }}</td>
                                                <td>{{ $document->inputs['father_name'] }} : {{ $document->inputs['father_contact'] }}</td>
                                                <td>{{ $document->inputs['contact_person'] }}</td>
                                                <td>{{ $document->inputs['relationship'] }}</td>
                                                <td>{{ $document->inputs['contact_number'] }}</td>
                                                <td>{{ $document->inputs['cp_housenum'] }} {{ $document->inputs['cp_street'] }} {{ $document->inputs['cp_brgy'] }}, {{ $document->inputs['cp_city'] }}</td>
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
        const formUrl = '{{ asset('storage/forms/barangay_id.pdf') }}'
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
        const lastname = form.getTextField('Last Name')
        const firstname = form.getTextField('First Name')
        const middlename = form.getTextField('Middle Name')
        const contact = form.getTextField('Contact Number')
        const dob = form.getTextField('Date of Birth')
        const gender = form.getTextField('Gender')
        const status = form.getTextField('Civil Status')
        const address_cembo = form.getTextField('Address Cembo')
        const address_provincial = form.getTextField('Address Provincial')
        const years_cembo = form.getTextField('Length Stay Years')
        const father_name = form.getTextField('Father Name')
        const mother_name = form.getTextField('Mother Name')
        const cp_name = form.getTextField('CP Name')
        const cp_relationship = form.getTextField('CP Relationship')
        const cp_address = form.getTextField('CP Address')
        const cp_contact = form.getTextField('CP Contact')

        date.setText(formattedDate)
        lastname.setText('{{ $information->last_name }}')
        firstname.setText('{{ $information->first_name }}')
        middlename.setText('{{ $information->middle_name }}')
        contact.setText('{{ $contact->contact_number }}')
        dob.setText('{{ $information->date_of_birth }}')
        gender.setText('{{ $information->gender }}')
        status.setText('{{ $information->civil_status }}')
        address_cembo.setText('{{ $contact->house_number }} {{ $contact->street_name }} {{ $contact->barangay_name }}, {{ $contact->city_name }}')
        address_provincial.setText('{{ $contact->prov_house_number }} {{ $contact->prov_street_name }} {{ $contact->prov_barangay_name }}, {{ $contact->prov_city_name }}, {{ $contact->province_name }}')
        years_cembo.setText('{{ $makatizen->years_barangay_cembo }}')
        father_name.setText('{{ $document->inputs["father_name"] }}')
        mother_name.setText('{{ $document->inputs["mother_name"] }}')
        cp_name.setText('{{ $document->inputs["contact_person"] }}')
        cp_relationship.setText('{{ $document->inputs["relationship"] }}')
        cp_address.setText('{{ $document->inputs["cp_housenum"] }} {{ $document->inputs["cp_street"] }} {{ $document->inputs["cp_brgy"] }}, {{ $document->inputs["cp_city"] }}')
        cp_contact.setText('{{ $document->inputs["contact_number"] }}')

        // Checkboxes
        const cb_homeowner = form.getCheckBox('Is Homeowner')
        const cb_helpers = form.getCheckBox('CB HHHelpers')
        const cb_employee = form.getCheckBox('CB Employee')
        const cb_others = form.getCheckBox('CB Others')
        const others = form.getTextField('Others')

        role = '{{ $user->role }}'
        is_homeowner = '{{ $makatizen->head_of_household }}'

        if(is_homeowner == '1')
        {
            cb_homeowner.check()
        }

        if(role == ('Admin' || 'Barangay Official' || 'Content Manager'))
        {
            cb_employee.check()
        }
        else 
        {
            cb_others.check()
            others.setText('Resident')
        }
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