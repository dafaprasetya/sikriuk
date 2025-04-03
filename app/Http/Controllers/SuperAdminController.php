<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AccessToken;
use App\Models\BenefitKemitraan;
use Illuminate\Support\Facades\Hash;
use App\Models\CalonMitra;
use App\Models\EmailAbout;
use App\Models\Kemitraan;
use App\Models\KeunggulanMitra;
use App\Models\Pencapaian;
use App\Models\PhoneAbout;
use App\Models\Product;
use App\Models\ProductKatergori;
use App\Models\Promo;
use App\Models\SosmedAbout;
use App\Models\StepKemitraan;
use App\Models\LokasiMitra;
use App\Models\SyaratMitra;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\ProposalKemitraan;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class SuperAdminController extends Controller
{
    protected $data;
    public function __construct()
    {
        $this->middleware('role:admin');
        $total = CalonMitra::all()->count();
        $read = CalonMitra::where('status', 'read')->count();
        $unread = CalonMitra::where('status', 'unread')->count();
        $this->data = [
            'total' => $total,
            'read' => $read,
            'unread' => $unread,
        ];
    }
    public function listuser(){
        $user = User::all();
        $data = [
            'title'=>'Admin List User',
            'user'=>$user,
        ];
        return view('admin.user.list', $this->data, $data);
    }
    public function deleteUser($id){
        $user = User::find(decrypt($id));
        $user->delete();
        Storage::delete('public/profile_picture/' . $user->picture);
        return redirect()->back()->with('success', 'User berhasil dihapus');

    }
    public function createUser(Request $request)
    {
        $user = new User();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|numeric|unique:users,phone',
            'bio' => 'nullable',
            'password' => 'require|min:8|confirmed',
            'picture' => 'nullable|file|image|mimes:jpeg,png,jpg|max:6148',
        ]);
        // dd($validatedData);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->bio = $validatedData['bio'];
        $user->password = $validatedData['password'];
        $pp = $request->file('picture');
        Storage::delete('public/profile_picture/' . $user->picture);
        $nama_file = str_replace(" ", "_", $validatedData['name']).time().'.'.$pp->extension();
        $pp->storeAs('public/profile_picture/',$nama_file);
        $user->picture = $nama_file;
        $user->save();
        return redirect()->route('userprofile')->with('success','Profile berhasil diupdate');
    }
    public function editUser($id, Request $request)
    {
        $userId = decrypt($id);
        $user = User::find($userId);
        $validatedData = $request->validate([
            'role' => 'required|max:255',
            'password' => 'nullable',
        ]);
        $password = $request->password;
        if($password){
            $user->password = Hash::make($password);
        }
        // dd($validatedData);
        $user->role = $validatedData['role'];
        $user->save();
        return redirect()->back()->with('success','Profile berhasil diupdate');
    }
    public function tokenAction(Request $request){
        $token = AccessToken::first();
        $data = [
            'title' => 'Admin Akses Token',
            'token' => $token,
        ];
        return view('admin.token.index', $this->data, $data);
    }
    public function editToken(Request $request){
        $token = AccessToken::first();
        $validatedData = $request->validate([
            'token' => 'required|min:8'
        ]);
        $token->token = $validatedData['token'];
        $token->save();
        return response()->json([
            'success'=>'token berhasil diubah',
            'token'=>$token->token,
        ]);
    }
}
