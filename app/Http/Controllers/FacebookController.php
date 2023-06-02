<?php

namespace App\Http\Controllers;

use App\Models\FacebookPostsModel;
use Exception;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

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

        // $url = $input['full_picture'];
        // $filename = uniqid(); // Use a unique identifier as the filename

        // $doctype = '';

        // // Download the file from the URL
        // $fileContents = file_get_contents($url);

        // // Create an UploadedFile instance from the downloaded file
        // $tempFilePath = tempnam(sys_get_temp_dir(), 'file');
        // file_put_contents($tempFilePath, $fileContents);
        // $uploadedFile = new \Illuminate\Http\UploadedFile($tempFilePath, $filename);

        // if ($uploadedFile->isValid()) {
        //     $mimeType = $uploadedFile->getMimeType();

        //     if (strpos($mimeType, 'image/') === 0) {
        //         $doctype = '.jpg';
        //     } elseif (strpos($mimeType, 'video/') === 0) {
        //         $doctype = '.mp4';
        //     }
        // }

        // $filename .= $doctype;

        $url = $input['full_picture'];
        // Generate a unique filename for the saved image

        $filename = uniqid() . '.jpg';

        // Fetch the image data from the URL
        $imageData = file_get_contents($url);

        Storage::disk('public')->put('fb_images/' . $filename, $imageData);
        $imagePath = 'storage/fb_images/' . $filename;

        FacebookPostsModel::create([
            'facebook_id' => $input['facebook_id'],
            'title' => $input['title_post'],
            'message' => $input['message'],
            'full_picture' => $imagePath,
            'created_time' => $input['created_time'],
            'permalink_url' => $input['link'],
            'tags' => $input['tags_post'],
            'posted_by' => Auth::user()->name
        ]);

        return redirect()->route('admin.posts')->with('success', 'Facebook post successfuly added!');
    }

    public function deletePost($fb_id)
    {
        $post = FacebookPostsModel::where('facebook_id', $fb_id)->firstOrFail();

        // Delete the associated image file
        $imagePath = $post->full_picture;
        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        $post->delete();

        return redirect()->route('admin.posts')->with('success', 'Facebook post successfuly deleted!');
    }
}