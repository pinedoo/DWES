<?php
function usuarioOk($usuario, $contraseña) : bool {
    return (strlen($usuario) >= 8 && $contraseña === strrev($usuario));
}

function letraMasRepetida($texto) {
    $texto = strtolower($texto);
    $frecuencia = [];
    
    for ($i = 0; $i < strlen($texto); $i++) {
        $letra = $texto[$i];
        if (!ctype_alpha($letra)) {
            continue;
        }
        
        if (isset($frecuencia[$letra])) {
            $frecuencia[$letra]++;
        } else {
            $frecuencia[$letra] = 1;
        }
    }
    
    $letraMax = '';
    $maxFrecuencia = 0;

    foreach ($frecuencia as $letra => $cantidad) {
        if ($cantidad > $maxFrecuencia) {
            $maxFrecuencia = $cantidad;
            $letraMax = $letra;
        }
    }
    
    return $letraMax;
}

function palabraMasRepetida($texto) {
    $texto = strtolower($texto);
    $palabras = str_word_count($texto, 1);
    $frecuencia = array_count_values($palabras);

    arsort($frecuencia);
    return array_key_first($frecuencia);
}
?>

