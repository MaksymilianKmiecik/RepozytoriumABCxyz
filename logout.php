<?php
    session_start();
    if(1==1)
    {
        header('Payments.php');
        
    }

    session_unset();

    

    
?>
<style>
    body
    {
        background-color: #ebc45b;
    }
.wyjdz
{
    
    padding-top: 10%;
    text-align: center;
    font-size: 300%;
}
a
{
    color: green;

}
a:hover
{
    color: red;
}


</style>

<div class="wyjdz">
Nastąpiło wylogowanie z sesji<br>
<a href="Payments.php">Ok</a>

</div>
