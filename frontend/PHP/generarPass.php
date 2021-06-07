<?php

    //Si se quiere generar una contraseña
    if (isset($_POST['generar'])) {
        //Carácteres para la contraseña
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $password = "";
        //Reconstruimos la contraseña segun la longitud que se quiera
        for($i=0;$i<$_POST['longitud'];$i++) {
        //obtenemos un caracter aleatorio escogido de la cadena de caracteres
        $password .= substr($str,rand(0,62),1);
        }
        //Mostramos la contraseña generada
        echo 'Password generado: '.$password;
    }
    
 ?>