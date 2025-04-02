<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concepcion, Tarlac Dengue Map</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        #map { height: 90vh; width: 100%; }
        .label-tooltip {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid #333;
            padding: 4px 8px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <h2>Concepcion, Tarlac Dengue Case Map</h2>
    <input type="file" accept=".kml" onchange="loadKMLFile(event)">
    <p>Select your KML file above.</p>
    
    <div id="map"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <!-- Leaflet KML Loader -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-omnivore/0.3.4/leaflet-omnivore.min.js"></script>

    <script>
        var map = L.map('map').setView([15.325, 120.655], 13); 
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // 🔹 Static Dengue Cases Data
        var staticDengueCases = {
            "Alfonso": 12,
            "Balutu": 8,
            "Cafe": 15,
            "Calius Gueco": 20,
            "Caluluan": 5,
            "Castillo": 18,
            "Corazon de Jesus": 10
        };

        // Function to load KML file and extract dengue cases
        function loadKMLFile(event) {
            var file = event.target.files[0];
            if (!file) return;
            
            var reader = new FileReader();
            reader.onload = function(e) {
                var kmlText = e.target.result;
                var kmlLayer = omnivore.kml.parse(kmlText).addTo(map);
                
                kmlLayer.on('ready', function () {
                    map.fitBounds(kmlLayer.getBounds());
                });

                // Parse KML as XML
                var parser = new DOMParser();
                var xmlDoc = parser.parseFromString(kmlText, "text/xml");

                // Extract placemarks and dengue cases
                var placemarks = xmlDoc.getElementsByTagName("Placemark");
                for (var i = 0; i < placemarks.length; i++) {
                    var name = placemarks[i].getElementsByTagName("name")[0].textContent;
                    var coordinates = placemarks[i].getElementsByTagName("coordinates")[0].textContent.trim();
                    var description = placemarks[i].getElementsByTagName("description")[0]?.textContent || "";

                    // 🔹 Extract dengue cases from the description OR use static data
                    var casesMatch = description.match(/Dengue Cases:\s*(\d+)/i);
                    var cases = casesMatch ? parseInt(casesMatch[1]) : staticDengueCases[name] || 0;

                    if (coordinates) {
                        var coords = coordinates.split(",");
                        var lng = parseFloat(coords[0]);
                        var lat = parseFloat(coords[1]);

                        // Improved visibility for dengue markers
                        L.circle([lat, lng], {
                            radius: cases * 80, // Increased size
                            fillColor: getColor(cases),
                            color: '#333', // Darker border for contrast
                            weight: 2,
                            opacity: 1,
                            fillOpacity: 0.7
                        }).addTo(map)
                        .bindPopup(`<b>${name}</b><br><span style="color:red;">Dengue Cases: ${cases}</span>`)
                        .bindTooltip(`${cases} Cases`, {permanent: true, direction: 'top', className: 'label-tooltip'});
                    }
                }
            };
            reader.readAsText(file);
        }

        function getColor(cases) {
            return cases > 20 ? '#d73027' : // High (Red)
                   cases > 10 ? '#fdae61' : // Medium (Orange)
                               '#1a9850';  // Low (Green)
        }
    </script>
</body>
</html>
