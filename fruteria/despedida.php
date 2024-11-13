<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>LA FRUTERIA</title>
</head>
<body>
<H1> La Frutería del siglo XXI</H1>
<?=$compraRealizada ?>
<?php if (!empty($pedidos)): ?>
    <table border="1">
        <tr><th>Fruta</th><th>Cantidad</th></tr>
        <?php foreach ($pedidos as $fruta => $cantidad): ?>
            <tr><td><?= htmlspecialchars($fruta) ?></td><td><?= htmlspecialchars($cantidad) ?></td></tr>
        <?php endforeach; ?>
    </table>
    <br><br> Muchas gracias, por su pedido. <br><br>
<?php else: ?>
    <p>No se realizaron pedidos.</p>
<?php endif; ?>

<table></table>
<input type="button" value=" NUEVO CLIENTE " onclick="location.href='<?=$_SERVER['PHP_SELF'];?>'">
</body>
</html>