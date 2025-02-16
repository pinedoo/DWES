<hr>
<button onclick="location.href='./'" > Volver </button>
<br><br>
<link rel="stylesheet" href="https://openlayers.org/en/latest/css/ol.css" />
<script src="https://openlayers.org/en/latest/build/ol.js"></script>
<table>
 <tr><td>id:</td> 
 <td><input type="number" name="id" value="<?=$cli->id ?>"  readonly > </td>
 <td rowspan="7">
<?php

$ruta = "app/uploads/0000000{$cli->id}.jpg";
if (file_exists($ruta)) {
    echo "<img src='$ruta' style='width: 300px; height: auto;'>";
} else {
    echo "<img src='https://robohash.org/{$cli->id}'>";
}
echo "<br>";
$ip = $cli->ip_address;
$ipApiUrl = "http://ip-api.com/json/$ip";
$response = file_get_contents($ipApiUrl);
$data = json_decode($response, true);

if ($data && $data['status'] == 'success') {
   $countryCode = strtolower($data['countryCode']);
   $flagUrl = "https://flagpedia.net/data/flags/h80/$countryCode.png";
   echo "<img src='$flagUrl' alt='Flag of {$data['country']}' />";
} else {
   echo "La Bandera de este pais no esta disponible";
}
?>
</td> 
</tr>
 <tr><td>first_name:</td> 
 <td><input type="text" name="first_name" value="<?=$cli->first_name ?>" readonly > </td></tr>
 <tr><td>last_name:</td> 
 <td><input type="text" name="last_name" value="<?=$cli->last_name ?>" readonly ></td></tr>
 <tr><td>email:</td> 
 <td><input type="email" name="email" value="<?=$cli->email ?>"   readonly  ></td></tr>
 <tr><td>gender</td> 
 <td><input type="text" name="gender" value="<?=$cli->gender ?>" readonly ></td></tr>
 <tr><td>ip_address:</td> 
 <td><input type="text" name="ip_address" value="<?=$cli->ip_address ?>" readonly ></td></tr>
 <tr><td>telefono:</td> 
 <td><input type="tel" name="telefono" value="<?=$cli->telefono ?>" readonly ></td></tr>
</table>
<form>
    <input type="hidden" name="id" value="<?=$cli->id ?>">
    <button type="submit" name="nav-detalles" value="Anterior">Anterior</button>
    <button type="submit" name="nav-detalles" value="Siguiente">Siguiente</button>
    <button onclick="window.open('http://localhost/servidor/proyecto/app/controllers/generar_pdf.php?id=<?=$cli->id?>&first_name=<?=$cli->first_name?>&last_name=<?=$cli->last_name?>&email=<?=$cli->email?>&gender=<?=$cli->gender?>&ip_address=<?=$cli->ip_address?>&telefono=<?=$cli->telefono?>', '_blank');">
    Imprimir en PDF
</button>


    <br>
    </form>    
</form>
<div id="map" style="width: 100%; height: 400px;"></div>
<link rel="stylesheet" href="https://openlayers.org/en/latest/css/ol.css" />

    <style>
        /* Estilo para el contenedor del mapa */
        #map {
            width: 100%;
            height: 400px;
        }

        /* Estilo para el marcador */
        .ol-marker {
            background: red;
            width: 15px;
            height: 15px;
            border-radius: 50%;
        }
    </style>
<script src="https://cdn.jsdelivr.net/npm/ol@latest/dist/ol.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Obtiene la IP desde PHP
    var ip = "<?=$cli->ip_address ?>";

    // URL de la API de ipinfo.io
    var ipApiUrl = "https://ipinfo.io/" + ip + "/geo";

    // Llamada a la API para obtener la ubicación
    fetch(ipApiUrl)
        .then(response => response.json())
        .then(data => {
            // Verifica si la API devolvió datos correctos
            if (data && data.loc) {
                // La ubicación viene en formato "lat,lon"
                var coords = data.loc.split(',');
                var lat = parseFloat(coords[0]);
                var lon = parseFloat(coords[1]);

                // Inicializa el mapa con OpenLayers
                var map = new ol.Map({
                    target: 'map',
                    layers: [
                        new ol.layer.Tile({
                            source: new ol.source.OSM()
                        })
                    ],
                    view: new ol.View({
                        center: ol.proj.fromLonLat([lon, lat]),
                        zoom: 10
                    })
                });

                // Crea un marcador para la ubicación
                var markerElement = document.createElement('div');
                markerElement.className = 'ol-marker';

                var marker = new ol.Overlay({
                    position: ol.proj.fromLonLat([lon, lat]),
                    positioning: 'center-center',
                    element: markerElement,
                    stopEvent: false
                });

                map.addOverlay(marker);
            } else {
                console.error('No se pudo obtener la geolocalización');
                document.getElementById('map').innerHTML = 'No se pudo obtener la geolocalización';
            }
        })
        .catch(error => console.error('Error:', error));
});
</script>