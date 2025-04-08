@extends('main.snippets.core')
@section('content')
@include('main.snippets.loadingscreen')
@include('main.snippets.navbar2')
<section id="lokasi-map" class="mt-4 wow fadeInUp" data-wow-delay=".3s">
    <div class="container">
        <div class="section-title text-center">
            <span class="wow fadeInUp">Lokasi</span>
            <h3 class="wow fadeInUp" data-wow-delay=".3s">
                Cari Lokasi Sikriuk Disekitarmu

            </h3>
        </div>
        <div id="map" style="height: 400px; z-index: 1"></div>
        <form>
            <div class="row">
                <div class="col-xl-12">
                    <div class="mt-3 d-flex align-items-center justify-content-center">
                        <input type="text" name="search" class="form-control me-2" id="search" placeholder="Cari lokasi terdekat" value="{{ $search ?? '' }}" style="max-width: 400px; font-size: 1.2rem; padding: 10px;">
                        <button type="submit" class="btn btn-primary" style="font-size: 1.2rem; padding: 10px 20px;">Cari</button>
                    </div>
                </div>
                <div class="col-xl-12">
                    <table class="table bordered-table mb-0" id="dataTableStep" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Link</th>
                            </tr>
                        </thead>
                        <tbody id="dataTestiTable">
                            @foreach ($lokasi as $lokasis)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lokasis->nama }}</td>
                                <td>{{ $lokasis->kota }}</td>
                                <td>
                                    <a href="{{ $lokasis->linkmaps }}" class="w-32-px h-32-px bg-info-focus text-info-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <i class="fas fa-location-arrow"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    var map = L.map('map').setView([-6.2088, 106.8456], 13)

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var meIcon = L.icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -40]
    });

    function onLocationFound(e) {
        var radius = e.accuracy / 2;

        L.marker(e.latlng, { icon: meIcon }).addTo(map)
            .bindPopup("Lokasimu sekarang")
            .openPopup();

        map.setView(e.latlng, 13);
    }

    function onLocationError(e) {
        map.setView([-6.2088, 106.8456], 13);
    }

    map.locate({ setView: true, maxZoom: 10 });

    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);

    var mitraIcon = L.icon({
        iconUrl: '{{ asset('img/marker.png') }}',
        iconSize: [50, 50],
        iconAnchor: [20, 40],
        popupAnchor: [0, -40]
    });

    @foreach ($lokasi as $lokasis)
    L.marker([{{ floatval($lokasis->latitude) }}, {{ floatval($lokasis->longitude) }}], { icon: mitraIcon }).addTo(map)
        .bindPopup('<b>{{ $lokasis->nama }} | {{ $lokasis->kota }}</b><br><a href="{{ $lokasis->linkmaps }}" target="_blank">Buka di Google Maps</a>');
    @endforeach
</script>

@include('main.snippets.footer')
@endsection
