<?php

session_start();


include_once 'connect.php';

    $login=$_POST["login"];
    $haslo=$_POST["haslo"];
    $uprawnienia=$_POST['uprawnienia'];
    
    $sql="INSERT INTO konta (login, haslo, uprawnienia) VALUES ('$login', '$haslo', '$uprawnienia')";

    mysqli_query(mysqli_connect("localhost","root","","payments"), $sql);

    $sql="SELECT * FROM konta WHERE login='login'";
    $result=mysqli_query(mysqli_connect("localhost","root","","payments"), $sql);

    if(mysqli_num_rows($result)>0)
    {
        header('Location: Interface.php');
    }
    else{
        echo "Błąd";
        header('Location: Interface.php');
    }




?>  