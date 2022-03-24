<?php

    session_start();

    if(!isset($_POST['login'])||(!isset($_POST['haslo'])))
    {
        header('Location:Payments.php');
        exit();
    }


    require_once "connect.php";

    $polaczenie= mysqli_connect($host, $user, $password, $database);
    $_SESSION['polaczenie']=$polaczenie;
    if($polaczenie->connect_errno !=0)
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else{
        
        $login=$_POST['login'];
        $haslo=$_POST['haslo'];

        $Nhaslo=password_hash($haslo, PASSWORD_BCRYPT);

        
        echo $haslo;

        $sql="SELECT * FROM konta WHERE login='$login' AND haslo='$haslo'";
        
        password_verify($haslo, $Nhaslo);
        if($rezultat=$polaczenie->query($sql))
        {
            echo " jest wynik";
            $ilu_userow=$rezultat->num_rows;
            
            
            if($ilu_userow>0)
            { 

                $_SESSION['zalogowany']=true;
                

                $wiersz=$rezultat->fetch_assoc();
                $_SESSION['login']=$wiersz['login'];
                $_SESSION['id']=$wiersz['id'];

                
                
                unset($_SESSION['blad']);
                $rezultat->free_result();

                header('Location:Interface.php');

                echo $login;
            }else
            {
                $_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło</span>';
                header('Location: Payments.php');
                
            }
        }
        
        
        
        $polaczenie->close();
        
        

    }
    
    
?>