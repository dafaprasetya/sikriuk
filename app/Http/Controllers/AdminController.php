<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\EmailAbout;
use App\Models\PhoneAbout;
use App\Models\Product;
use App\Models\ProductKatergori;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    // ABOUTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
    public function index() {
        $about = About::first();
        if (!$about) {
            $about = new About();
            $about->nama = 'Sikriuk';
            $about->deskripsi = 'Inidesc';
            $about->save();
        }
        $email = EmailAbout::where('about_id', $about->id)->get();
        $phone = PhoneAbout::where('about_id', $about->id)->get();
        $data = [
            'title' => 'Admin',
            'about' => $about,
            'email' => $email,
            'phone' => $phone,
        ];
        return view('admin/index', $data);
    }
    public function delPhonenMail(Request $request, $id) {
        $decId = decrypt($id);
        $mail = $request->email;
        $phone = $request->phone;
        if ($mail) {
            $mails = EmailAbout::find($decId);
            $mails->delete();
            return redirect()->back()->with('message', 'Email berhasil dihapus');
        }
        if ($phone) {
            $phones = PhoneAbout::find($decId);
            $phones->delete();
            return redirect()->back()->with('message', 'Nomor HP berhasil dihapus');
        }
    }
    public function editAbout(Request $request, $id) {
        $aboutId = decrypt($id);
        $mail = $request->email;
        $phone = $request->phone;
        if ($mail) {
            $email = new EmailAbout();
            $email->email = $mail;
            $email->about_id = $aboutId;
            $email->save();
            return response()->json([
                'message' => 'Email berhasil ditambahkan',
            ]);
        }
        if ($phone) {
            $phones = new PhoneAbout();
            $phones->phone = $phone;
            $phones->about_id = $aboutId;
            $phones->save();
            return response()->json([
                'message' => 'Nomor Telpon berhasil ditambahkan',
            ]);
        }
        // dd($request->all());
        $validatedData = $request->validate([
            'deskripsi' => 'nullable',
            'lokasi' => 'nullable',
            'moto' => 'nullable',
            'total_mitra' => 'nullable',
        ]);
        $about = About::find($aboutId);
        $about->deskripsi = $validatedData['deskripsi'];
        $about->lokasi = $validatedData['lokasi'];
        $about->moto = $validatedData['moto'];
        $about->total_mitra = $validatedData['total_mitra'];
        $about->save();

        return response()->json([
            'message' => 'Data berhasil diubah',
        ]);
    }
    // ENDOFABOUTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT\
    // PROMOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
    public function promo() {
        $promo = Promo::all();
        $data = [
            'title' => 'Admin Promo',
            'promo' => $promo,
        ];
        return view('admin/promo/index', $data);
    }
    public function createPromo(Request $request) {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable',
        ]);
        $promo = new Promo();
        $promo->nama = $validatedData['nama'];
        $promo->deskripsi = $validatedData['deskripsi'];
        $gambar = $request->file('gambar');
        $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
        $gambar->storeAs('public/promo_image/',$nama_file);
        $promo->gambar = $nama_file;
        $promo->save();
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
        ]);
    }
    public function deletePromo($id) {
        $decId = decrypt($id);
        $promo = Promo::find($decId);
        Storage::delete('public/promo_image/'.$promo->gambar);
        $promo->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');

    }
    // ENDOFPROMOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
    // MENUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU
    public function menu() {
        $menu = Product::all();
        $kategori = ProductKatergori::all();
        $data = [
            'title' => 'Admin Menu',
            'menu' => $menu,
            'kategori' => $kategori,
        ];
        return view('admin/menu/index', $data);
    }
    public function createMenu(Request $request) {
        $menu = new Product();
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable',
            'product_kategori_id' => 'required',
        ]);
        $menu->nama = $validatedData['nama'];
        $menu->harga = $validatedData['harga'];
        $menu->gambar = $validatedData['gambar'];
        $menu->deskripsi = $validatedData['deskripsi'];
        $menu->product_kategori_id = $validatedData['product_kategori_id'];
        $gambar = $request->file('gambar');
        $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
        $gambar->storeAs('public/product_image/',$nama_file);
        $menu->gambar = $nama_file;
        $menu->save();
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'id' => $menu->id,
            'nama' => $menu->nama,
            'harga' => $menu->harga,
            'gambar' => $menu->gambar,
            'deskripsi' => $menu->deskripsi,
            'kategori' => $menu->product_kategori_id,
        ]);
    }
    public function createKategori(Request $request) {
        $kategori = new ProductKatergori();
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        $kategori->nama = $validatedData['nama'];
        $kategori->deskripsi = $validatedData['deskripsi'];
        $kategori->save();
        return redirect()->back()->with('message', 'Data berhasil ditambahkan');
    }
    // ENDOFMENUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU
    public function userProfile() {
        $data = [
            'title' => 'Admin Profile',
        ];
        return view('admin/user/index', $data);
    }
}
