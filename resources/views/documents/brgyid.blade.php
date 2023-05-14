<style>
.popup-card {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.popup-content {
  background-color: white;
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  text-align: left;
}

.close-btn {
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close-btn:hover {
  color: red;
  cursor: pointer;
}
</style>


Brgy ID
<br>
<a class="nav-link" href="{{ route('documents') }}" onclick="event.preventDefault();
            this.closest'form').submit(); " role="button">
    Back
</a>
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<h1>EMERGENCY CONTACT DETAILS</h1>
<form method="POST" action="{{ route('documents.submit', ['form' => $form]) }}" enctype="multipart/form-data">
    @csrf

    <div>
        <x-label for="contact_person">Contact Person</x-label>
        <x-input class="block mt-1 w-full" type="text" name="contact_person" id="contact_person" value="{{ old('contact_person') }}" required />
    </div>

    <div>
        <x-label for="relationship">Relationship</x-label>
        <select class="block mt-1 w-full" type="text" name="relationship" id="relationship" value="{{ old('relationship') }}" required>
            <option value="Parent">Parent</option>
            <option value="Spouse">Spouse</option>
            <option value="Child">Child</option>
            <option value="Sibling">Sibling</option>
            <option value="Friend">Friend</option>
            <option value="Relative">Relative</option>
            <option value="Neighbor">Neighbor</option>
            <option value="Colleague">Colleague</option>
        </select>
    </div>

    <div>
        <h3>Address</h3>
        <br>
        <x-label for="stnum">Street Number</x-label>
        <x-input class="block mt-1 w-full" type="text" name="stnum" id="stnum" value="{{ old('stnum') }}" required />
        <br>
        <x-label for="stadd">Street Address</x-label>
        <x-input class="block mt-1 w-full" type="text" name="stadd" id="stadd" value="{{ old('stadd') }}" required />
        <br>
        <x-label for="brgy">Barangay</x-label>
        <x-input class="block mt-1 w-full" type="text" name="brgy" id="brgy" value="{{ old('brgy') }}" required />
        <br>
        <x-label for="city">City</x-label>
        <x-input class="block mt-1 w-full" type="text" name="city" id="city" value="{{ old('city') }}" required />
        <br>
        <x-label for="province">State/Province/Region</x-label>
        <x-input class="block mt-1 w-full" type="text" name="province" id="province" value="{{ old('province') }}" required />
    </div>

    <div>
        <x-label for="contact_number">Contact Number</x-label>
        <x-input class="block mt-1 w-full" type="number" name="contact_number" id="contact_number"/>
    </div>
    <br>
    <div>
        <x-label for="photo">Upload ID</x-label>
        <input class="block mt-1 w-full" type="file" name="photo" id="photo" accept=".jpg, .jpeg, .png" required />
        <i>Upload Document (Max Size: 2048x2048, Accepts: jpg, jpeg, png)</i>
    </div>

    <div class="flex items-center justify-end mt-4">
        <button type="submit" class="">Submit</button>
    </div>
  </form>
    <br>
    <button id="popupBtn">Show Accepted IDs</button>

    <div class="popup-card" id="popupCard">
    <div class="popup-content">
        <span class="close-btn" id="closeBtn">&times;</span>
        <h2>Accepted IDs</h2>
        <p>
            <ul>
                <li>Passport</li>
                <li>Driver's License</li>
                <li>Professional Regulation Commission (PRC) ID</li>
                <li>National Bureau of Investigation (NBI) Clearance</li>
                <li>Postal ID</li>
                <li>Voter's ID</li>
                <li>Social Security System (SSS) Card</li>
                <li>Government Service Insurance System (GSIS) ID</li>
                <li>Tax Identification Number (TIN) Card</li>
                <li>Philhealth ID</li>
                <li>Senior Citizen ID</li>
                <li>Overseas Workers Welfare Administration (OWWA) ID</li>
                <li>Home Development Mutual Fund (HDMF) ID</li>
                <li>Alien Certificate of Registration (ACR) / Immigrant Certificate of Registration (ICR)</li>
            </ul>
        </p>
    </div>
    </div>
    <br>
    <input type="hidden" name="form" value="{{ $form }}">

<script>
  // Get the popup card and the button that opens it
  var popupCard = document.getElementById("popupCard");
  var popupBtn = document.getElementById("popupBtn");
  var closeBtn = document.getElementById("closeBtn");

  // When the user clicks on the button, open the popup card
  popupBtn.onclick = function() {
    popupCard.style.display = "block";
  }

  // When the user clicks on the close button, close the popup card
  closeBtn.onclick = function() {
    popupCard.style.display = "none";
  }

  // When the user clicks anywhere outside of the popup card, close it
  window.onclick = function(event) {
    if (event.target == popupCard) {
      popupCard.style.display = "none";
    }
  }
</script>

<script>
    const contactNumberInput = document.getElementById('contact_number');
    
    contactNumberInput.addEventListener('input', (event) => {
        if (event.target.value.length > 11) {
            event.target.value = event.target.value.substring(0, 11);
        }
    });
</script>