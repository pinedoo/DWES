<hr>
<form method="POST" enctype="multipart/form-data">

    <label for="id">Id:</label>
    <input type="text" name="id" readonly value="<?= $cli->id ?>">

    <label for="first_name">Nombre:</label>
    <input type="text" id="first_name" name="first_name" value="<?= $cli->first_name; ?>">

    <label for="last_name">Apellido:</label>
    <input type="text" id="last_name" name="last_name" value="<?= $cli->last_name; ?>">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= $cli->email; ?>">

    <label for="gender">Género:</label>
    <input type="text" id="gender" name="gender" value="<?= $cli->gender; ?>">

    <label for="ip_address">Dirección IP:</label>
    <input type="text" id="ip_address" name="ip_address" value="<?= $cli->ip_address; ?>">

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" value="<?= $cli->telefono; ?>">
    <label for="fileToUpload">Subir nueva foto:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpg, .jpeg, .png">
    <br>
    <input type="submit" name="orden" value="<?= $orden ?>">
    <input type="submit" name="orden" value="Volver">
</form>