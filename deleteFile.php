<?php
include_once 'createFolder.php';
session_start();
    if(isset($_POST['delfile']))
    {
        $delfile=$_POST['delfile'];
        $Crefolder=$_SESSION['Crefolder'];
        echo $Crefolder;
        if($Crefolder=='uploads/')
        {
            unlink("resources/upload/".$delfile);
        header("Location: Interface.php");
        }else
        {
            unlink("resources/".$Crefolder."/".$delfile);
        header("Location: Interface".$Crefolder.".php");
        }
        
    }else{
        echo"bieda nie działa";
    }




?>  