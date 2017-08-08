<?php 
if (isset($_POST['nombre'])) { 

require('../bdd/base.php');

$nombre = strip_tags(htmlspecialchars($_POST['nombre']));
$rut = strip_tags(htmlspecialchars($_POST['rut']));
$region = strip_tags(htmlspecialchars($_POST['region']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$telefono = strip_tags(htmlspecialchars($_POST['telefono']));
$fecha = date("y-m-d"); 

/*Insert datos de Usuario*/

$sql = "INSERT INTO datos (dato_nombre, dato_rut, dato_region, dato_mail, dato_telefono, dato_fecha)
        VALUES ('$nombre', '$rut', '$region' ,'$email' ,'$telefono', '$fecha')";

$result = mysql_query($sql);

}
?>