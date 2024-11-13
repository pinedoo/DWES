<?php
require_once 'funciones.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinco Dados</title>
    <style>
        table{
            border-collapse: collapse;
        }

        table, th, td {
            border: 2px solid black;
            padding: 20px;
            font-size: 1.5em;
        }

        .jugador1 {
            background-color: red;
            color: black;
            font-size: 3em;
        }

        .jugador2 {
            background-color: blue;
            color: black;
            font-size: 3em;
        }
    </style>
</head>

<body>
    <h1>Cinco dados</h1>
    <h3>Actualice la página para jugar otra partida</h3>
    <table>
        <tr>
            <th>Jugador</th>
            <th>Dados</th>
            <th>Puntuación</th>
        </tr>
        <tr>
            <td>Jugador 1</td>
            <td class="jugador1">
                <?php
                $resultado1 = tiradaj1();
                $dados1 = $resultado1[0];
                $puntuacion1 = $resultado1[1][0]+$resultado1[1][1]+$resultado1[1][2]; 
                echo implode(" ", $dados1);
                ?>
            </td>
            <td>
                <?= $puntuacion1; ?>
            </td>
        </tr>
        <tr>
            <td>Jugador 2</td>
            <td class="jugador2">
                <?php
                $resultado2 = tiradaj2();
                $dados2 = $resultado2[0];
                $puntuacion2 = $resultado2[1][0]+$resultado2[1][1]+$resultado2[1][2]; 
                echo implode(" ", $dados2);
                ?>
            </td>
            <td>
                <?= $puntuacion2 ?>
            </td>
        </tr>
    </table>    

</body>

</html>