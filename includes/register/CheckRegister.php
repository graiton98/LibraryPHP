<?php


if(isset($_POST)){
    
    require_once '../../database/Database.php';
    require_once '../user/UserClass.php';
    
    $db = new Database();
    $conn = $db->getConnection();
    
    if(!isset($_SESSION))session_start();
    if(isset($_SESSION['completed'])) unset($_SESSION['completed']);
    
    $user = isset($_POST['username']) ? $conn->escape_string($_POST['username']) : false;
    $password = isset($_POST['password']) ? $conn->escape_string($_POST['password']) : false;
    $name_user = isset($_POST['name_user']) ? $conn->escape_string($_POST['name_user']) : false;
    $first_surname = isset($_POST['first_surname']) ? $conn->escape_string($_POST['first_surname']) : false;
    $dni = isset($_POST['dni']) ? $conn->escape_string($_POST['dni']) : false;
    $email = isset($_POST['email']) ? $conn->escape_string($_POST['email']) : false;;
    $phone_number = isset($_POST['phone_number']) ? $conn->escape_string($_POST['phone_number']) : false;
    $type_of_user = isset($_POST['type_of_user']) ? $conn->escape_string($_POST['phone_number']) : false;
    
    //Array de errores
    $errors = array();
    
    if($db->checkUser($user))$errors['user'] = "This user is already being used";
    
    if(is_numeric($name_user) || preg_match("/[0-9]/", $name_user)) $errors['name_user'] = "Name not valid";
    
    if(is_numeric($first_surname) || preg_match("/[0-9]/", $first_surname)) $errors['first_surname'] = "Surname is not valid";
    
    if(strlen($dni)<9 || !checkDni($dni)) $errors['dni'] = "Dni not valid";
    elseif ($db->checkEmail($email))$errores['dni'] = "This dni is already being used";
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores['email'] = "Email not valid";
    elseif ($db->checkEmail($email))$errores['email'] = "This email is already being used";

    if($db->checkPhone($phone_number))$errores['email'] = "This phone is already being used";
    
    if(count($errors) == 0){
        //Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]); //cifra la contraseña cuatro pasadas
        
        if($type_of_user) $userObject = new User($user, $password_segura,$name_user, $first_surname, $dni, $email,$phone_number, $type_of_user);
        else $userObject = new User($user, $password_segura,$name_user, $first_surname, $dni, $email,$phone_number);
        
        
        if($db->insertUser($userObject))$_SESSION['completed'] = "Registration completed successfully";
        else $_SESSION['completed'] = "Registration Error";
    }
}

function checkDni($dni){
    if(!ctype_alpha(substr($dni, -1)) || !is_numeric(substr($dni, 0, -1))) return false;
    return true;
}

header("Location: Register.php");