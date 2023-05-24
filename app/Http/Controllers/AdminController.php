<?php

namespace App\Http\Controllers;

use App\Models\BarangayOfficialsModel;
use App\Models\ComplaintModel;
use App\Models\ContactInformationModel;
use App\Models\DocumentModel;
use App\Models\MakatizenRegistryModel;
use App\Models\PersonalInformationModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Residents Table
    public function index()
    {
        $users = User::search()
            ->orderBy('name')
            ->paginate(20)
            ->where('role', '!=', 'Admin');

        // Get the sum data of number of household, families household and number of users registered.
        $makatizen_infos = MakatizenRegistryModel::select('num_household', 'num_families_household')->get();
        $userCount = PersonalInformationModel::count();
        $householdCount = $makatizen_infos->sum('num_household');
        $familiesCount = $makatizen_infos->sum('num_families_household');
        return view('admin.index', compact('users', 'userCount', 'householdCount', 'familiesCount'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $information = PersonalInformationModel::where('user_id', $id)->first();
        $contact = ContactInformationModel::where('user_id', $id)->first();
        $makatizen = MakatizenRegistryModel::where('user_id', $id)->first();
        return view('admin.show')
            ->with('user', $user)
            ->with('information', $information)
            ->with('contact', $contact)
            ->with('makatizen', $makatizen);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    // Document
    public function documentRequests()
    {
        $requests = DocumentModel::with('user')->orderBy('created_at', 'desc')->get();
        $user = $requests->map(function ($document) {
            $user = User::find($document->user_id);
            $document->username = $user ? $user->name : '';
            $document->barangay_id = $user ? $user->barangay_id : '';
            return $document;
        });
        return view('admin.documentRequests', compact('requests'));
    }

    public function documentShow($id)
    {
        $document = DocumentModel::join('users', 'users.id', '=', 'document_requests.user_id')
            ->select('document_requests.*', 'users.name')
            ->find($id);
        return view('admin.documentShow')->with('request', $document);
    }

    public function complaintShow($id)
    {
        $complaint = ComplaintModel::join('users', 'users.id', '=', 'complaints.user_id')
            ->select('complaints.*', 'users.name')
            ->find($id);
        return view('admin.complaintShow')->with('request', $complaint);
    }

    // Complaints
    public function complaintRequests()
    {
        $requests = ComplaintModel::with('user')->orderBy('created_at', 'desc')->get();
        $user = $requests->map(function ($complaint) {
            $user = User::find($complaint->user_id);
            $complaint->username = $user ? $user->name : '';
            $complaint->barangay_id = $user ? $user->barangay_id : '';
            return $complaint;
        });
        return view('admin.complaintRequests', compact('requests'));
    }

    public function barangayOfficials()
    {
        $addedOfficials = BarangayOfficialsModel::all();
        $officials = User::where('role', '=', 'Official')->get();
        return view('admin.officials', compact('officials', 'addedOfficials'));
    }

    public function addBarangayOfficials(Request $request)
    {
        if ($request->hasFile('official_photo') && $request->file('official_photo')->isValid()) {
            $path = $request->file('official_photo')->store('public/official_photos');
            BarangayOfficialsModel::create([
                'name' => $request['official_name'],
                'position' => $request['official_title'],
                'photo' => $path
            ]);
        } else {
            BarangayOfficialsModel::create([
                'name' => $request['official_name'],
                'position' => $request['official_title'],
            ]);
        }

        return redirect()->route('admin.officials')->with('success', 'Barangay Official Successfuly Added!');
    }

    public function removeBarangayOfficial($id)
    {
        try {
            BarangayOfficialsModel::destroy($id);
            return redirect()->route('admin.officials')->with('success', 'Barangay Official Successfully Deleted!');
        } catch (\Exception $e) {
            return redirect()->route('admin.officials')->with('error', 'Error Deleting Barangay Official: ' . $e->getMessage());
        }
    }

    public function charts()
    {
        $personal_infos = PersonalInformationModel::select('gender', 'civil_status', 'educational_attainment', 'date_of_birth', 'religion')->get();

        $makatizen_infos = MakatizenRegistryModel::select('social_sector', 'vaccine_status', 'num_household', 'num_families_household', 'yellow_card', 'blue_card', 'white_card', 'makatizen_card', 'philhealth_card')->get();

        $userCount = $personal_infos->count();
        $householdCount = $makatizen_infos->sum('num_household');
        $familiesCount = $makatizen_infos->sum('num_families_household');
        // Gender
        $maleCount = 0;
        $femaleCount = 0;
        $gayCount = 0;
        $lesbianCount = 0;
        $othersCount = 0;
        // Civil Status
        $singleCount = 0;
        $marriedCount = 0;
        $widowedCount = 0;
        $liveinCount = 0;
        $separatedCount = 0;
        $divorcedCount = 0;
        $liveinCount = 0;
        // Religion
        $catholicCount = 0;
        $iglesiaCount = 0;
        $muslimCount = 0;
        $bornagainCount = 0;
        $adventistCount = 0;
        $jehovahCount = 0;
        $mormonsCount = 0;
        $buddhistCount = 0;
        $otherReligionCount = 0;
        // Social Sector
        $naCount = 0;
        $educationCount = 0;
        $healthCount = 0;
        $socialCount = 0;
        $sportsCount = 0;
        // Cards
        $yellowCount = $makatizen_infos->sum('yellow_card');
        $blueCount = $makatizen_infos->sum('blue_card');
        $whiteCount = $makatizen_infos->sum('white_card');
        $makatizenCount = $makatizen_infos->sum('makatizen_card');
        $philhealthCount = $makatizen_infos->sum('philhealth_card');
        // Vaccine
        $singleDoseCount = 0;
        $vaccinatedCount = 0;
        $vaccineExemptCount = 0;
        $unvaccinatedCount = 0;

        $ages = [];
        foreach ($personal_infos as $personalInfo) {
            // Calculate ages based on date_of_birth
            $dob = Carbon::parse($personalInfo->date_of_birth);
            $age = $dob->age;
            $ages[] = $age;

            switch ($personalInfo->gender) {
                case 'Male':
                    $maleCount++;
                    break;
                case 'Female':
                    $femaleCount++;
                    break;
                case 'Gay':
                    $gayCount++;
                    break;
                case 'Lesbian':
                    $lesbianCount++;
                    break;
                case 'Others':
                    $othersCount++;
                    break;
            }

            // Get Civil Status
            switch ($personalInfo->civil_status) {
                case 'Single':
                    $singleCount++;
                    break;
                case 'Married':
                    $marriedCount++;
                    break;
                case 'Widowed':
                    $widowedCount++;
                    break;
                case 'Separated':
                    $separatedCount++;
                    break;
                case 'Divorced':
                    $divorcedCount++;
                    break;
                case 'Live-in':
                    $divorcedCount++;
                    break;
            }

            switch ($personalInfo->religion) {
                case 'Roman Catholic':
                    $catholicCount++;
                    break;
                case 'Iglesia ni Cristo':
                    $iglesiaCount++;
                    break;
                case 'Muslim':
                    $muslimCount++;
                    break;
                case 'Born Again':
                    $bornagainCount++;
                    break;
                case 'Seventh Day Adventist':
                    $adventistCount++;
                    break;
                case 'Saksi ni Jehovah':
                    $jehovahCount++;
                    break;
                case 'Mormons':
                    $mormonsCount++;
                    break;
                case 'Buddhist':
                    $buddhistCount++;
                    break;
                case 'Others':
                    $otherReligionCount++;
                    break;
            }
        }

        foreach ($makatizen_infos as $makatizenInfo) {
            switch ($makatizenInfo->social_sector) {
                case 'NA':
                    $naCount++;
                    break;
                case 'Education':
                    $educationCount++;
                    break;
                case 'Health':
                    $healthCount++;
                    break;
                case 'Social Welfare':
                    $socialCount++;
                    break;
                case 'Sports':
                    $sportsCount++;
                    break;
            }

            switch ($makatizenInfo->vaccine_status) {
                case 'Single Dose':
                    $singleDoseCount++;
                    break;
                case 'Fully Vaccinated':
                    $vaccinatedCount++;
                    break;
                case 'Vaccine Exempt':
                    $vaccineExemptCount++;
                    break;
                case 'Unvaccinated':
                    $unvaccinatedCount++;
                    break;
            }
        }

        return view(
            'admin.charts',
            compact(
                'userCount',
                'householdCount',
                'familiesCount',
                // Gender
                'maleCount',
                'femaleCount',
                'gayCount',
                'lesbianCount',
                'othersCount',
                // Civil Status
                'singleCount',
                'marriedCount',
                'widowedCount',
                'separatedCount',
                'divorcedCount',
                'liveinCount',
                // Religion
                'catholicCount',
                'iglesiaCount',
                'muslimCount',
                'bornagainCount',
                'adventistCount',
                'jehovahCount',
                'mormonsCount',
                'buddhistCount',
                'otherReligionCount',
                // Age
                'ages',
                // Social Sector
                'naCount',
                'educationCount',
                'healthCount',
                'socialCount',
                'sportsCount',
                // Cards
                'yellowCount',
                'blueCount',
                'whiteCount',
                'makatizenCount',
                'philhealthCount',
                // Vaccine
                'singleDoseCount',
                'vaccinatedCount',
                'vaccineExemptCount',
                'unvaccinatedCount'
            )
        );
    }
}