<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    // in case not login user try to post image
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        // get all followers
        $users = auth()->user()->following()->pluck('profiles.user_id');

        // get all posts by followers
        $postsByFollowers= Post::whereIn('user_id',$users)->get();

        // get all posts of login user
        $postsByUser = Post::where('user_id', auth()->user()->id)->get();

        // merge all posts together
        $posts= $postsByUser->merge($postsByFollowers)->sortByDesc('created_at');

        return view(('posts/index'), compact('posts'));
    }

    //
    public function create() {
        return view('posts/create');
    }

    public function store() {

        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
