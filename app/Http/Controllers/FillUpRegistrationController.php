<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FillUpRegistrationController extends Controller
{
    private function generateBarangayID($firstName, $lastName)
    {
        $fn = strtoupper(substr($firstName, 0, 1));
        $ln = strtoupper(substr($lastName, 0, 1));
        $randomNum = rand(100, 999);
        $randomDate = substr((string) time(), 5, 5);
        return $fn . $ln . $randomNum . $randomDate;
    }

    public function index()
    {
        return view('registration.index');
    }

    public function create(Request $input)
    {
        $user = Auth::user();

        // Validator::make($input, [
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'middle_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        // ])->validate();

        $user->fill([
            'barangay_id' => $this->generateBarangayID($input['first_name'], $input['last_name']),
            'name' => $input['first_name'] . " " . $input['middle_name'] . " " . $input['last_name'],
        ])::findOrFail($user->id);

        $user->update([
            'role' => 'RegisteredResident'
        ]);

        $user->personalInformation()->create([
            'user_id' => $user->id,
            'first_name' => $input['first_name'],
            'middle_name' => $input['middle_name'],
            'last_name' => $input['last_name'],
            'gender' => $input['gender'],
            'date_of_birth' => $input['date_of_birth'],
            'place_of_birth' => $input['place_of_birth'],
            'nationality' => $input['nationality'],
            'religion' => $input['religion'],
            'civil_status' => $input['civil_status'],
            'occupation' => $input['occupation'],
            'educational_attainment' => $input['educational_attainment'],
        ]);

        $user->save();

        return redirect('/dashboard');
    }
}