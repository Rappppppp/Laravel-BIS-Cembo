<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformationModel;
use App\Models\ContactInformationModel;
use App\Models\MakatizenRegistryModel;
use Illuminate\Http\Request;
use Auth;

class RegistrationController extends Controller
{
    public function index_info()
    {
        return view('registration.personal_info');
    }

    public function index_contact()
    {
        $user_email = Auth::user()->email;
        return view('registration.contact_info')->with('user_email', $user_email);
    }

    public function index_makatizen()
    {
        return view('registration.makatizen_registry');
    }

    public function personalInfo(Request $input)
    {
        $user_id = Auth::user()->id;
        $personalInformation = PersonalInformationModel::where('user_id', $user_id)->first();
        $personalInformation->update([
            'gender' => $input['gender'],
            'date_of_birth' => $input['date_of_birth'],
            'place_of_birth' => $input['place_of_birth'],
            'nationality' => $input['nationality'],
            'religion' => $input['religion'],
            'civil_status' => $input['civil_status'],
            'occupation' => $input['occupation'],
            'educational_attainment' => $input['educational_attainment'],
        ]);

        return redirect()->route('contact.registration.get');
    }

    public function contactInfo(Request $input)
    {
        $user_id = Auth::user()->id;
        ContactInformationModel::create([
            'user_id' => $user_id,
            'contact_number' => $input['contact_number'],
            'house_number' => $input['house_number'],
            'street_name' => $input['street_name'],
            'barangay_name' => 'Cembo',
            'city_name' => 'Makati',
            'prov_house_number' => $input['prov_house_number'],
            'prov_street_name' => $input['prov_street_name'],
            'prov_barangay_name' => $input['prov_barangay_name'],
            'prov_city_name' => $input['prov_city_name'],
            'province_name' => $input['province_name'],
        ]);

        return redirect()->route('makatizen.registration.get');
    }

    public function makatiInfo(Request $input)
    {
        $user_id = Auth::user()->id;
        MakatizenRegistryModel::create([
            'user_id' => $user_id,
            'registered_voter' => $input['is_voter'],
            'head_of_household' => $input['is_head'],
            'social_sector' => $input['social_sector'],
            'vaccine_status' => $input['vaccine'],
            'years_makati' => $input['years_makati'],
            'years_barangay_cembo' => $input['years_cembo'],
            'years_current_address' => $input['years_current'],
            'num_household' => $input['num_household'],
            'num_families_household' => $input['num_fam_household'],
            'num_family_members' => $input['num_fam_members'],
            'relationship_head_family' => $input['relationship'],
            'yellow_card' => $input['yellow'],
            'blue_card' => $input['blue'],
            'white_card' => $input['white'],
            'makatizen_card' => $input['makatizen'],
            'philhealth_card' => $input['philhealth'],

            // Nullable - will add if necessary

            // 'monthly_household_income' => $input['prov_street_name'],
            // 'monthly_household_expenses' => $input['prov_barangay_name'],
            // 'monthly_mean_income' => $input['prov_city_name'],
            // 'monthly_net_income' => $input['province_name'],
        ]);

        return redirect()->route('user.homepage');
    }
}