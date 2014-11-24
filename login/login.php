<!DOCTYPE html>
<?php
    require_once("../bbdd/bbdd.php");
    function Ingreso(){
        ?>
        <form action="login.php" method="post">
            Usuario:
                <input type="text" name="usuario" size="30" maxlength="20" /><br />
            Password:
                <input type="password" name="password" size="40" maxlength="10" /><br />
            <input type="submit" value="Ingresar" />
        </form>
        <?php
    }
    if (isset($_POST["usuario"])){ 
        if(trim($_POST["usuario"]) != '' && trim($_POST["password"]) != ''){
            $usuario = $_POST["usuario"]; 
            $password = $_POST["password"];
            $sql = seleccionarpassword($usuario);
            $row = mysqli_fetch_array($sql);
            if($row["nombre"] == $usuario){ //si existe el usuario en la bbdd
                if($row["password"] == $password) { //si la contraseña coincide con la almacenada
                    $_SESSION["k_username"] = $row["nombre"];
                    echo 'Has sido logueado correctamente '.$_SESSION["k_username"].' <p>';
                    ?>
                    <SCRIPT LANGUAGE="javascript"> location.href = "../index.php" </SCRIPT>
                    <?php
                }
                else{
                    echo 'Password incorrecto';
                    Ingreso();
                }
            }
            else{
                echo 'Usuario no existente en la base de datos';
                Ingreso();
            }
        }
        else{
            echo 'Debe especificar un usuario y password';
            Ingreso();
        }
    }
    else{ 
        Ingreso();
    }
    
?>
