<?php

namespace App\Http\Controllers;

use App\Models\AppContentModel;
use Illuminate\Http\Request;

class AppContentController extends Controller
{
    public function display()
    {
        $introduction = AppContentModel::where('content', 'aboutus_introduction')->pluck('html_content')[0];
        $history = AppContentModel::where('content', 'aboutus_history_1')->pluck('html_content')[0];
        $history_cont = AppContentModel::where('content', 'aboutus_history_2')->pluck('html_content')[0];
        $mission = AppContentModel::where('content', 'aboutus_mission')->pluck('html_content')[0];
        $vision = AppContentModel::where('content', 'aboutus_vision')->pluck('html_content')[0];

        return view('user.aboutus', compact('introduction', 'history', 'history_cont', 'mission', 'vision'));
    }
}