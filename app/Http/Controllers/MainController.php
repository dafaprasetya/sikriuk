<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\CalonMitra;
use App\Models\Faq;
use App\Models\Kemitraan;
use App\Models\KeunggulanMitra;
use App\Models\Product;
use App\Models\ProductKatergori;
use App\Models\Promo;
use App\Models\StepKemitraan;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $data;
    public function __construct()
    {
        $promo = Promo::all();
        $about = About::first();
        $menu = Product::all();
        $menukategori = ProductKatergori::all();
        $keunggulan = KeunggulanMitra::all();
        $kemitraan = Kemitraan::all();
        $testimoni = Testimonial::all();
        $langkah = StepKemitraan::orderBy('nomor')->get();
        $this->data =[
            'promo' => $promo,
            'about' => $about,
            'menu' => $menu,
            'katmenu' => $menukategori,
            'keunggulan' => $keunggulan,
            'kemitraan' => $kemitraan,
            'langkah' => $langkah,
            'testimoni' => $testimoni,
        ];
    }
    public function index() {
        $promo = Promo::all();
        $about = About::first();
        $menu = Product::all();
        $menukategori = ProductKatergori::all();
        $keunggulan = KeunggulanMitra::all();
        $kemitraan = Kemitraan::all();
        $testimoni = Testimonial::all();
        $faq = Faq::all();
        $langkah = StepKemitraan::orderBy('nomor')->get();
        $listblog = Blog::orderBy('created_at', 'desc')->paginate(3);
        $data =[
            'promo' => $promo,
            'about' => $about,
            'menu' => $menu,
            'katmenu' => $menukategori,
            'keunggulan' => $keunggulan,
            'kemitraan' => $kemitraan,
            'langkah' => $langkah,
            'testimoni' => $testimoni,
            'blog' => $listblog,
            'faq' => $faq,
        ];
        return view('main.index',$data);
    }
    public function dummyCalonMitra() {
        return view('admin.calonmitra.dummy');
    }
    public function sendCalonMitra(Request $request) {
        $calon = new CalonMitra();
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'lokasi' => 'required',
            'kota' => 'required',
        ]);
        $calon->nama = $request->nama;
        $calon->nik = $request->nik;
        $calon->email = $request->email;
        $calon->phone = $request->phone;
        $calon->lokasi = $request->lokasi;
        $calon->kota = $request->kota;
        $calon->save();
        return redirect()->back()->with('success','Data Calon Mitra Berhasil Dikirim');
    }
    public function blogDetail($slug) {
        $blog = Blog::where('slug', $slug)->first();
        $listblog = Blog::orderBy('created_at', 'desc')->paginate(3);
        $data = [
            'title' => 'Blog | '.$blog->title,
            'blog' => $blog,
            'listblog' => $listblog,
        ];
        return view('main.blog.detail',$this->data, $data);
    }
}
