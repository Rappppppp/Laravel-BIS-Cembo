@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>
@include('emails.head')
<body>
    <div class="container">
        <div id="liveView"></div>
    </div>
    <textarea name="mailContent" id="mailContent" class="ckeditor"></textarea>
    <button class="btn btn-success btn-save">Save</button>
</body>
</html>

<script src="{{ asset('storage/javascripts/jquery.js') }}"></script>
<script src="{{ asset('storage/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('mailContent');
    // Retrieve the HTML content and set it to the CKEditor instance
    var mailData = {!! json_encode($mailData) !!};
    var content = `
            <h1>Complaint Request Approved!</h1>
            <p>Dear <strong>{{ $mailData['name'] }}</strong>,</p>
            <p>We are pleased to inform you that your complaint request regarding <strong>{{ $mailData['complaint'] }}</strong> has been approved. The necessary actions will be taken to address your complaint.</p>
            <p>As per our records, your complaint request was approved on <strong>{{ $mailData['approvedDate'] }}</strong>. We appreciate your cooperation in bringing this matter to our attention and helping us in maintaining a safe and orderly community.</p>
            <p>If you have any further questions or need additional information, please do not hesitate to contact us. We are here to assist you with your complaint.</p>
            <p>However, please note that your complaint is still under investigation, and we are actively working to resolve it as soon as possible. We will keep you updated on the progress and inform you once the issue is resolved.</p>
            <p>Thank you for your understanding, and we apologize for any inconvenience caused.</p>
            <div class="signature">
                <p><strong>{{ $mailData['approvedBy'] }}</strong></p>
                <p>Barangay Official</p>
                <p>Barangay Hall of Barangay Cembo, Makati City</p>
            </div>
    `;

    CKEDITOR.instances.mailContent.setData(content);

</script>
<script>
    $(document).ready(function() {
        var liveView = $('#liveView');
        var editor = CKEDITOR.instances.mailContent;
        editor.config.allowedContent = true;
        liveView.html(editor.getData());    

        // live view 
        editor.on('change', function() {
            liveView.html(editor.getData());
        });

        $('.btn-save').on('click',function() {
            TextData = editor.getData()
            Mod1 = TextData.replace('[Name]', '\{\{ $mailData[\'name\'] \}\}')
            Mod2 = Mod1.replace('[Complaint]', '\{\{ $mailData[\'complaint\'] \}\}')
            Mod3 = Mod2.replace('2000-01-01 00:00:00', '\{\{ $mailData[\'approvedDate\'] \}\}')
            Mod4 = Mod3.replace('[Approved By]', '\{\{ $mailData[\'approvedBy\'] \}\}')
           // replace content of <strong> elements
            console.log(Mod4)
        })
    });
</script>