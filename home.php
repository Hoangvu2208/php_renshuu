<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

$email = "";
session_start();
if (isset($_SESSION['email'])){
   // var_dump($_SESSION['email']);
   $email = $_SESSION['email'];
}else{
    header('location:login.php');
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php 
    if ($email != ''){
        echo '<h2 style="text-align: center;">'.$email.'</h2>';
    }else{
        echo "error";
    }
    
    ?>
    
    
    
</body>
</html>