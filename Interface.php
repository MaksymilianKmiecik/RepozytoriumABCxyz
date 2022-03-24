<?php
    session_start();
    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: Payments.php');
        exit();
        
include_once 'createFolder.php';
    }else
    {
      
include_once 'createFolder.php';
    }






?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Paystyles.css">
<script src="Payscript.js" defer></script>
<title>ABC XYZ by Maksymilian Kmiecik</title>
</head>
<body>
   
           <div class="viewPort_header">ABC XYZ</div>
           <div class="viewPort_corner">

                <?php
                    echo $_SESSION['login'];
                    ?>
               <p>
                   <a href="logout.php">Wyloguj</a>
               </p>
           </div>
           <div class="viewPort_nav">
        <?php
$currentName=basename($_SERVER['SCRIPT_FILENAME']);

$newName=rtrim($currentName,".php");
$newName=ltrim($newName, "\Interface");
if($newName=="")
{
  $Crefolder="uploads/";
}else
{
  
  $Crefolder=$newName;
}
$_SESSION['Crefolder']=$Crefolder;
include_once 'createFolder.php';



$katalog="resources/";
		$dir = opendir($katalog);
while(false !== ($file = readdir($dir)))
  if($file != '.' && $file != '..')
  {
    if ($file=='uploads') { 
    echo "<a href='Interface.php'>".$file."</a><br />";
  } else
  {
    echo "<a href='Interface".$file.".php'>".$file."</a><br />";
  }
  }
  
    
  




?>
        <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payments";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT login FROM konta WHERE uprawnienia='a'";
$result = $conn->query($sql);
$git=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row['login']==$_SESSION['login'])
    {
        $git++;
    }
  }
} else {
  echo "0 results";
}


        if($git>0)
        {

        
        echo "
            <div class='adminBar'>
            
                <div data-tab-target='#admin'>Zarządzaj</div>

            


            </div>";
        }


            ?>
           </div>
           <div class="viewPort_panel">

           <?php 

        if($Crefolder=='uploads/')
        {
          

          $currentFolder='uploads/';
              
           echo "<div class='folderTitle'>Folder: ".$currentFolder."</div><br>";

            $katalog="resources/".$currentFolder."/";
            $dir = opendir($katalog);
            while(false !== ($file = readdir($dir)))
            if($file != '.' && $file != '..') 
            echo "<a href='resources/".$file."' download>".$file ."</a><br />";
        }else
        {
          
          
          $currentFolder=$Crefolder;
              
           echo "Folder: ".$currentFolder."<br>";

            $katalog="resources/".$currentFolder."/";
            $dir = opendir($katalog);
            while(false !== ($file = readdir($dir)))
            if($file != '.' && $file != '..') 
            echo "<a href='resources/".$file."' download>".$file ."</a><br />";
        }


            


            




           ?>

                
               <form class="fileFrom" method="POST" action="filesUpload.php" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <button class="fileButton" type="submit" name="submit" onclick="refreshFiles()">Prześlij</button>


               </form>
               <br>
               <?php

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "payments";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT login FROM konta WHERE uprawnienia='a'";
                    $result = $conn->query($sql);
                    $git=0;
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        if($row['login']==$_SESSION['login'])
                        {
                            $git++;
                        }
                    }
                    } else {
                    echo "0 results";
                    }
                    $conn->close();


                    if($git>0)
                    {



               



                    echo "<div data-tab-content id='admin' class='adminPanel'>Użytkownicy:<br><br>";
                    
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "payments";
                        
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                        }
                        
                        $sql = "SELECT login, uprawnienia FROM konta";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            echo "UŻYTKOWNIK: " . $row["login"]." UPRAWNIENIA: ".$row['uprawnienia']."<br>";
                          }
                        } else {
                          echo "0 results";
                        }
                        $conn->close();
                     
                     
                     echo "<form action='addUser.php' method='POST'>

                        <input type='text' name='login' placeholder='Podaj login'>
                        <input type='password' name='haslo' placeholder='Podaj hasło'>
                        <input type='text' name='uprawnienia' placeholder='Uprawnienia: a/u'>
                        <button type='submit' name='submitNewUser'>Utwórz</button>

                     </form>
                     <br>
                     <form action='deleteUser.php' method='POST'>

                        <input type='text' name='login' placeholder='Podaj login'>
                        <button type='submit' name='submitNewUser'>Usuń</button>

                     </form><br>


                            Pliki i foldery:<br>
                            <form action='deleteFile.php' method='POST'>
                            <input type='text' name='delfile' placeholder='Nazwa pliku do usunięcia'>
                            <button type='submit'>Usuń</button>
                            </form>
                            <br>
                            <form action='createFolder.php' method='POST'>
                            <input type='text' name='crefolder' placeholder='Nazwa folderu'>
                            <button type='submit'>Utwórz folder</button>
                            </form>
                        </div>";



                        

                        }
                        ?>
            

           </div>
      
    
           


</body>


</html>