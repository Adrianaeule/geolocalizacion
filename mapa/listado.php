
<?php 
    session_start();
    require_once("../bbdd/bbdd.php");
    $usuario = $_SESSION["username"];
    $result = seleccionartodos($usuario);
    echo "<table border = '0'> \n"; 
    echo "</td><td>NOMBRE</td><td>IMAGEN</td></tr> \n"; 
    while ($row = mysqli_fetch_row($result)){ 
        $nombre = $row[0];
        $foto = $row[1];
        echo "<td>$nombre</td><td><a href ='mapa.php?nombre=$nombre'><img src=$foto></a></td></tr> \n"; 
    } 
    echo "</table> \n"; 
?> 
