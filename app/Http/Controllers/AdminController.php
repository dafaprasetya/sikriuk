<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\BenefitKemitraan;
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
use App\Models\SyaratMitra;
use App\Models\Testimonial;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    protected $data;
    public function __construct()
    {
        $total = CalonMitra::all()->count();
        $read = CalonMitra::where('status', 'read')->count();
        $unread = CalonMitra::where('status', 'unread')->count();
        $this->data = [
            'total' => $total,
            'read' => $read,
            'unread' => $unread,
        ];
    }
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
        $sosmed = SosmedAbout::where('about_id', $about->id)->get();
        $data = [
            'title' => 'Admin',
            'about' => $about,
            'email' => $email,
            'phone' => $phone,
            'sosmed' => $sosmed,
        ];
        return view('admin/index', $this->data, $data);
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
        $sosmed = $request->sosmed;
        if ($mail) {
            $email = new EmailAbout();
            $email->email = $mail;
            $email->about_id = $aboutId;
            $email->save();
            return response()->json([
                'success' => 'Email berhasil ditambahkan',
            ]);
        }
        if ($sosmed) {
            $sosmed = new SosmedAbout();
            $sosmed->nama = $sosmed;
            $sosmed->logo = $request->logo;
            $sosmed->links = $request->link;
            $sosmed->save();
            return response()->json([
                'success' => 'Email berhasil ditambahkan',
                'nama' => $sosmed->nama,
                'logo' => $sosmed->logo,
                'link' => $sosmed->link,
            ]);
        }
        if ($phone) {
            $phones = new PhoneAbout();
            $phones->phone = $phone;
            $phones->about_id = $aboutId;
            $phones->save();
            return response()->json([
                'success' => 'Nomor Telpon berhasil ditambahkan',
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
            'success' => 'Data berhasil diubah',
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
        return view('admin/promo/index',$this->data, $data);
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
            'success' => 'Data berhasil ditambahkan',
            'nama' => $promo->nama,
            'deskripsi' => $promo->deskripsi,
            'gambar' => $promo->gambar,
            'gambar' => $promo->gambar,
            
        ]);
    }
    public function deletePromo($id) {
        $decId = decrypt($id);
        $promo = Promo::find($decId);
        Storage::delete('public/promo_image/'.$promo->gambar);
        $promo->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');

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
        return view('admin/menu/index',$this->data, $data);
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
    public function updateMenu(Request $request, $id) {
        $ids = decrypt($id);
        $menu = Product::find($ids);
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
        if ($gambar) {
            Storage::delete('public/product_image/'.$menu->gambar);
            $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
            $gambar->storeAs('public/product_image/',$nama_file);
            $menu->gambar = $nama_file;
        }
        $menu->save();
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    
    public function createKategori(Request $request) {
        $kategori = new ProductKatergori();
        $validatedData = $request->validate([
            'nama' => 'required|unique:product_katergoris,nama',
            'deskripsi' => 'required',
        ]);
        $kategori->nama = $validatedData['nama'];
        $kategori->deskripsi = $validatedData['deskripsi'];
        $kategori->save();
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'id' => $kategori->id,
            'nama' => $kategori->nama,
            'deskripsi' => $kategori->deskripsi,
        ]);
    }
    // ENDOFMENUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU
    // PENCAPAIANNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN??
    public function pencapaian() {
        $pencapaian = Pencapaian::all();
        $data = [
            'title' => 'Admin Pencapaian',
            'pencapaian' => $pencapaian,
        ];
        return view('admin.pencapaian.index',$this->data, $data);
    }
    public function createPencapaian(Request $request) {
        $pencapaian = new Pencapaian();
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable',
        ]);
        $pencapaian->nama = $validatedData['nama'];
        $pencapaian->deskripsi = $validatedData['deskripsi'];
        $gambar = $request->file('gambar');
        $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
        $gambar->storeAs('public/pencapaian_image/',$nama_file);
        $pencapaian->gambar = $nama_file;
        $pencapaian->save();
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'id' => $pencapaian->id,
            'nama' => $pencapaian->nama,
            'deskripsi' => $pencapaian->deskripsi,
            'gambar' => $pencapaian->gambar,
        ]);
    }
    public function updatePencapaian(Request $request, $id) {
        $ids = decrypt($id);
        $pencapaian = Pencapaian::find($ids);
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable',
        ]);
        $pencapaian->nama = $validatedData['nama'];
        $pencapaian->deskripsi = $validatedData['deskripsi'];
        $gambar = $request->file('gambar');
        if ($gambar) {
            Storage::delete('public/pencapaian_image/'.$pencapaian->gambar);
            $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
            $gambar->storeAs('public/pencapaian_image/',$nama_file);
            $pencapaian->gambar = $nama_file;
        }
        $pencapaian->save();
        return redirect()->back()->with('success','Data Berhasil Diubah');
    }
    public function deletePencapaian($id){
        $ids = decrypt($id);
        $pencapaian = Pencapaian::find($ids);
        Storage::delete('public/pencapaian_image/'.$pencapaian->gambar);
        $pencapaian->delete();
        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
    // ENDOFPENCAPAIANNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN??
    // CALONMITRAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
    public function calonMitra(Request $request) {
        $search = $request->search;
        $calon = CalonMitra::orderBy('created_at', 'desc')->paginate(10);
        $linkread = $request->linkread;
        $linkunread = $request->linkunread;
        $linkall = $request->linkall;
        $total = CalonMitra::all()->count();
        $read = CalonMitra::where('status', 'read')->count();
        $unread = CalonMitra::where('status', 'unread')->count();
        $data = [
            'title' => 'Admin Calon Mitra',
            'calon' => $calon,
            'total' => $total,
            'read' => $read,
            'unread' => $unread,
            'linkread' => $linkread,
            'linkunread' => $linkunread,
            'linkall' => $linkall,
        ];
        if ($linkall) {
            $data = [
                'title' => 'Admin Calon Mitra',
                'calon' => $calon,
                'total' => $total,
                'read' => $read,
                'unread' => $unread,
                'linkread' => $linkread,
                'linkunread' => $linkunread,
                'linkall' => $linkall,
            ];
        }
        if ($linkunread) {
            $data = [
                'title' => 'Admin Calon Mitra',
                'calon' => CalonMitra::where('status', 'unread')->orderBy('created_at', 'desc')->paginate(10),
                'total' => $total,
                'read' => $read,
                'unread' => $unread,
                'linkread' => $linkread,
                'linkunread' => $linkunread,
                'linkall' => $linkall,
            ];
        }
        if ($linkread) {
            $data = [
                'title' => 'Admin Calon Mitra',
                'calon' => CalonMitra::where('status', 'read')->orderBy('created_at', 'desc')->paginate(10),
                'total' => $total,
                'read' => $read,
                'unread' => $unread,
                'linkread' => $linkread,
                'linkunread' => $linkunread,
                'linkall' => $linkall,
            ];
        }
        if ($search) {
            $calon = CalonMitra::where("nama","LIKE","%{$search}%")
                    ->orWhere("email","LIKE","%{$search}%")
                    ->orWhere("phone","LIKE", "%{$search}%")
                    ->orWhere("nik","LIKE", "%{$search}%")
                    ->orWhere("lokasi","LIKE", "%{$search}%")
                    ->orWhere("status","LIKE", "%{$search}%")
                    ->orWhere("readby","LIKE", "%{$search}%")
                    ->orWhere("kota","LIKE", "%{$search}%")->orderBy('created_at', 'desc')->paginate(10)->appends(['search' => $search]);
            $data = [
                'title' => 'Admin Calon Mitra',
                'calon' => $calon,
                'total' => $total,
                'read' => $read,
                'unread' => $unread,
                'linkread' => $linkread,
                'linkunread' => $linkunread,
                'linkall' => $linkall,
            ];
        }
        return view('admin/calonmitra/index',$this->data, $data);
        
    }
    public function detailCalonMitra($id) {
        $ids = decrypt($id);
        $calon = CalonMitra::find($ids);
        if (str_starts_with($calon->phone, "0")) {
            $phone = "62" . substr($calon->phone, 1);
        }else{
            $phone = $calon->phone;
        }
        $url = 'https://wa.me/'.$phone;

        $data = [
            'title' => 'Admin Calon Mitra',
            'calon' => $calon,
            'wa' => $url,
        ];
        return view('admin/calonmitra/detail',$this->data, $data);
        
    }
    public function editCalonMitra($id) {
        $calon = CalonMitra::find($id);
        $calon->status = 'read';
        $calon->readby = Auth::user()->name;
        if (str_starts_with($calon->phone, "0")) {
            $phone = "62" . substr($calon->phone, 1);
        }else{
            $phone = $calon->phone;
        }
        $url = 'https://wa.me/'.$phone;
        $calon->save();
        return response()->json([
            'success' => 'Data berhasil diubah',
            'status' => $calon->status,
            'readby' => $calon->readby,
            'url' => $url,
        ]);
    }
    public function deleteCalonMitra($id) {
        $ids = decrypt($id);
        $calon = CalonMitra::find($ids);
        $calon->delete();
        return redirect()->route('calonMitra')->with('success', 'Data berhasil dihapus');
    }
    // ENDOFECALONMITRAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
    // GEROBAKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK
    public function gerobak(Request $request) {
        $gerobak = Kemitraan::all();
        $benefit = BenefitKemitraan::all();
        $data = [
            'title' => 'Admin Gerobak',
            'gerobak' => $gerobak,
            'benefit' => $benefit,
        ];
        if ($request->search) {
            $gerobak = Kemitraan::where("nama","LIKE","%{$request->search}%")
                    ->orWhere("harga","LIKE","%{$request->search}%")
                    ->orWhere("deskripsi","LIKE", "%{$request->search}%")->paginate(10)->appends(['search' => $request->search]);
            $data = [
                'title' => 'Admin Gerobak',
                'gerobak' => $gerobak,
                'benefit' => $benefit,
                'search' => $request->search,
            ];
        }
        return view('admin/gerobak/index',$this->data, $data);
    }

    public function createGerobak(Request $request){
        $gerobak = new Kemitraan();
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable',
        ]);
        $gerobak->nama = $validatedData['nama'];
        $gerobak->harga = $validatedData['harga'];
        $gerobak->deskripsi = $validatedData['deskripsi'];
        $gambar = $request->file('gambar');
        $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
        $gambar->storeAs('public/gerobak_image/', $nama_file);
        $gerobak->gambar = $nama_file;
        $gerobak->save();
        return response()->json([
            'success' => 'Data Berhasil Ditambahkan',
            'id' => $gerobak->id,
            'nama' => $gerobak->nama,
            'harga' => $gerobak->harga,
            'deskripsi' => $gerobak->deskripsi,
            'gambar' => $gerobak->gambar,
        ]);
    }
    public function createBenefitGerobak(Request $request) {
        $benefit = new BenefitKemitraan();
        $validatedData = $request->validate([
            'benefit' => 'required',
            'kemitraan_id' => 'required',
        ]);
        $benefit->benefit = $validatedData['benefit'];
        $benefit->kemitraan_id = $validatedData['kemitraan_id'];
        $benefit->save();
        return response()->json([
            'success' => 'Data Berhasil Ditambahkan',
            'idbenefit' => $benefit->id,
            'benefit' => $benefit->benefit,
            'kemtiraan_id' => $benefit->kemitraan_id,
        ]);
    }
    public function editGerobak(Request $request, $id) {
        $gerobak = Kemitraan::find(decrypt($id));
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable',
        ]);
        $gerobak->nama = $validatedData['nama'];
        $gerobak->harga = $validatedData['harga'];
        $gerobak->deskripsi = $validatedData['deskripsi'];
        $gambar = $request->file('gambar');
        if ($gambar) {
            Storage::delete('public/gerobak_image/'.$gerobak->gambar);
            $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
            $gambar->storeAs('public/gerobak_image/',$nama_file);
            $gerobak->gambar = $nama_file;
        }
        $gerobak->save();
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    public function deleteGerobak($id) {
        $gerobak = Kemitraan::find($id);
        Storage::delete('public/gerobak_image/'.$gerobak->gambar);
        $gerobak->delete();
        return redirect()->back()->with(['success' => 'data berhasil dihapus']);
    }
    public function deleteBenefit(Request $request) {
        $benefit = BenefitKemitraan::find($request->id);
        $benefit->delete();
        return response()->json([
            'success' => 'Data berhasil dihapus',
        ]);
        
    }
    // ENDOFGEROBAKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK
    // STEPBYSTEPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP
    public function stepByStep(Request $request) {
        $step = StepKemitraan::all();
        $data = [
            'title'=>'Admin Step By Step',
            'step' => $step,
        ];
        return view('admin/step/index', $this->data, $data);
    }
    public function createStepByStep(Request $request) {
        $validatedData = $request->validate([
            'nomor' => 'required|unique:step_kemitraans,nomor',
            'nama' => 'required',
            'gambar' => 'nullable',
        ]);
        $step = new StepKemitraan();
        $step->nomor = $validatedData['nomor'];
        $step->nama = $validatedData['nama'];
        $gambar = $request->file('gambar');
        if(!$gambar) {
            $step->gambar = 'default.jpg';
        }
        $nama_file = str_replace(" ","_",$validatedData['nama']).time().$validatedData['nomor'].'.'.$gambar->extension();
        $gambar->storeAs('public/step_image/',$nama_file);
        $step->gambar = $nama_file;
        $step->save();
        return response()->json([
            'success' => 'Data berhasil ditambahkan',
            'id' => $step->id,
            'nomor' => $step->nomor,
            'nama' => $step->nama,
            'gambar' => $step->gambar,
        ]);
    }
    public function editStepByStep(Request $request, $id) {
        $validatedData = $request->validate([
            'nomor' => 'required|unique:step_kemitraans,nomor',
            'nama' => 'required',
            'gambar' => 'nullable',
        ]);
        $step = StepKemitraan::find(decrypt($id));
        $step->nomor = $validatedData['nomor'];
        $step->nama = $validatedData['nama'];
        $gambar = $request->file('gambar');
        if($gambar) {
            Storage::delete('public/step_image/'.$step->gambar);
            $nama_file = str_replace(" ","_",$validatedData['nama']).time().$validatedData['nomor'].'.'.$gambar->extension();
            $gambar->storeAs('public/step_image/',$nama_file);
            $step->gambar = $nama_file;
        }
        $step->save();
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    public function deleteStepByStep(Request $request, $id) {
        $step = StepKemitraan::find($id);
        $step->delete();
        Storage::delete('public/step_image/'.$step->gambar);
        return response()->json([
            'success' => 'data berhasil dihapus',
        ]);
    }
    // ENDOFSTEPBYSTEPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP
    // TESTIMONIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
    public function testimoni(Request $request) {
        $testimoni = Testimonial::all();
        $data = [
            'title' => 'Admin Testimoni',
            'testimoni' => $testimoni,
        ];
        return view('admin/testimoni/index',$this->data, $data);
    }
    public function createTestimoni(Request $request) {
        $testimoni = new Testimonial();
        $validatedData = $request->validate([
            'nama' => 'required',
            'pekerjaan' => 'required',
            'kata' => 'required',
            'foto' => 'nullable',
        ]);
        $testimoni->nama = $validatedData['nama'];
        $testimoni->pekerjaan = $validatedData['pekerjaan'];
        $testimoni->kata = $validatedData['kata'];
        $gambar = $request->file('foto');
        $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
        $gambar->storeAs('public/testimoni_image/',$nama_file);
        $testimoni->foto = $nama_file;
        $testimoni->save();
        return response()->json([
            'success' => 'Data berhasil ditambahkan',
            'id' => $testimoni->id,
            'nama' => $testimoni->nama,
            'kata' => $testimoni->kata,
            'foto' => $testimoni->foto,
        ]);
    }
    public function editTestimoni(Request $request, $id) {
        $validatedData = $request->validate([
            'nama' => 'required',
            'pekerjaan' => 'required',
            'kata' => 'required',
            'foto' => 'nullable',
        ]);
        $testimoni = Testimonial::find(decrypt($id));
        $testimoni->nama = $validatedData['nama'];
        $testimoni->pekerjaan = $validatedData['pekerjaan'];
        $testimoni->kata = $validatedData['kata'];
        $gambar = $request->file('foto');
        if ($gambar) {
            Storage::delete('public/testimoni_image/'. $testimoni->foto);
            $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
            $gambar->storeAs('public/testimoni_image/',$nama_file);
            $testimoni->foto = $nama_file;
        }
        $testimoni->save();
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    public function deleteTestimoni(Request $request, $id) {
        $testimoni = Testimonial::find(decrypt($id));
        Storage::delete('public/testimoni_image/'. $testimoni->foto);
        $testimoni->delete();
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    // ENDOFTESTIMONIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
    // KEUNGGULANNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
    public function keunggulan(Request $request) {
        $keunggulan = KeunggulanMitra::all();
        $data = [
            'title' => 'Admin Keunggulan',
            'keunggulan' => $keunggulan,
        ];
        return view('admin/keunggulan/index',$this->data, $data);
    }
    public function createKeunggulan(Request $request) {
        $keunggulan = new KeunggulanMitra();
        $validatedData = $request->validate([
            'nomor' => 'required|integer',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        $keunggulan->nomor = $validatedData['nomor'];
        $keunggulan->nama = $validatedData['nama'];
        $keunggulan->deskripsi = $validatedData['deskripsi'];
        // $gambar = $request->file('foto');
        // $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
        // $gambar->storeAs('public/keunggulan_image/',$nama_file);
        // $keunggulan->foto = $nama_file;
        $keunggulan->save();
        return response()->json([
            'success' => 'Data berhasil ditambahkan',
            'id' => $keunggulan->id,
            'nomor' => $keunggulan->nomor,
            'nama' => $keunggulan->nama,
            'deskripsi' => $keunggulan->deskripsi,
        ]);
    }
    public function editKeunggulan(Request $request, $id) {
        $keunggulan = KeunggulanMitra::find(decrypt($id));
        $validatedData = $request->validate([
            'nomor' => 'required|integer|unique:keunggulan_mitras,nomor',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        $keunggulan->nomor = $validatedData['nomor'];
        $keunggulan->nama = $validatedData['nama'];
        $keunggulan->deskripsi = $validatedData['deskripsi'];
        // $gambar = $request->file('foto');
        // if ($gambar) {
        //     Storage::delete('public/keunggulan_image/'. $keunggulan->foto);
        //     $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
        //     $gambar->storeAs('public/keunggulan_image/',$nama_file);
        //     $keunggulan->foto = $nama_file;
        // }
        $keunggulan->save();
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    
    public function deleteKeunggulan(Request $request, $id) {
        $keunggulan = KeunggulanMitra::find(decrypt($id));
        // Storage::delete('public/testimoni_image/'. $keunggulan->foto);
        $keunggulan->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
    // ENDOFKEUNGGULANNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
    // SYARATTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
    public function syarat(Request $request) {
        $syarat = SyaratMitra::all();
        $data = [
            'title' => 'Admin Keunggulan',
            'syarat' => $syarat,
        ];
        return view('admin/syarat/index',$this->data, $data);
    }
    public function createSyarat(Request $request) {
        $syarat = new SyaratMitra();
        $validatedData = $request->validate([
            'nomor' => 'required|integer|unique:syarat_mitras,nomor',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        $syarat->nomor = $validatedData['nomor'];
        $syarat->nama = $validatedData['nama'];
        $syarat->deskripsi = $validatedData['deskripsi'];
        // $gambar = $request->file('foto');
        // $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
        // $gambar->storeAs('public/syarat_image/',$nama_file);
        // $syarat->foto = $nama_file;
        $syarat->save();
        return response()->json([
            'success' => 'Data berhasil ditambahkan',
            'id' => $syarat->id,
            'nomor' => $syarat->nomor,
            'nama' => $syarat->nama,
            'deskripsi' => $syarat->deskripsi,
        ]);
    }
    public function editSyarat(Request $request, $id) {
        $syarat = SyaratMitra::find(decrypt($id));
        $validatedData = $request->validate([
            'nomor' => 'required|integer',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        // dd($validatedData);
        $syarat->nomor = $validatedData['nomor'];
        $syarat->nama = $validatedData['nama'];
        $syarat->deskripsi = $validatedData['deskripsi'];
        // $gambar = $request->file('foto');
        // if ($gambar) {
        //     Storage::delete('public/syarat_image/'. $syarat->foto);
        //     $nama_file = str_replace(" ", "_", $validatedData['nama']).time().'.'.$gambar->extension();
        //     $gambar->storeAs('public/syarat_image/',$nama_file);
        //     $syarat->foto = $nama_file;
        // }
        $syarat->save();
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    
    public function deleteSyarat(Request $request, $id) {
        $syarat = KeunggulanMitra::find(decrypt($id));
        // Storage::delete('public/testimoni_image/'. $keunggulan->foto);
        $syarat->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
    // ENDOFSYARATTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
    public function userProfile() {
        $data = [
            'title' => 'Admin Profile',
        ];
        return view('admin/user/index',$this->data, $data);
    }
}
