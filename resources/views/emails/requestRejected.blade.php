@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>
@include('emails.head')
<body>
    <div class="container">
        <h1>Document Request Rejected</h1>
        <p>Dear {{ $mailData['name'] }},</p>
        <p>We regret to inform you that your document request for <strong>{{ $mailData['docType'] }}</strong> has been rejected. Unfortunately, your request did not meet the requirements for approval. If you have any questions or need further clarification, please do not hesitate to contact us.</p>
        <p>If you wish to reapply for the document request, please review the requirements and resubmit your request accordingly.</p>
        <p>We apologize for any inconvenience this may have caused and appreciate your understanding.</p>
        <div class="signature">
            <p><strong>{{ $mailData['approvedBy'] }}</strong></p>
            <span>Barangay Official</span>
            <span>Barangay Hall of Barangay Cembo, Makati City</span>
        </div>
    </div>
</body>
</html>
