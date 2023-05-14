<?php

namespace App\Http\Controllers;

use App\Models\FacebookPostsModel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $posts = FacebookPostsModel::all();
        return view('user.index', compact('posts'));
    }
}