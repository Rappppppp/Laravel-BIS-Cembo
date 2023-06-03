<div class="container-fluid" id="intro-container">
    <span id="intro">Request Documents</span>
</div>
<hr id="spacer">
<div class="container-fluid" id="content-container-b">
    <div class="col-lg-4 col-md-4 col-sm-12 ms-auto" style="padding: 20px;">
        <div class="container-fluid" id="input">
            <div class="select" onchange="change(event.target.value)">
                <select id="type">
                    <option disabled selected>Select Document Type</option>
                    <option value="{{ route('documents.showForm', ['form' => 'Barangay-ID']) }}">Brgy-ID</option>
                    <!-- <option value="BrgyClearance.html">Brgy-Clearance</option> -->
                    <option value="{{ route('documents.showForm', ['form' => 'Indigency']) }}">Indigency</option>
                </select>
                <div class="select_arrow">
                </div>
            </div>
        </div>
    </div>
</div>