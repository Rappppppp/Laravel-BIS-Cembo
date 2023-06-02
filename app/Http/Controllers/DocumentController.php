<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\DocumentModel;
use Illuminate\Validation\Rule;
use Auth;

class DocumentController extends Controller
{
    public function index()
    {
        return view('documents.index');
    }

    public function showForm($form)
    {
        if (!in_array($form, ['brgyid', 'brgycertificate'])) {
            abort(404);
        }

        return view('documents/' . $form, ['form' => $form]);
    }

    public function submit(Request $request)
    {
        // Validate the input fields
        $validated = $request->validate([
            'cp_firstname' => 'required',
            'cp_middlename' => 'required',
            'cp_lastname' => 'required',
            'cp_contact' => 'required',
            'cp_relationship' => 'required',
            'cp_housenum' => 'required',
            'cp_street' => 'required',
            'cp_brgy' => 'required',
            'cp_city' => 'required',
            'photo' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Determine the document type
        $document_type = ($request->input('form') == 'brgyid') ? 'Barangay ID' : 'Barangay Certificate';

        // Check for duplicates
        $existing_request = DocumentModel::where('user_id', Auth::user()->id)
            ->where('document_type', $document_type)
            ->where('status', '<>', 'cancelled')
            ->first();

        if ($existing_request) {
            return redirect('/documents/brgyid')->with('info', 'You already have a pending or approved request for this document.');
        }

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            // Store the file in the app/storage/documents directory
            $path = $request->file('photo')->store('public/image_id');

            $contact_person_name = $validated['cp_firstname'] . " " . $validated['cp_middlename'] . " " . $validated['cp_lastname'];
            $mother_name = $request['m-firstname'] . " " . $request['m-middlename'] . " " . $request['m-lastname'];
            $father_name = $request['f-firstname'] . " " . $request['f-middlename'] . " " . $request['f-lastname'];

            // Create the new document request
            $documentRequest = DocumentModel::create([
                'user_id' => Auth::user()->id,
                'document_type' => $document_type,
                'document_path' => $path,
                'status' => 'pending',
                'inputs' => array(
                    'contact_person' => $contact_person_name,
                    'relationship' => $validated['cp_relationship'],
                    'cp_housenum' => $validated['cp_housenum'],
                    'cp_street' => $validated['cp_street'],
                    'cp_brgy' => $validated['cp_brgy'],
                    'cp_city' => $validated['cp_city'],
                    'contact_number' => $validated['cp_contact'],
                    'mother_name' => $mother_name,
                    'mother_contact' => $request['m-contact'],
                    'father_name' => $father_name,
                    'father_contact' => $request['f-contact'],
                )
            ]);

            $documentRequest->save();

            // Process form submission
            return redirect('/documents/brgyid')->with('success', 'Your document request has been submitted successfully.');
        } else {
            return redirect('/documents/brgyid')->with('error', 'Document upload failed. Please upload a valid file.');
        }

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => ['required', Rule::in(['approved', 'denied', 'pending', 'success'])],
        ]);

        $documentRequest = DocumentModel::findOrFail($id);
        $documentRequest->update(['status' => $validatedData['status']]);
        return redirect()->route('admin.documentRequests')->with('flash_message', 'Status Modified.');
    }

    public function destroy(DocumentModel $document)
    {
        $document->delete();
        return redirect()->route('admin.documentRequests')->with('success', 'Request Deleted Successfuly!');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}