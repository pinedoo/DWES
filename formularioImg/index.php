<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
    include_once('captura.html');
} 
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: black;
            text-align: center;
            margin-top: 20px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .result {
            font-size: 18px;
            margin: 10px 0;
            line-height: 1.6;
            padding: 10px;
        }
        img {
            display: block;
            margin: 10px auto;
            max-width: 200px;
        }
        .error {
            color: red;
            text-align: center;
        }
        .respuesta {
            text-align: center;
        }
    </style>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<style>body { background-color: yellow; }</style>";
    echo "<div class='container'>";
    $nombre = ($_POST['nombre']);
    $alias = ($_POST['alias']);
    $edad = ($_POST['edad']);
    $armas = isset($_POST['armas']) ? $_POST['armas'] : [];
    $magia = isset($_POST['magia']) ? $_POST['magia'] : 'No especificado';
    $directorio_destino = 'uploads/';
    
    // Mostrando los datos enviados
    echo "<h2>Datos del jugador:</h2>";
    echo "<div class='result'>";
    echo "<strong>Nombre:</strong> " . htmlspecialchars($nombre) . "<br>";
    echo "<strong>Alias:</strong> " . htmlspecialchars($alias) . "<br>";
    echo "<strong>Edad:</strong> " . $edad . "<br>";
    echo "<strong>Armas seleccionadas:</strong> ";
    
    // Mostrando las armas seleccionadas
    if (!empty($armas)) {
        foreach ($armas as $arma) {
            echo htmlspecialchars($arma) . "&nbsp;";
        }
        echo "<br>";
    } else {
        echo "No se seleccionaron armas.<br>";
    }

    // Mostrando si practica artes mágicas
    echo "<strong>¿Practica artes mágicas?:</strong> " . htmlspecialchars($magia) . "<br>";
    echo "</div>";

    // Comprobando si se ha subido un archivo
    if (isset($_FILES['archivo'])) {
        // echo "Código de error: " . $_FILES['archivo']['error'] . "<br>"; // Nos devuelve el codigo de error en caso de que ocurra algo con el archivo
        
        if ($_FILES['archivo']['error'] == UPLOAD_ERR_OK) {
            $archivo_tmp = $_FILES['archivo']['tmp_name'];
            $archivo_nombre = basename($_FILES['archivo']['name']);
            $ruta_destino = $directorio_destino . $archivo_nombre;
            $archivo_tamano = $_FILES['archivo']['size'];
            $archivo_tipo = mime_content_type($archivo_tmp);
            $max_tamano = 10240; // 10 KB

            // Comprobamos si el archivo es PNG y no excede el tamaño permitido
           
            if ($archivo_tipo == 'image/png' && $archivo_tamano <= $max_tamano) {
                // Mover el archivo a la carpeta uploads/
                if (move_uploaded_file($archivo_tmp, $ruta_destino)) {
                    // Mostrar imagen subida
                    echo "<div class='result'>";
                    echo "<strong class='respuesta'>Imagen subida:</strong><br> <img src='$ruta_destino'><br>";
                    echo "</div>";
                } else {
                    echo "<p class='error'>Error al mover la imagen.</p>";
                }
            } else {
                // El archivo no cumple con los requisitos
                echo "<p class='error'>El archivo debe ser una imagen PNG y no superar los 10 KB.</p>";
            }
        } else {
            // Mostrar imagen por defecto si no se ha subido ninguna
            echo "<div class='result'>";
            echo "<p class='respuesta'>No se subió ninguna imagen</p>";
            echo "<img src='calavera.png'><br>";
            echo "</div>";
        }
    } else {
        echo "<p class='error'>No se subió ninguna imagen o hubo un error en la carga.</p>";
    }
}
?>
</div>

</body>
</html>
