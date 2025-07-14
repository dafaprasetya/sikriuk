@extends('main.snippets.core')

@section('content')
@include('main.snippets.loadingscreen')
<!-- Modal -->
@if(session('success'))
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center p-4">
        <div class="mx-auto my-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#28a745" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8a8 8 0 1 1-16 0 8 8 0 0 1 16 0zM6.97 10.97a.75.75 0 0 0 1.07 0l3.992-3.992a.75.75 0 1 0-1.06-1.06L7.5 9.44 5.53 7.47a.75.75 0 0 0-1.06 1.06l2.5 2.5z"/>
          </svg>
        </div>
        <h5 class="text-success"> Terimakasih Sudah Mendaftar, Tim kami akan menindak lanjuti proses pendaftaran anda</h5>
        {{-- <li>Nama: {{ session('success')['nama'] }}</li>
        <li>Email: {{ session('success')['email'] }}</li> --}}
        <div class="mt-3">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
        </div>
    </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      var myModal = new bootstrap.Modal(document.getElementById('successModal'));
      myModal.show();
    });
    const nama = "{{ session('success')['nama'] }}";
    const kota = "{{ session('success')['kota'] }}";
    const lokasi = "{{ session('success')['lokasi'] }}";
    const notelp = [
        @foreach ($about->phone as $phone)
            "{{ $phone->phone }}",
        @endforeach
    ];
    const message = `Halo saya ${nama}, tertarik untuk menjadi mitra di kota ${kota}. Alamat lengkapnya ${lokasi}`;
    const randomNotelp = notelp[Math.floor(Math.random() * notelp.length)];
    console.log(randomNotelp);
    const url = `https://wa.me/${randomNotelp}/?text=${encodeURIComponent(message)}`;
    window.location.href = url;
</script>
@endif
@if($errors->any())
<div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center p-4">
        <div class="mx-auto my-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#dc3545" class="bi bi-x-octagon" viewBox="0 0 16 16">
                <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
            </svg>
        </div>
        <h5 class="text-danger">Harap lengkapi data yang sesuai dan centang "Saya bukan robot"</h5>
        <div class="mt-3">
            <button id="btnCloseError" type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
        </div>
    </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();

        document.getElementById('btnCloseError').addEventListener('click', function () {
            setTimeout(function () {
                const section = document.getElementById('joinmitra');
                if (section) {
                    section.scrollIntoView({ behavior: 'smooth' });
                }
            }, 500);
        });
    });
</script>
@endif


@if ($promo->count() >= 1)
@include('main.snippets.navbar')
{{-- @include('main.snippets.promo') --}}
@else
@include('main.snippets.navbar2')
@endif
{{-- @include('main.snippets.jargon') --}}
    @include('main.snippets.tetangperusahaan')
    @include('main.snippets.menu')
    @include('main.snippets.kemitraanshow')
    @include('main.snippets.faq')
    {{-- @include('main.snippets.stepbystep') --}}
    @include('main.snippets.formmitra')
    @if ($testimoni->count() >= 1)
    @include('main.snippets.testimoni')
    @endif
    {{-- @if ($blog->count() >= 1)
    @include('main.snippets.blogshow')
    @endif --}}
    @include('main.lokasi.lokasi')
    @include('main.sosmed.sosmed')
    @include('main.snippets.footer')

@endsection
