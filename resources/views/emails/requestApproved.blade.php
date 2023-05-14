@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>
@include('emails.head')
<body>
    <div class="container">
        <h1>Document Request Approved!</h1>
        <p>Dear {{ $mailData['name'] }},</p>
        <p>We are pleased to inform you that your document request for <strong>{{ $mailData['docType'] }}</strong> has been approved. You may now proceed to the Barangay office to pay the necessary fees and claim your requested document.</p>
        <p>The fee for this document is <strong>₱ {{ $mailData['fee'] }} pesos</strong>.</p>
        <p>As per our records, your document request was approved on {{ Carbon::createFromFormat('Y-m-d H:i:s', $mailData['approvedDate'])->format('F d, Y \a\t h:i A') }}, and you are now eligible to receive the requested document. We kindly request you to bring the necessary identification and any other relevant documents to facilitate a smooth transaction at the Barangay office.</p>
        <p>Valid IDs include: </p>
        <ul>
            <li>Passport</li>
            <li>Driver's License</li>
            <li>Philippine National ID</li>
            <li>Voter's ID</li>
            <li>Unified Multi-purpose ID (UMID)</li>
            <li>Postal ID</li>
            <li>Professional Regulation Commission (PRC) ID</li>
            <li>Senior Citizen ID</li>
            <li>Overseas Workers Welfare Administration (OWWA) ID</li>
        </ul>
        <p>If you have any further questions or need additional information, please do not hesitate to contact us. We are here to assist you with your document request.</p>
        <p>Thank you for your cooperation, and we look forward to serving you at the Barangay office.</p>
        <div class="signature">
            <p><strong>{{ $mailData['approvedBy'] }}</strong></p>
            <span>Barangay Official</span>
            <span>Barangay Hall of Barangay Cembo, Makati City</span>
        </div>
    </div>
</body>
</html>
