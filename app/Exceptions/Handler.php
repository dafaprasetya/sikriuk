<?php

namespace App\Exceptions;

use App\Models\About;
use App\Models\Kemitraan;
use App\Models\KeunggulanMitra;
use App\Models\Product;
use App\Models\ProductKatergori;
use App\Models\Promo;
use App\Models\StepKemitraan;
use App\Models\Testimonial;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            $statusCode = $exception->getStatusCode();
            $promo = Promo::all();
            $about = About::first();
            $menu = Product::all();
            $menukategori = ProductKatergori::all();
            $keunggulan = KeunggulanMitra::all();
            $kemitraan = Kemitraan::all();
            $testimoni = Testimonial::all();
            $langkah = StepKemitraan::orderBy('nomor')->get();
            // $lokasi = LokasiMitra::all();
            $data =[
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

            if ($statusCode == 403) {
                return response()->view('errors.403',array_merge($data,  ['title' => '403 - Akses Ditolak']), 403);
            }
            if ($statusCode == 404) {
                return response()->view('errors.404', array_merge($data, ['title' => '403 - Data Tidak Ditemukan']), 403);
            }

            if ($statusCode == 500) {
                return response()->view('errors.500', array_merge($data, ['title' => '500 - Kesalahan Server']), 500);
            }
        }

        return parent::render($request, $exception);
    }

}
