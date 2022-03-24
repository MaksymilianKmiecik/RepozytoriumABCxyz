<?php

session_start();


include_once 'connect.php';


$sessionid=$_SESSION['id'];

 $login=$_POST["login"];
    
    
    
    $sql="DELETE FROM konta WHERE login='$login' ";

    mysqli_query(mysqli_connect("localhost","root","","payments"), $sql);

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