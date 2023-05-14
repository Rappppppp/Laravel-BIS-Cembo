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


<h3>Complaint Form</h3>
<a class="nav-link" href="{{ route('user.homepage') }}" onclick="event.preventDefault();
            this.closest'form').submit(); " role="button">
    Back
</a>
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('complaints.submit') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <x-label for="complaint">Nature of Complaint</x-label>
        <select class="block mt-1 w-full" type="text" name="complaint" id="complaint" required>
            <option value="Noise disturbance">Noise disturbance</option>
            <option value="Illegal parking">Illegal parking</option>
            <option value="Waste management issues">Waste management issues</option>
            <option value="Animal control complaints">Animal control complaints</option>
            <option value="Water supply problems">Water supply problems</option>
            <option value="Electrical or power outages">Electrical or power outages</option>
            <option value="Street lighting issues">Street lighting issues</option>
            <option value="Public health concerns">Public health concerns</option>
            <option value="Road maintenance complaints">Road maintenance complaints</option>
            <option value="Public safety and security concerns">Public safety and security concerns</option>
            <option value="Building code violations">Building code violations</option>
            <option value="Violation of barangay ordinances">Violation of barangay ordinances</option>
            <option value="Boundary disputes">Boundary disputes</option>
            <option value="Public transportation issues">Public transportation issues</option>
            <option value="Community disputes or conflicts">Community disputes or conflicts</option>
            <option value="Others">Others</option>
        </select>
    </div>

    <div>
        <x-label for="location">Location</x-label>
        <x-input class="block mt-1 w-full" type="text" name="location" id="location" value="{{ old('location') }}" required />
    </div>

    <div>
        <h3>Address</h3>
        <x-label for="stnum">Description</x-label>
        <x-input class="block mt-1 w-full" type="text" name="description" id="description" value="{{ old('description') }}" required />
    </div>
    <br>
    <div>
        <x-label for="photo">Upload ID</x-label>
        <input class="block mt-1 w-full" type="file" name="evidence" id="evidence" accept=".jpg, .jpeg, .png" /><br>
        <i>Supporting evidence (Max Size: 2048x2048, Accepts: jpg, jpeg, png)</i>
    </div>
    <br>
    <div class="flex items-center justify-end mt-4">
        <button type="submit" class="">Submit</button>
    </div>
</form>