<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create() 
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'post_image' => ['required','image'],
        ]);
            $imagePath = request('post_image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

        Auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'post_image' =>$imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id)->with('success', 'Posts Added');
    }

    public function show(Post $post) 
    {
        return view('posts.show')->with('post',$post);
    }
}
