<?php



    if(isset($_POST['crefolder']))
    {
        $Crefolder=$_POST['crefolder'];
        
        echo $Crefolder."and??";
       
        mkdir('resources/'.$Crefolder, 0400);
       if(!copy('Interface.php', 'Interface'.$Crefolder.'.php'))
       {
            echo "NAJN";
            header('Interface'.$Crefolder.'.php');
       }else
       {
           
           echo "no i co";
               header("Location: Interface".$Crefolder.".php");
           
           
       }
        
    }else{
        $Crefolder='uploads/';
        
    }

    


?>  