<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EditUserController extends Controller
{
    public function editUser($id, Request $request)
    {
        $userId = decrypt($id);
        $user = User::find($userId);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|numeric',
            'bio' => 'nullable',
            'picture' => 'nullable|file|image|mimes:jpeg,png,jpg|max:6148',
        ]);
        // dd($validatedData);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->bio = $validatedData['bio'];
        $pp = $request->file('picture');
        if($pp){
            Storage::delete('public/profile_picture/' . $user->picture);
            $nama_file = str_replace(" ", "_", $validatedData['name']).time().'.'.$pp->extension();
            $pp->storeAs('public/profile_picture/',$nama_file);
            $user->picture = $nama_file;
        }
        $user->save();
        return redirect()->route('userprofile')->with('success','Profile berhasil diupdate');
    }
    public function editPassword($id, Request $request) {
        $userId = decrypt($id);
        $user = User::find($userId);
        $validatedData = $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        return redirect()->route('userprofile')->with('success','Password berhasil diupdate');
    }
}
