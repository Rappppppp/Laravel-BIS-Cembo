<?php

namespace App\Http\Controllers;

use Facebook\Facebook;
use App\Models\FacebookPostsModel;
use Exception;
use Illuminate\Http\Request;

class FacebookController extends Controller
{
    public function index()
    {
        // Facebook Graph API
        $fb = new Facebook([
            'app_id' => config('services.facebook.app_id'),
            'app_secret' => config('services.facebook.app_secret'),
            'default_access_token' => config('services.facebook.default_access_token'),
            'default_graph_version' => 'v16.0',
            'http_client_handler' => 'curl',
            'persistent_data_handler' => 'memory',
            'timeout' => 300 // 5 mins
        ]);

        try {
            #permalink_url
            $response = $fb->get('/105924955825559/feed?fields=full_picture,message,created_time,permalink_url');
            $graphEdge = $response->getGraphEdge();
            $posts = $graphEdge->asArray();
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }

        return view('admin.fb_posts', ['posts' => $posts]);
    }

    public function addPosts(Request $input)
    {
        FacebookPostsModel::create([
            'facebook_id' => $input['facebook_id'],
            'message' => $input['message'],
            'full_picture' => $input['full_picture'],
            'created_time' => $input['created_time'],
            'permalink_url' => $input['link']
        ]);

        return redirect()->route('admin.posts')->with('success', 'Facebook post successfuly added!');
    }

    public function deletePost($fb_id)
    {
        $post = FacebookPostsModel::where('facebook_id', $fb_id)->firstOrFail();
        $post->delete();
        return redirect()->route('admin.posts')->with('success', 'Facebook post successfuly deleted!');
    }
}