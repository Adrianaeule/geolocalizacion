<!DOCTYPE html>

<?php
require_once("../bbdd/bbdd.php");
    function Registro(){
        ?>
        <form action="registro.php" method="post">
            Usuario: 
        <input type="text" name="username" size="30" maxlength="20" /><br />
            Password: 
        <input type="password" name="password" size="40" maxlength="10" />
            Confirma:
        <input type="password" name="password2" size="40" maxlength="10" /><br />
        <input type="submit" value="Registrar" />
        </form>   
        <?php
    }
    if (isset($_POST["username"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        if($username==NULL | $password==NULL | $password2==NULL){ //si hay campos en blanco...
            echo "Un campo está vacio.";
            Registro(); //MIRAR COMO LLAMAR DE NUEVO AL FORMULARIO DE REGISTRO
        }
        else{
            if($password!=$password2){ //si las contraseñas introducidas no coinciden...
                echo "Las contraseñas no coinciden";
                Registro();
            }
            else{
                $checkuser = seleccionarusuario($username);
                $username_exist = mysqli_num_rows($checkuser);
                if ($username_exist > 0) { //si el usuario existe
                    echo "El nombre de usuario está ya en uso";
                    Registro();
                }
                else{
                    insertarlogin($username, $password);
                    echo 'El usuario '.$username.' ha sido registrado de manera satisfactoria.<br />';
                    ?>
                        <SCRIPT LANGUAGE="javascript"> location.href = "../index.php" </SCRIPT>
                    <?php

                }
            }
        }
    }
    else{
        Registro();
    }
?>