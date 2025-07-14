<section class="section-padding" id="joinmitra">
    <div class="container">
        <div class="section-title text-center">
            <span class="wow fadeInUp lalitfont">Form Pendaftaran Calon Mitra</span>
            <h2 class="wow fadeInUp lalitfont" data-wow-delay=".3s">
                Form Pendaftaran Mitra Online
            </h2>
        </div>
        <form action="{{ route('sendCalonMitra') }}" method="POST" class="wow fadeInUp" data-wow-delay=".3s">
            @csrf
            <div class="row popinsfont">
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nama:</label>
                        <input class="form-control radius-8" type="text" name="nama" required placeholder="Masukan nama sesuai KTP" value="{{ old('nama') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email:</label>
                        <input class="form-control radius-8" type="email" name="email" required placeholder="Masukan email aktif" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Telepon:</label>
                        <input class="form-control radius-8" type="number" placeholder="Masukan nomor telepon/whatsapp aktif" name="phone" required value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Lokasi:</label>
                        <input class="form-control radius-8" type="text" name="lokasi" required placeholder="Masukan lokasi yang ingin dijadikan outlet" value="{{ old('lokasi') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-6">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Kota:</label>
                        <input class="form-control radius-8" name="kota" type="text" required placeholder="Masuukan kota yang ingin dijadikan tempat outlet" value="{{ old('kota') }}">
                    </div>
                </div>
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                <div class="col-sm-12">
                    <div class="md-2 mt-2">
                        <button class="btn btn-md btn-warning w-100" type="submit">Kirim</button>
                        <p>Masih bingung? ayok cek <a href="">tentang kemitraan</a></p>
                    </div>
                </div>
            </div>

        </form>
    </div>
  </section>
