<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComplaintModel;
use Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        return view('complaints.index');
    }

    public function submit(Request $input)
    {
        $path = '';
        if ($input->hasFile('evidence')) {
            // Store the file in the app/storage/documents directory
            $path = $input->file('evidence')->store('public/complaints_image');
        }

        // Create the new document input
        $user = Auth::user();

        $complaint = ComplaintModel::create([
            'user_id' => $user->id,
            'name_of_respondent' => $user->name,
            'nature_of_complaint' => $input['complaint'],
            'location' => $input['location'],
            'description' => $input['description'],
            'supporting_evidence' => $path,
        ]);

        $complaint->save();

        // Process form submission
        return redirect()->route('complaints')->with('success', 'Your document request has been submitted successfully.');

    }

    public function destroy(ComplaintModel $complaint)
    {
        $complaint->delete();
        return redirect()->route('admin.complaintRequests');
    }

}