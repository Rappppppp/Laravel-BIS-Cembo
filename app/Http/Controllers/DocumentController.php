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
            'contact_person' => 'required',
            'relationship' => 'required',
            'stnum' => 'required',
            'stadd' => 'required',
            'brgy' => 'required',
            'city' => 'required',
            'province' => 'required',
            'contact_number' => 'required',
            'photo' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Determine the document type
        $documentType = ($request->input('form') == 'brgyid') ? 'Barangay ID' : 'Barangay Certificate';

        // Check for duplicates
        $existingRequest = DocumentModel::where('user_id', Auth::user()->id)
            ->where('document_type', $documentType)
            ->where('status', '<>', 'cancelled')
            ->first();

        if ($existingRequest) {
            return back()->with('error', 'You already have a pending or approved request for this document.');
        }

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            // Store the file in the app/storage/documents directory
            $path = $request->file('photo')->store('public/image_id');

            // Create the new document request
            $documentRequest = DocumentModel::create([
                'user_id' => Auth::user()->id,
                'document_type' => $documentType,
                'document_path' => $path,
                'status' => 'pending',
                'inputs' => array(
                    'contact_person' => $validated['contact_person'],
                    'relationship' => $validated['relationship'],
                    'stnum' => $validated['stnum'],
                    'stadd' => $validated['stadd'],
                    'city' => $validated['city'],
                    'province' => $validated['province'],
                    'contact_number' => $validated['contact_number']
                )
            ]);

            $documentRequest->save();

            // Process form submission
            return redirect()->route('documents')->with('success', 'Your document request has been submitted successfully.');
        } else {
            return back()->with('error', 'Document upload failed. Please upload a valid file.');
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
        return redirect()->route('admin.documentRequests');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}