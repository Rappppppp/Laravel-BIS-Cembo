@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>
@include('emails.head')
<body>
    <div class="container">
        <h1>Complaint Request Approved!</h1>
        <p>Dear {{ $mailData['name'] }},</p>
        <p>We are pleased to inform you that your complaint request regarding <strong>{{ $mailData['complaint'] }}</strong> has been approved. The necessary actions will be taken to address your complaint.</p>
        <p>As per our records, your complaint request was approved on {{ Carbon::createFromFormat('Y-m-d H:i:s', $mailData['approvedDate'])->format('F d, Y \a\t h:i A') }}. We appreciate your cooperation in bringing this matter to our attention and helping us in maintaining a safe and orderly community.</p>
        <p>If you have any further questions or need additional information, please do not hesitate to contact us. We are here to assist you with your complaint.</p>
        <p>However, please note that your complaint is still under investigation, and we are actively working to resolve it as soon as possible. We will keep you updated on the progress and inform you once the issue is resolved.</p>
        <p>Thank you for your understanding, and we apologize for any inconvenience caused.</p>
        <div class="signature">
            <p><strong>{{ $mailData['approvedBy'] }}</strong></p>
            <span>Barangay Official</span>
            <span>Barangay Hall of Barangay Cembo, Makati City</span>
        </div>
    </div>
</body>
</html>
