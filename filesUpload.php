<?php

    session_start();
    include_once 'createFolder.php';
    if(isset($_POST['submit']))
    {
        $file=$_FILES['file'];

        $fileName=$_FILES['file']['name'];
        $fileTmpName=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];

        $fileExt=explode('.', $fileName);
        $fileActualExt=strtolower(end($fileExt));

        

        
       
            if($fileError===0)
            {
                if($fileSize<1000000000)
                {
                    $_SESSION['nazwa']=$fileName;
                    $Crefolder=$_SESSION['Crefolder'];
                    echo $Crefolder;
                    
                  /* $fileNameNew=uniqid('', true).".".$fileActualExt;*/
                    $fileDestination="resources/".$Crefolder."/".$fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $_SESSION['dzie']=$fileDestination;
                    if($Crefolder=='uploads/')
                    {
                       /* header("Location: Interface.php");*/
                        echo"dziala";
                    }else
                    {
                        echo $Crefolder;
                        header("Location: Interface".$Crefolder.".php");
                        echo"nie dziala";
                    }
                    

                }else{
                    echo "Za duży plik";
                }
                
            }else{
                echo "Wystąpił błąd";
            }

        }else
        {
            echo "Niedozwolony typ plik";
        }
   
    
?>
