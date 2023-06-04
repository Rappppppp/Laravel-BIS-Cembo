<?php

namespace App\Http\Controllers;

use App\Models\AppContentModel;
use App\Models\BarangayOfficialsModel;
use Illuminate\Http\Request;

class AppContentController extends Controller
{
    public function aboutus_content()
    {
        $introduction = AppContentModel::where('content', 'aboutus_introduction')->select('id', 'html_content')->first();

        $history = AppContentModel::where('content', 'aboutus_history_1')->select('id', 'html_content')->first();

        $history_cont = AppContentModel::where('content', 'aboutus_history_2')->select('id', 'html_content')->first();

        $mission = AppContentModel::where('content', 'aboutus_mission')->select('id', 'html_content')->first();

        $vision = AppContentModel::where('content', 'aboutus_vision')->select('id', 'html_content')->first();

        // Barangay Officials
        $punong_barangay = BarangayOfficialsModel::where('position', 'Punong Barangay')
            ->select('name', 'position', 'photo')->first();
        $barangay_kagawad = BarangayOfficialsModel::where('position', 'Barangay Kagawad')->get();
        $sk_chairperson = BarangayOfficialsModel::where('position', 'SK Chairperson')
            ->select('name', 'position', 'photo')->first();
        $sk_kagawad = BarangayOfficialsModel::where('position', 'SK Kagawad')->get();

        return view('user.aboutus', compact('introduction', 'history', 'history_cont', 'mission', 'vision', 'punong_barangay', 'barangay_kagawad', 'sk_chairperson', 'sk_kagawad'));
    }

    public function aboutus_update_content(Request $request, $id)
    {
        $content = AppContentModel::findOrFail($id);

        $content->update([
            'html_content' => $request->input('html_content')
        ]);

        return response()->json(['message' => 'Update successful']);
    }
}