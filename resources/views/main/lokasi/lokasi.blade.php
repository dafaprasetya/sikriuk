<section id="lokasi" class="mt-4 wow fadeInUp" data-wow-delay=".3s">
    <div class="container">
        <div class="section-title text-center">
            <span class="wow fadeInUp">Lokasi</span>
            <h3 class="wow fadeInUp" data-wow-delay=".3s">
                Mau ngerasain sikriuk?, yuk cek sikriuk disekitarmu
            </h3>
        </div>
        <div id="map" style="height: 200px;"></div>
        <div class="row mt-3 text-center">
            <div class="col-sm-12">
                <a href="about.html" class="theme-btn btn-sm wow style-line-height fadeInUp w-80" data-wow-delay=".5s">Lihat lokasi mitra {{ $about->nama }}</a>
            </div>
        </div>
    </div>
</section>
<script>
    var map = L.map('map').setView([-6.2088, 106.8456], 13)

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var meIcon = L.icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png', // Ganti dengan URL ikon GPS Anda
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -40]
    });
    function onLocationFound(e) {
        var radius = e.accuracy / 2;

        L.marker(e.latlng,{ icon: meIcon }).addTo(map)
            .bindPopup("Lokasimu sekarang")
            .openPopup();

        map.setView(e.latlng, 13);
    }

    function onLocationError(e) {
        alert("Lokasi sekarang");
        map.setView([-6.2088, 106.8456], 13);
    }

    map.locate({setView: true, maxZoom: 10});

    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);
    var mitraIcon = L.icon({
        iconUrl: '{{ asset('img/marker.png') }}', // URL ikon GPS
        iconSize: [50, 50],
        iconAnchor: [20, 40],
        popupAnchor: [0, -40]
    });
    @foreach ($lokasi as $lokasis)
    L.marker([{{ $lokasis->latitude }}, {{ $lokasis->longitude }}], { icon: mitraIcon }).addTo(map)
        .bindPopup('<b>{{ $lokasis->nama }} | {{ $lokasis->kota }}</b><br><a href="{{ $lokasis->linkmaps }}" target="_blank">Buka di Google Maps</a>')
        .openPopup();
    @endforeach
</script>
