<?php
if(isset($_POST)){
    
    if(!isset($_SESSION))session_start();
    
    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    require_once '../../database/Database.php';
    require_once '../user/UserClass.php';
    $db = new Database();
    
    if($db->checkUser($username)){
        $userObject = $db->obtainUser($username);
        $_SESSION['user'] = $userObject;
        header('Location: ../../index.php');
    }else{
        $_SESSION['error_login'] = "Login Incorrect";
        header('Location: Login.php');
    }
        
    
}

