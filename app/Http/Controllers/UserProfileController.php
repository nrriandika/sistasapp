<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;
use Storage;
use Carbon\Carbon;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(Request $request)
    {
        $user = $request->user();
        $userProfile = UserProfile::where("user_id", $user->id)->first();
        return view('User.index', compact('user', 'userProfile'));
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $userProfile = UserProfile::where("user_id", $user->id)->first();
        return view('User.edit', compact('user', 'userProfile'));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $this->validate($request, [
            'avatar_path' => 'image',
            'name' => 'required|string',
            'email' => 'required|string',
            'nip' => 'required|string',
            'telepon' => 'required|string',
            'jabatan' => 'required|string',
            'instansi' => 'required|string',
            'bio' => 'required|string',
        ]);

        $userProfile = UserProfile::where('user_id', $user->id)->first();
        if($userProfile != null){
          $user->name = $request->name;
          $user->email = $request->email;
          $user->save();
          $userProfile->jabatan = $request->jabatan;
          $userProfile->instansi = $request->instansi;
          $userProfile->nip = $request->nip;
          $userProfile->bio = $request->bio;
          $userProfile->telepon = $request->telepon;
          if($request->avatar_path){
            $fileExt = $request->avatar_path->getClientOriginalExtension();
            $file_name = 'avatar_' . $user->id . '.' . $fileExt;
            $storageFile = 'useravatar/' . $file_name;
            Storage::disk('uploads')->put($storageFile, file_get_contents($request->avatar_path));
            $userProfile->avatar_path = asset('uploads/'. $storageFile);
          }
          $userProfile->updated_at = Carbon::now()->format('Y-m-d H:i:s');
          $userProfile->save();
        } else {
          $userProfile = new UserProfile;
          $user->name = $request->name;
          $user->email = $request->email;
          $user->save();
          $userProfile->user_id = $user->id;
          $userProfile->jabatan = $request->jabatan;
          $userProfile->instansi = $request->instansi;
          $userProfile->nip = $request->nip;
          $userProfile->bio = $request->bio;
          $userProfile->telepon = $request->telepon;
          if($request->avatar_path){
            $fileExt = $request->avatar_path->getClientOriginalExtension();
            $file_name = 'avatar_' . $user->id . '.' . $fileExt;
            $storageFile = 'useravatar/' . $file_name;
            Storage::disk('uploads')->put($storageFile, file_get_contents($request->avatar_path));
            $userProfile->avatar_path = asset('uploads/'. $storageFile);
          }
          $userProfile->created_at = Carbon::now()->format('Y-m-d H:i:s');
          $userProfile->updated_at = Carbon::now()->format('Y-m-d H:i:s');
          $userProfile->save();
        }
        return redirect()->route('user_profile');
    }
}
