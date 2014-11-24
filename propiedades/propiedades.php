<!DOCTYPE html>
<?php
session_start();
require_once("coordenadas.php");
require_once("../bbdd/bbdd.php");
$usuario = $_SESSION["username"];

$exif = exif_read_data($_FILES["imagen"]["tmp_name"], 'IDF0',true);
    //echo "Propiedades de un JPG:<br />\n";
    //foreach ($exif as $clave => $seccion) {
    //  foreach ($seccion as $nombre => $valor) {
    //    echo "$clave.$nombre: $valor<br />\n";
    //}
    //}

$imagen = $_FILES["imagen"]["tmp_name"];
/*$imagen_original = imagecreatefrompng($imagen); MAL BUSCAR OTRO!!
$ancho_original = imagesx($imagen_original);
$alto_original = imagesy($imagen_original);
$ancho = 250;
$alto = 250;
$imagen_redimensionada = imagecreatetruecolor($ancho, $alto);
imagecopyresampled($imagen_redimensionada, $imagen_original, 0, 0, 0, 0, $ancho, $alto, $ancho_original, $alto_original);
imagedestroy($imagen_original);
imagedestroy($imagen_redimensionada);*/

$ruta_destino = "../imagenes/";
$nombre_imagen = trim($_FILES["imagen"]["name"]);
$nombre_imagen = ereg_replace(" ", "", $nombre_imagen);
$ruta = $ruta_destino.$nombre_imagen; 
move_uploaded_file($imagen_redimensionada, $ruta);

$nombre = $_FILES["imagen"]["name"];
$tipo = $exif['FILE']["MimeType"];
$lon = getGps($exif['GPS']["GPSLongitude"], $exif['GPS']['GPSLongitudeRef']);
$lat = getGps($exif['GPS']["GPSLatitude"], $exif['GPS']['GPSLatitudeRef']);
eliminar($nombre);
insertar($nombre, $usuario, $ruta, $tipo, $lon, $lat);
?>
