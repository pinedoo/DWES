<?php 
session_start();
$compraRealizada="";
if(!isset($_SESSION['cliente'])) {
    if(isset($_GET['cliente']) && !empty($_GET['cliente'])){
        $_SESSION['cliente'] = htmlspecialchars($_GET['cliente']);
        $_SESSION['pedidos'] =[];
        header("Location: index.php");
        exit();
    } else {
        include("bienvenida.php");
        exit();
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['fruta'], $_POST['cantidad'], $_POST['accion'])) {
        $fruta= htmlspecialchars($_POST['fruta']);
        $cantidad = $_POST['cantidad'];

        if($_POST['accion'] === " Anotar " && $cantidad >0){
            if(isset($_SESSION['pedidos'][$fruta])){
                $_SESSION['pedidos'][$fruta] += $cantidad;
            } else{
                $_SESSION['pedidos'][$fruta]= $cantidad;
            }
            $compraRealizada= "<p>Se ha añadido $cantidad de $fruta a su pedido.</p>";
            }
        if($_POST['accion'] === " Anular "){
            if(isset($_SESSION['pedidos'][$fruta])){
                $compraRealizada= "<p>Se ha retirado $fruta de su pedido.</p>";
                unset($_SESSION['pedidos'][$fruta]);
                }
            }    
        if($_POST['accion'] === " Terminar ") {
            $compraRealizada= "<p>Su pedido se ha completado. A continuación se muestra la tabla de su pedido.</p>";
            $pedidos= $_SESSION['pedidos'];
            include("despedida.php");
            session_destroy();
            exit();
        }
        }
    }
include("compra.php")
?>