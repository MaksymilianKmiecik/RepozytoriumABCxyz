<?php
    session_start();

    if((isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true)))
    {
        header('Location:Interface.php');
        exit();
    }
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Paystyles.css">
<script src="Payscript.js" defer></script>
<title>Logowanie</title>
</head>
<body>
    <div class="header">ABC XYZ</div>
    <div class="mainPanel">
      
     <div class="window">
         <div class="input">
             <form action="login.php" method="post">

           <input type="text" name="login">
           <p>
                <input type="password" name="haslo">
           </p>
           <p>
               <input type="submit" value="Zaloguj">
           </p>
            </form>
            <?php 
            if(isset($_SESSION['blad']))
            {
                echo $_SESSION['blad'];
            }
             ?>
         </div>
     </div>
           
      
    </div>
    <div class="foot">Maksymilian Kmiecik<br>maks.kmiecik@gazeta.pl</div>



</body>


</html>