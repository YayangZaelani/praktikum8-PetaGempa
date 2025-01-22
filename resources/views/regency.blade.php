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
        .team-container {
            margin-top: 20px;
        }
        .team-member {
            text-align: center;
        }
        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
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
   
    <br></br>

    <h2 class="mt-5 text-center">Sebaran Populasi Kota-Kota Daerah Istimewa Yogyakarta</h2>
    <!-- <h2>Sebaran Populasi Kota-Kota Daerah Istimewa Yogyakarta</h2> -->
    <h3>Sumber Data: BPSP DI Yogyakarta</h3>

    <br></br>
    
        
    <div id="map"></div>

        <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>    

    <script>
        
        var map = L.map('map').setView([-8.0248461,110.397254], 9.25);

        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="https://yogyakarta.bps.go.id/id/statistics-table/2/MzY3IzI=/proyeksi-penduduk-menurut-kabupaten-kota-di-provinsi-d-i--yogyakarta---ribu-jiwa-.html" target="_blank">BPSP DI Yogtakarta</a>'
        }).addTo(map);

        const regencies = @json($regencies)

        const regencyData = regencies.map(regency => ({
            type: "Feature",
            geometry: {
                type: regency.type_polygon,
                coordinates: JSON.parse(regency.polygon),
            },
            properties: {
                name: regency.name,
                id: regency.id,
                population: regency.population,
            },
        }));

        const geoJson = {
            type: "FeatureCollection",
            features: regencyData,
        };

        function getColor(d) {
            return d > 200000 ? '#800026' :
                d > 120000  ? '#BD0026' :
                d > 100000  ? '#E31A1C' :
                d > 85000  ? '#FC4E2A' :
                d > 75000   ? '#FD8D3C' :
                d > 45000   ? '#FEB24C' :
                d > 35000   ? '#FED976' :
                            '#FFEDA0';
        }

        function style(feature) {
            return {
                fillColor: getColor(feature.properties.population),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7
            };
        }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            layer.bringToFront();
            info.update(layer.feature.properties);
        }

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
            
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }

        geojson = L.geoJson(geoJson, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);

        var info = L.control();

        info.onAdd = function (map) {
            this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
            this.update();
            return this._div;
        };

        // method that we will use to update the control based on feature properties passed
        info.update = function (props) {
            this._div.innerHTML = '<h4>Sebaran Populasi Kota-Kota DI Provinsi DI Yogyakarta</h4>' +  (props ?
                '<b>' + props.name + '</b><br />' + props.population.toLocaleString('id-ID') + ' jiwa'
                : 'Hover over a regency');
        };

        info.addTo(map);
        
        var legend = L.control({position: 'bottomright'});

        legend.onAdd = function (map) {

            var div = L.DomUtil.create('div', 'info legend'),
                grades = [0, 35000, 45000, 75000, 85000, 100000, 120000, 200000],
                labels = [];

            // loop through our density intervals and generate a label with a colored square for each interval
            for (var i = 0; i < grades.length; i++) {
                div.innerHTML +=
                    '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                    grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
            }

            return div;
        };

        legend.addTo(map);

    </script>

<br>

    <div class="container">
            <div class="team-container">
                <h2 class="text-center mb-4">Penyusun Project</h2>
                <div class="row justify-content-center">
                    <div class="col-md-3 team-member">
                        <img src="frontend/assets/img/yayang.jpg" alt="Penyusun 1">
                        <p><strong>M. YAYANG ZAELANI</strong></p>
                        <p>Sistem Informasi</p>
                    </div>
                    <div class="col-md-3 team-member">
                        <img src="frontend/assets/img/lutfi.jpg" alt="Penyusun 2">
                        <p><strong>LUTHFI MAKARIM</strong></p>
                        <p>Sistem Informasi</p>
                    </div>
                    <div class="col-md-3 team-member">
                        <img src="frontend/assets/img/hilal.jpg" alt="Penyusun 3">
                        <p><strong>FARHAN HILAL MAULANA</strong></p>
                        <p>Sistem Informasi</p>
                    </div>
                    <div class="col-md-3 team-member">
                        <img src="frontend/assets/img/nv1.jpg" alt="Penyusun 4">
                        <p><strong>MOCHAMAD NOVAL ILHAM MALIKI</strong></p>
                        <p>Sistem Informasi</p>
                    </div>
                </div>
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>