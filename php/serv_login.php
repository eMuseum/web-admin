<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


function verificar_login($user,$pass) 
{ 
    if($user == 'admin' && $pass == 'emuseumpis_12'){
        return 1;
    } 
    else 
    { 
        return 0; 
    } 
} 



if(isset($_POST['username']) && isset($_POST['pass']) )
{
    $user = $_POST['username'];
    $pass = $_POST['pass'];

    if(verificar_login ($user,$pass) == 1)
    { 
        session_start();
        $_SESSION['logged'] = TRUE;
        header("location:../index.php"); 
    } 
    else 
    { 
        header("location:../index.php?err=22");
    } 

}else{
    echo "No Variables";
    //header("location:../index.php?err=22");

} 


?>