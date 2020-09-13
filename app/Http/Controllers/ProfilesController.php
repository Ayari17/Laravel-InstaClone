<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($userId)
    {
        $user = User::findOrFail($userId);

        $follows = (auth()->user()) ? auth()->user()->following->contains($userId) : false;

        $postsCount = Cache::remember('count.posts'.$user->id,now()->addMinutes(2),function () use ($user){
            return $user->posts->count();
        });
        $followersCount = Cache::remember('count.followers'.$user->id,now()->addMinutes(2),function () use ($user){
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember('count.following'.$user->id,now()->addMinutes(2),function () use ($user){
            return $user->following->count();
        });

        /*$postsCount = $user->posts->count();*/
        /*$followersCount = $user->profile->followers->count();*/
        /*$followingCount = $user->following->count();*/

        return view('profiles.index',compact(
            'user' , 'follows', 'postsCount','followersCount','followingCount'
        ));
    }

    public function edit(User $user){

        $this->authorize('update',$user->profile);

        return view('profiles.edit',compact('user'));
    }

    public function update(User $user){

        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=> 'url',
            'image'=>['image']
        ]);



        if(request('image')){
            $imagePath = request('image')->store('uploads','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            auth()->user()->profile()->update(array_merge(
                $data,['image'=>$imagePath]
            ));
        }

        else auth()->user()->profile()->update($data);


        return redirect("/profile/{$user->id}");

    }

}
