<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\CalonMitra;
use App\Models\Faq;
use App\Models\Kemitraan;
use App\Models\KeunggulanMitra;
use App\Models\LokasiMitra;
use App\Models\Pencapaian;
use App\Models\Product;
use App\Models\ProductKatergori;
use App\Models\Promo;
use App\Models\ProposalKemitraan;
use App\Models\StepKemitraan;
use App\Models\SyaratMitra;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // $lokasi = LokasiMitra::all();
        $this->data =[
            'promo' => $promo,
            'about' => $about,
            'menu' => $menu,
            'katmenu' => $menukategori,
            'keunggulan' => $keunggulan,
            'kemitraan' => $kemitraan,
            // 'lokasi' => $lokasi,
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
        $lokasi = LokasiMitra::paginate(20);
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
            'lokasi' => $lokasi,
            'faq' => $faq,
        ];
        return view('main.index',$data);
    }
    public function dummyCalonMitra() {
        return view('admin.calonmitra.dummy');
    }
    public function sendCalonMitra(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'lokasi' => 'required',
            'kota' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $calon = new CalonMitra();
        $calon->nama = $request->nama;
        $calon->nik = $request->nik;
        $calon->email = $request->email;
        $calon->phone = $request->phone;
        $calon->lokasi = $request->lokasi;
        $calon->kota = $request->kota;
        $calon->save();

        return redirect()->back()->with('success', 'Data Calon Mitra Berhasil Dikirim');
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
    public function kemitraan() {
        $gerobak = Kemitraan::all();
        $faq = Faq::all();
        $syarat = SyaratMitra::all();
        $proposal = ProposalKemitraan::first();
        $data = [
            'gerobak' => $gerobak,
            'faq' => $faq,
            'syarat' => $syarat,
            'proposal' => $proposal,
        ];
        return view('main.kemitraan.index', $this->data, $data);
    }
    public function profile() {
        $gerobak = Kemitraan::all();
        $faq = Faq::all();
        $syarat = SyaratMitra::all();
        $proposal = ProposalKemitraan::first();
        $pencapaian = Pencapaian::all();
        $data = [
            'gerobak' => $gerobak,
            'faq' => $faq,
            'syarat' => $syarat,
            'proposal' => $proposal,
            'pencapaian' => $pencapaian,
        ];
        return view('main.profile.index', $this->data, $data);
    }
    public function menu() {
        $menu = Product::all();
        $menukategori = ProductKatergori::all();
        $lokasi = LokasiMitra::paginate(50);


        $data = [
            'menu'=>$menu,
            'katmenu' => $menukategori,
            'lokasi' => $lokasi,

        ];
        return view('main.menu.index', $this->data, $data);
    }
    public function blog(Request $request) {
        $blog = Blog::orderBy('created_at', 'desc')->paginate(10);
        $search = $request->search;
        $data = [
            'blog'=>$blog,
            'search'=>$search,
        ];
        if ($search) {
            $data = [
                'blog' => Blog::where("title","LIKE","%{$search}%")->orderBy('created_at', 'desc')->paginate(10)->appends(['search' => $search]),
                'search'=>$search,
            ];
        }
        return view('main.blog.index', $this->data, $data);
    }
    public function lokasi(Request $request) {
        $search = $request->search;
        $lokasi = LokasiMitra::all();
        if ($search) {
            $lokasi = LokasiMitra::where('kota', 'LIKE', "%{$search}%")
            ->orWhere("nama","LIKE","%{$search}%")
            ->orWhere("latitude","LIKE", "%{$search}%")
            ->orWhere("longitude","LIKE", "%{$search}%")
            ->orWhere("kota","LIKE", "%{$search}%")->get();
            $data = [
                'lokasi'=>$lokasi,
                'search'=>$search,
            ];
            // dd($lokasi);
        }else{
            $data = [
                'lokasi'=>$lokasi,
                'search'=>$search,
            ];
        }
        return view('main.lokasi.index', $this->data, $data);
    }
}
