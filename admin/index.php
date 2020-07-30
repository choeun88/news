<?php
    session_start();
    if(strlen($_SESSION['login'])==0){
        header("Location: login.php");
    }else{
        header("Location: dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php include('includes/header.php');?>

    <body class="bg-transparent">

      
    </body>
</html>