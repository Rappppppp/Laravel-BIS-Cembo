<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use App\Mail\NotifyEmail;
use App\Mail\NotifyRejected;
use App\Mail\NotifyComplaintApproved;
use App\Mail\NotifyComplaintRejected;
use App\Models\DocumentModel;
use App\Models\ComplaintModel;
// App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class NotifyEmailController extends Controller
{
    public function approve(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => ['required', Rule::in(['approved'])],
        ]);

        $documentRequest = DocumentModel::findOrFail($id);
        $documentRequest->update(['status' => $validatedData['status']]);
        $document_type = $documentRequest->document_type;

        $document = DocumentModel::where('user_id', $documentRequest->user_id)->first();
        $user_email = $document->user->email;
        $user_name = $document->user->name;
        $approved_by = Auth::user()->name;

        // Set the timezone to Singapore time
        $currentTime = Carbon::now();
        $currentTime->setTimezone('Asia/Singapore');
        $formattedTime = $currentTime->format('Y-m-d H:i:s');

        $fee = 0;
        // Assign Barangay Fee
        if ($document_type = 'Barangay ID') {
            $fee = 200;
        } else {
            $fee = 300;
        }

        $mailData = [
            'name' => $user_name,
            'docType' => $document_type,
            'approvedDate' => $formattedTime,
            'approvedBy' => $approved_by,
            'fee' => $fee
        ];

        Mail::to($user_email)->send(new NotifyEmail($mailData));
        return redirect()->route('admin.documentRequests')->with('success', 'Email has been sent successfuly!');
    }

    public function denied(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => ['required', Rule::in(['denied'])],
        ]);

        // Set Variables
        $documentRequest = DocumentModel::findOrFail($id);
        $documentRequest->update(['status' => $validatedData['status']]);

        $document = DocumentModel::where('user_id', $documentRequest->user_id)->first();
        $user_email = $document->user->email;
        $user_name = $document->user->name;
        $approved_by = Auth::user()->name;

        // Set the timezone to Singapore time
        $currentTime = Carbon::now();
        $currentTime->setTimezone('Asia/Singapore');
        $formattedTime = $currentTime->format('Y-m-d H:i:s');

        $mailData = [
            'name' => $user_name,
            'docType' => $documentRequest->document_type,
            'approvedDate' => $formattedTime,
            'approvedBy' => $approved_by,
        ];

        Mail::to($user_email)->send(new NotifyRejected($mailData));
        return redirect()->route('admin.documentRequests')->with('success', 'Email has been sent successfuly!');
    }

    public function complaintApproved(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => ['required', Rule::in(['under investigation'])],
        ]);

        // Set Variables
        $complaintRequest = ComplaintModel::findOrFail($id);
        $approved_by = Auth::user()->name;
        $currentTime = Carbon::now();
        $currentTime->setTimezone('Asia/Singapore');
        $formattedTime = $currentTime->format('Y-m-d H:i:s');

        $complaintRequest->update([
            'status' => $validatedData['status'],
            // 'approved_denied_by' => $approved_by,
            'approved_denied_at' => $currentTime
        ]);

        $complaint = ComplaintModel::where('user_id', $complaintRequest->user_id)->first();
        $user_email = $complaint->user->email;
        $user_name = $complaint->user->name;

        $mailData = [
            'name' => $user_name,
            'complaint' => $complaint->nature_of_complaint,
            'approvedDate' => $formattedTime,
            'approvedBy' => $approved_by,
        ];

        Mail::to($user_email)->send(new NotifyComplaintApproved($mailData));
        return redirect()->route('admin.complaintRequests')->with('success', 'Email has been sent successfuly!');
    }

    public function complaintDenied(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => ['required', Rule::in(['denied'])],
        ]);

        // Set Variables
        $complaintRequest = ComplaintModel::findOrFail($id);
        $denied_by = Auth::user()->name;
        $currentTime = Carbon::now();
        $currentTime->setTimezone('Asia/Singapore');
        $formattedTime = $currentTime->format('Y-m-d H:i:s');

        $complaintRequest->update([
            'status' => $validatedData['status'],
            //'approved_denied_by' => $denied_by,
            'approved_denied_at' => $currentTime
        ]);

        $complaint = ComplaintModel::where('user_id', $complaintRequest->user_id)->first();
        $user_email = $complaint->user->email;
        $user_name = $complaint->user->name;

        $mailData = [
            'name' => $user_name,
            'complaint' => $complaint->nature_of_complaint,
            'rejectedDate' => $formattedTime,
            'rejectedBy' => $denied_by,
        ];

        Mail::to($user_email)->send(new NotifyComplaintRejected($mailData));
        return redirect()->route('admin.complaintRequests')->with('success', 'Email has been sent successfuly!');
    }
}