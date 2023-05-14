Request Documents
<br>
<a class="nav-link" href="{{ route('user.homepage') }}" onclick="event.preventDefault();
            this.closest'form').submit(); " role="button">
    Home
</a>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<br>
<a href="{{ route('documents.showForm', ['form' => 'brgyid']) }}">Barangay ID Form</a>
<br>
<a href="{{ route('documents.showForm', ['form' => 'brgycertificate']) }}">Barangay Certificate Form</a>

