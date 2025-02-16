<?php

function crudBorrar ($id){    
    $db = AccesoDatos::getModelo();
    $resu = $db->borrarCliente($id);
    if ( $resu){
         $_SESSION['msg'] = " El usuario ".$id. " ha sido eliminado.";
    } else {
         $_SESSION['msg'] = " Error al eliminar el usuario ".$id.".";
    }

}

function crudTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}
 
function crudAlta(){
    $cli = new Cliente();
    $orden= "Nuevo";
    include_once "app/views/formulario.php";
}

function crudDetalles($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    include_once "app/views/detalles.php";
}

function crudDetallesSiguiente($id){
    $db=AccesoDatos::getModelo();
    $cli = $db->getClienteSiguiente($id);
    include_once "app/views/detalles.php";
}

function crudDetallesAnterior($id){
    $db=AccesoDatos::getModelo();
    $cli = $db->getClienteAnterior($id);
    include_once "app/views/detalles.php";
}

function crudModificar($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $orden="Modificar";
    include_once "app/views/formulario.php";
}

function crudPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $email = $_POST['email'];
    $ip = $_POST['ip_address'];
    $telefono = $_POST['telefono'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['msg'] = " Error: El correo electrónico no es válido.";
        return;
    }

    $db = AccesoDatos::getModelo();
    if ($db->emailExists($email, $_POST['id'])) {
        $_SESSION['msg'] = " Error: El correo electrónico ya está en uso.";
        return;
    }

    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        $_SESSION['msg'] = " Error: La dirección IP no es válida.";
        return;
    }

    if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $telefono)) {
        $_SESSION['msg'] = " Error: El formato del teléfono no es válido. Debe ser ***-***-****.";
        return;
    }   
    $cli = new Cliente();
    $cli->id            =$_POST['id'];
    $cli->first_name    =$_POST['first_name'];
    $cli->last_name     =$_POST['last_name'];
    $cli->email         =$_POST['email'];	
    $cli->gender        =$_POST['gender'];
    $cli->ip_address    =$_POST['ip_address'];
    $cli->telefono      =$_POST['telefono'];
    $db = AccesoDatos::getModelo();
    if ( $db->addCliente($cli) ) {
           $_SESSION['msg'] = " El usuario ".$cli->first_name." se ha dado de alta ";
        } else {
            $_SESSION['msg'] = " Error al dar de alta al usuario ".$cli->first_name."."; 
        }
}


function crudPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $email = $_POST['email'];
    $ip = $_POST['ip_address'];
    $telefono = $_POST['telefono'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['msg'] = " Error: El correo electrónico no es válido.";
        $cli = (object) $_POST;
        $orden = "Modificar";
        include_once "app/views/formulario.php";
        return;
    }

    $db = AccesoDatos::getModelo();
    if ($db->emailExists($email, $_POST['id'])) {
        $_SESSION['msg'] = " Error: El correo electrónico ya está en uso.";
        $cli = (object) $_POST;
        $orden = "Modificar";
        include_once "app/views/formulario.php";
        return;
    }

    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        $_SESSION['msg'] = " Error: La dirección IP no es válida.";
        $cli = (object) $_POST;
        $orden = "Modificar";
        include_once "app/views/formulario.php";
        return;
    }

    if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $telefono)) {
        $_SESSION['msg'] = " Error: El formato del teléfono no es válido. Debe ser ***-***-****.";
        $cli = (object) $_POST;
        $orden = "Modificar";
        include_once "app/views/formulario.php";
        return;
    }
    $cli = new Cliente();
    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->email         = $_POST['email'];	
    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $_POST['ip_address'];
    $cli->telefono      = $_POST['telefono'];

    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK) {
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $fileExtension = strtolower(pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION));
        $fileSize = $_FILES['fileToUpload']['size'];
        
        if (!in_array($fileExtension, $allowedExtensions)) {
            $_SESSION['msg'] = " Error: Solo se permiten archivos JPG y PNG.";
            $cli = (object) $_POST;
            $orden = "Modificar";
            include_once "app/views/formulario.php";
            return;
        }

        if ($fileSize > 500 * 1024) { // 500 KB
            $_SESSION['msg'] = " Error: El archivo debe ser menor de 500 KB.";
            $cli = (object) $_POST;
            $orden = "Modificar";
            include_once "app/views/formulario.php";
            return;
        }

        $uploadDir = 'app/uploads/';
        $uploadFile = "{$uploadDir}0000000{$cli->id}.{$fileExtension}";
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadFile)) {
            $cli->foto = $uploadFile;
        } else {
            $_SESSION['msg'] = " Error al subir la imagen.";
            $cli = (object) $_POST;
            $orden = "Modificar";
            include_once "app/views/formulario.php";
            return;
        }
    }

    $_SESSION['msg'] = $db->modCliente($cli) ? " El usuario ha sido modificado" : " Error al modificar el usuario ";
}
