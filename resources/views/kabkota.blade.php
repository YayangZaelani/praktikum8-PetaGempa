<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regency</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /* #map { 
            height: 900px;  */
        #map {
            width: 80%; /* Mengurangi ukuran peta */
            height: 60%; /* Menyesuaikan tinggi peta */
            border: 2px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        h2, h3 {
            text-align: center;
            margin: 5px;
        }
        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255,255,255,0.8);
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 5px;
        }
        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }
        .legend {
            line-height: 18px;
            color: #555;
        }
        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>

</head>
<body>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="fixed-top">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SIG - Project Akhir</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/provinsi">Provinsi</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/kabkota">Kabupaten Kota</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Peta Tematik
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/gdp">GDP</a></li>
                    <li><a class="dropdown-item" href="/kepadatan">Kepadatan</a></li>
                    <li><a class="dropdown-item" href="/kawin">Persentase Kawin</a></li>
                </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>
    </div>
   
    <!-- <div id="map"></div> -->

    <!-- <script>
        var map = L.map('map').setView([-2.6516006,117.2032069], 5.5);
       
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var provinces = @json($list_kabkota);
            console.log(provinces);
            provinces.forEach(function(province){
                var marker = L.marker([province.latitude, province.longitude]).addTo(map);
                marker.bindPopup(province.name);
            });

            legend.addTo(map);

    </script> -->

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <h2>Daftar Kabupaten/Kota Indonesia</h2>
    <!-- <h3 href="https://github.com/yusufsyaifudin/wilayah-indonesia">Wilayah Idonesia (yusufsyaifudin)</h3> -->
    <p>
        Sumber Data : 
        <a href="https://https://github.com/yusufsyaifudin/wilayah-indonesia" target="_blank">
        Wilayah Indonesia (Yusuf Syaifudin)
        </a>
    </p>

    <br></br>

    <div id="map"></div>
        <script>
            var map = L.map('map').setView([-0.3155398750904368, 117.1371634207888], 5);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{ maxZoom: 5,
              attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            var regencies = @json($list_kabkota);
            console.log(regencies);
            regencies.forEach(function(regencie){
                var marker = L.marker([regencie.latitude, regencie.longitude]).addTo(map);
                marker.bindPopup(regencie.name);
            });

        </script>

</body>
</html>