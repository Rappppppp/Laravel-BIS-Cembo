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
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    // Residents Table
    public function index()
    {
        $users = User::search()
            ->where('role', '!=', 'Admin')
            ->orderBy('name')
            ->get();

        // Get the sum data of number of household, families household and number of users registered.
        $makatizen_infos = MakatizenRegistryModel::select('num_household', 'num_families_household')->get();
        $userCount = PersonalInformationModel::count();
        $householdCount = $makatizen_infos->sum('num_household');
        $familiesCount = $makatizen_infos->sum('num_families_household');
        return view('admin.index', compact('users', 'userCount', 'householdCount', 'familiesCount'));
    }

    public function getUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $information = PersonalInformationModel::where('user_id', $id)->first();
        // $contact = ContactInformationModel::where('user_id', $id)->first();
        // $makatizen = MakatizenRegistryModel::where('user_id', $id)->first();

        $data = [
            'user' => $user,
            'information' => $information,
            // 'contact' => $contact,
            // 'makatizen' => $makatizen,
        ];

        // No view, just ajax request
        if ($request->ajax()) {
            return Response::json($data);
        }

        // return view('admin.edit', compact('user', 'information', 'contact', 'makatizen'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $information = PersonalInformationModel::where('user_id', $id)->first();

        // Check if the fetched data and input data are different
        $isUserDataChanged =
            $user->name !== $request->input('f_name') . " " . $request->input('m_name') . " " . $request->input('l_name');
        $isRoleChanged = $user->role !== $request->input('role');
        $isInformationChanged =
            $information->first_name !== $request->input('f_name') ||
            $information->middle_name !== $request->input('m_name') ||
            $information->last_name !== $request->input('l_name') ||
            $information->civil_status !== $request->input('civil_status') ||
            $information->religion !== $request->input('religion') ||
            $information->educational_attainment !== $request->input('educational_attainment');

        if ($isUserDataChanged || $isRoleChanged || $isInformationChanged) {
            $user->update([
                'name' => $request->input('f_name') . " " . $request->input('m_name') . " " . $request->input('l_name'),
                'role' => $request->input('role')
            ]);

            $information->update([
                'first_name' => $request->input('f_name'),
                'middle_name' => $request->input('m_name'),
                'last_name' => $request->input('l_name'),
                'civil_status' => $request->input('civil_status'),
                'religion' => $request->input('religion'),
                'educational_attainment' => $request->input('educational_attainment'),
            ]);

            return redirect()->back()->with('success', 'User updated successfully');
        } else {
            return redirect()->back()->with('info', 'No changes made');
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        $information = PersonalInformationModel::where('user_id', $id)->first();
        $contact = ContactInformationModel::where('user_id', $id)->first();
        $makatizen = MakatizenRegistryModel::where('user_id', $id)->first();
        return view('admin.show', compact('user', 'information', 'contact', 'makatizen'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function documentRequests()
    {
        $requests = DocumentModel::with('user')->orderBy('created_at', 'desc')->get();
        $user = $requests->map(function ($document) {
            $user = User::find($document->user_id);
            $document->username = $user ? $user->name : '';
            $document->barangay_id = $user ? $user->barangay_id : '';
            return $document;
        });
        return view('admin.document_requests', compact('requests'));
    }

    public function documentShow($document_type, $document_id, $barangay_id)
    {
        $user = User::where('barangay_id', $barangay_id)->first();
        $user_id = $user->id;
        $information = PersonalInformationModel::where('user_id', $user_id)->first();
        $makatizen = MakatizenRegistryModel::where('user_id', $user_id)->first();
        $contact = ContactInformationModel::where('user_id', $user_id)->first();
        $document = DocumentModel::join('users', 'users.id', '=', 'document_requests.user_id')
            ->select('document_requests.*', 'users.name')
            ->find($document_id, $barangay_id);

        if ($document_type == 'Barangay-ID') {
            return view('admin.document_barangay_id', compact('user', 'information', 'contact', 'makatizen', 'document'));
        } else if ($document_type == 'Indigency') {
            return view('admin.document_indigency', compact('user', 'contact', 'document'));
        }
    }

    public function complaintShow($id)
    {
        $complaint = ComplaintModel::join('users', 'users.id', '=', 'complaints.user_id')
            ->select('complaints.*', 'users.name')
            ->find($id);
        return view('admin.complaint_show')->with('request', $complaint);
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
        return view('admin.complaint_requests', compact('requests'));
    }

    public function content()
    {
        return view('admin.contents');
    }

    public function complaint()
    {
        $mailData = ([
            'name' => '[Name]',
            'complaint' => '[Complaint]',
            'approvedDate' => '2000-01-01 00:00:00',
            'approvedBy' => '[Approved By]'

        ]);
        return view('emails.complaintApproved', compact('mailData'));
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
                case 'Fully vaccinated':
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