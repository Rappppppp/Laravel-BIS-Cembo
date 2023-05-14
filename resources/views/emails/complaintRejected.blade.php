@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>
@include('emails.head')
<body>
    <div class="container">
        <h1>Complaint Request Rejected</h1>
        <p>Dear {{ $mailData['name'] }},</p>
        <p>We regret to inform you that your complaint request regarding <strong>{{ $mailData['complaint'] }}</strong> has been rejected. We have carefully reviewed your complaint and determined that it does not meet the criteria for further action.</p>
        <p>As per our records, your complaint request was reviewed and rejected on {{ Carbon::createFromFormat('Y-m-d H:i:s', $mailData['rejectedDate'])->format('F d, Y \a\t h:i A') }}. We understand that this may not be the outcome you were hoping for, but we assure you that we take all complaints seriously and thoroughly investigate each one.</p>
        <p>If you have any further questions or need additional information, please do not hesitate to contact us. We are here to assist you and provide further clarification on the decision made.</p>
        <p>Thank you for bringing this matter to our attention, and we apologize for any inconvenience caused. We remain committed to addressing community concerns and maintaining a safe and orderly environment.</p>
        <div class="signature">
            <p><strong>{{ $mailData['rejectedBy'] }}</strong></p>
            <span>Barangay Official</span>
            <span>Barangay Hall of Barangay Cembo, Makati City</span>
        </div>
    </div>
</body>
</html>