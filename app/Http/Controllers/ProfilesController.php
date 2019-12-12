<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    // public function index($user)
    // {
    //     $user = User::findOrFail($user);
    //     return view('profiles.index', ['user'=> $user]);
    // }

    public function index(User $user) //using route model binding
    {
       
        return view('profiles.index', ['user'=> $user]);
    }

    public function edit (User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit')->with('user', $user);
    }

    public function update (User $user)
     {
        $this->authorize('update', $user->profile);
         $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'profile_image' => ''
         ]);
            if (request('profile_image')){
                $imagePath = request('profile_image')->store('profile', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
                $image->save();
            }
            // dd(array_merge(
            //     $data,
            //     ['profile_image' => $imagePath]));
            auth()->user()->profile()->update(array_merge(
                $data,
                ['profile_image' => $imagePath]
                // 'title' => $data['title'],
                // 'description' => $data['title'],
                // 'url' => $data['title'],
                // 'profile_image' => $imagePath,
             ) );

         return redirect('/profile/' . auth()->user()->id)->with('success', 'Profile Updated Successfully');
         // return view('profiles.edit')->with('user', $user);
     }

    // public function update(Request $request, $id)
    // {
    //     // $this->authorize('update', $user->profile);

    //     $this->validate($request, [
    //         'title' => 'required',
    //         'description' => 'required',
    //         'url' => 'url'
    //     ]);
    //     auth()->user = User::find($id);
    //     auth()->user->profile->title = $request->input('title');
    //     auth()->user->profile->description = $request->input('description');
    //     auth()->user->profile->url = $request->input('url');
    //     auth()->user->profile->save();

    //     return redirect('/profile/' . auth()->user()->id)->with('success', 'Profile Updated Successfully');
    // }
}
