<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Peta</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    <style>
        #map { height: 800px; }
    </style>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

</head>
<body>

    <header>
        <h1>Selamat Datang di Website Peta Universitas Depok</h1>
    </header>

    <div id="map"></div>

    <script>
        var map = L.map('map').setView([-2.6516006,117.2032069], 5.5);
        
        // var place = {
        // "type": "FeatureCollection",
        // "features": [
        //     {
        //     "type": "Feature",
        //     "properties": {
        //         "Kampus": "STT Terpadu Nurul Fikri B",
        //         "Kota": "Depok",
        //         "Alamat": "Jalan Lenteng Agung Raya No.20 RT.5/RW.1 Lenteng Agung, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12640"
        //     },
        //     "geometry": {
        //         "coordinates": [
        //         106.83268002101073,
        //         -6.3528667632693185
        //         ],
        //         "type": "Point"
        //     }
        //     },
        //     {
        //     "type": "Feature",
        //     "properties": {
        //         "Kampus": "STT Terpadu Nurul Fikri A",
        //         "Kota": "Depok",
        //         "Alamat": "JRPV+QH5, Jl. Setu Indah No.116, Tugu, Kec. Cimanggis, Kota Depok, Jawa Barat 16451"
        //     },
        //     "geometry": {
        //         "coordinates": [
        //         106.84440682187312,
        //         -6.362706651445592
        //         ],
        //         "type": "Point"
        //     }
        //     },
        //     {
        //     "type": "Feature",
        //     "properties": {
        //         "Kampus": "Universitas Indonesia",
        //         "Kota": "Depok",
        //         "Alamat": "Jl. Lingkar, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424"
        //     },
        //     "geometry": {
        //         "coordinates": [
        //         106.82945673734423,
        //         -6.36348929490029
        //         ],
        //         "type": "Point"
        //     }
        //     },
        //     {
        //     "type": "Feature",
        //     "properties": {
        //         "Kampus": "Universitas Pancasila",
        //         "Kota": "Depok",
        //         "Alamat": "Jl. Lenteng Agung Raya No.56, RT.1/RW.3, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630"
        //     },
        //     "geometry": {
        //         "coordinates": [
        //         106.83309844324879,
        //         -6.339229571936642
        //         ],
        //         "type": "Point"
        //     }
        //     },
        //     {
        //     "type": "Feature",
        //     "properties": {
        //         "Kampus": "Universitas GUnadarma E",
        //         "Alamat": "Jl. Komjen.Pol.M.Jasin No.9, Tugu, Kec. Cimanggis, Kota Depok, Jawa Barat 16451",
        //         "Kota": "Depok"
        //     },
        //     "geometry": {
        //         "coordinates": [
        //         106.8414956264466,
        //         -6.353938149710828
        //         ],
        //         "type": "Point"
        //     }
        //     },
        //     {
        //     "type": "Feature",
        //     "properties": {
        //         "Kampus": "Universitas Politeknik Negri Media",
        //         "Alamat": "Jl. Srengseng Sawah Raya No.17, RT.8/RW.3, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630",
        //         "Kota": "Depok"
        //     },
        //     "geometry": {
        //         "coordinates": [
        //         106.82725599470155,
        //         -6.346979827850845
        //         ],
        //         "type": "Point"
        //     },
        //     "id": 5
        //     }
        // ]
        // }

        // L.geoJSON(place, {
        //     pointToLayer: function (feature, latlng) {
        //         return L.marker(latlng);
        //     },
            
        //     onEachFeature: function (feature, layer) {
        //     layer.bindPopup(feature.properties.Kampus + '<br>' + feature.properties.Alamat + '<br>' + feature.properties.Kota);
        //     }

        // }).addTo(map);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var provinces = @json($list_provinsi);
            console.log(provinces);
            provinces.forEach(function(province){
                var marker = L.marker([province.latitude, province.longitude]).addTo(map);
                marker.bindPopup(province.name);
            });

    </script>
</body>
</html>