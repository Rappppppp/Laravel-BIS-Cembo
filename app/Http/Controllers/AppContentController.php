<?php

namespace App\Http\Controllers;

use App\Models\AppContentModel;
use App\Models\BarangayOfficialsModel;
use App\Models\User;
use Illuminate\Http\Request;

class AppContentController extends Controller
{
    public function aboutus_content()
    {
        $addedOfficials = BarangayOfficialsModel::all();
        $officials = User::where('role', '=', 'Barangay Official')->get();

        $introduction = AppContentModel::where('content', 'aboutus_introduction')->select('id', 'html_content')->first();

        $history = AppContentModel::where('content', 'aboutus_history_1')->select('id', 'html_content')->first();

        $history_cont = AppContentModel::where('content', 'aboutus_history_2')->select('id', 'html_content')->first();

        $mission = AppContentModel::where('content', 'aboutus_mission')->select('id', 'html_content')->first();

        $vision = AppContentModel::where('content', 'aboutus_vision')->select('id', 'html_content')->first();

        // Barangay Officials
        $punong_barangay = BarangayOfficialsModel::where('position', 'Punong Barangay')
            ->select('id', 'name', 'position', 'photo')->first();
        $barangay_kagawad = BarangayOfficialsModel::where('position', 'Barangay Kagawad')->get();
        $sk_chairperson = BarangayOfficialsModel::where('position', 'SK Chairperson')
            ->select('id', 'name', 'position', 'photo')->first();
        $sk_kagawad = BarangayOfficialsModel::where('position', 'SK Kagawad')->get();

        return view('user.aboutus', compact('introduction', 'history', 'history_cont', 'mission', 'vision', 'punong_barangay', 'barangay_kagawad', 'sk_chairperson', 'sk_kagawad', 'officials', 'addedOfficials'));
    }

    public function services_content(){
        $health = AppContentModel::where('content', 'services_health')->select('id', 'html_content')->first();
        
        $agriculture = AppContentModel::where('content', 'services_agriculture')->select('id', 'html_content')->first();

        $firedept = AppContentModel::where('content', 'services_firedept')->select('id', 'html_content')->first();

        $maintenance = AppContentModel::where('content', 'services_maintenance')->select('id', 'html_content')->first();

        return view('user.services', compact('health', 'agriculture', 'firedept', 'maintenance'));
    }

    public function addBarangayOfficials(Request $request)
    {
        if ($request['official_name'] == '')
            return redirect()->route('user.aboutus')->with('error', "Error! Please select a Barangay Official!");

        if ($request['official_photo'] == '')
            return redirect()->route('user.aboutus')->with('error', "Null Image!");

        BarangayOfficialsModel::create([
            'name' => $request['official_name'],
            'position' => $request['official_title'],
            'photo' => $request['official_photo']
        ]);

        return redirect()->route('user.aboutus')->with('official_success', "Barangay Official Successfuly Added!");
    }

    public function removeBarangayOfficial($id)
    {
        try {
            BarangayOfficialsModel::destroy($id);
            return redirect()->route('user.aboutus')->with('official_success', 'Barangay Official Successfully Deleted!');
        } catch (\Exception $e) {
            return redirect()->route('user.aboutus')->with('error', 'Error Deleting Barangay Official: ' . $e->getMessage());
        }
    }

    public function update_content(Request $request, $id)
    {
        $content = AppContentModel::findOrFail($id);

        $content->update([
            'html_content' => $request->input('html_content')
        ]);

        return response()->json(['message' => 'Update successful']);
    }
}