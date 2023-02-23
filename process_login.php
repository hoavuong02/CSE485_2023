<?php




//user = abc
//password = 111
// var_dump($_SERVER["REQUEST_METHOD"] == "POST");
session_start();

if(isset($_POST['txtUser'])) 
{
    $user = $_POST['txtUser'];
    $password = $_POST['txtPassword'];

    if($user == 'abc' && $password == '111'){
        $_SESSION['user'] = $user;
        header('Location: admin/index.php');
    }else
    {
        header("Location: login.php?error=invalid user or password");
    }

}


?>