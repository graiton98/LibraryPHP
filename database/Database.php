<?php

require_once 'databaseCredentials.php';
require_once 'includes/book/BookClass.php';

class Database {
    private $connection;
    public function __construct() {
        $this->connection = new mysqli(SERVER_NAME, SERVER_USER, SERVER_PASSWORD, SERVER_DATABASE);
    }
    public function getConnection(){
        return $this->connection;
    }
    public function checkUser($user){
        $SQLQuery = "select * from users where username='{$user}'";
        $login = $this->connection->query($SQLQuery);
        if($login->num_rows == 1)return true;
        return false;
    }
    public function checkPhone($phone){
        $SQLQuery = "select * from users where phone_number='{$phone}'";
        $login = $this->connection->query($SQLQuery);
        if($login->num_rows == 1)return true;
        return false;
    }
    public function checkEmail($email){
        $SQLQuery = "select * from users where email='{$email}'";
        $login = $this->connection->query($SQLQuery);
        if($login->num_rows == 1)return true;
        return false;
    }
    
    public function obtainUser($username){
        $SQLQuery = "select * from users where phone_number='{$username}'";
        $login = $this->connection->query($SQLQuery);
        $aux = $login->fetch_assoc();
        //return new User($login);
        return new User($aux['username'], $aux['password'], $aux['name_user'], $aux['first_surname'], $aux['dni'], $aux['email'], $aux['phone_number'], $aux['type_of_user'], $aux['id']);
    }
    
    /*public function checkUserifExists($user){
        require_once '../user/UserClass.php';
        $SQLQuery = "select * from users where username='{$user->getUsername()}'";
        
        $login = $this->connection->query($SQLQuery);
        session_start();
        if($login->num_rows == 1){
            $aux = $login->fetch_assoc();
            
            $userObtained = new User($aux['username'], $aux['password'], $aux['id'], $aux['name_user'], $aux['first_surname'], $aux['dni'], $aux['email'], $aux['phone_number']);

            // Check Password
            $verify = password_verify($user->getPassword(), $userObtained->getPassword());
            if($verify){
                // Utilizar una sesión para guardar los datos del usuario logueado

                $_SESSION['user'] = $userObtained;
                $_SESSION['error_login'] = "Login Completado";
                header("Location: Login.php");
            }else{
                // Si algo falla, crear una sesión con el fallo
                $_SESSION['error_login'] = "Login Incorrecto!!!";
                header("Location: Login.php");
            }
        }else{
            // mensaje de error
            $_SESSION['error_login'] = "Login Incorrecto!!!";
            header("Location: Login.php");
        }
    
    }*/
    public function getStationedBooks(){
        $books = [];
        $SQLQuery = "select * from Books where stationed=1";
        
        $login = $this->connection->query($SQLQuery);
        while($aux = $login->fetch_assoc()){
            $books[] = new Book($aux['isbn'], $aux['name_book'], $aux['id'], $aux['category_id'], $aux['author_id'], $aux['description'], $aux['stationed']);
        }
        return $books;
    }
    public function insertUser($user){
        $SQLQuery = "insert into users values(null, '{$user->getUsername()}', '{$user->getPassword()}', '{$user->getName_user()}', '{$user->getFirst_surname()}', '{$user->getDni()}', '{$user->getEmail()}', '{$user->getPhone_number()}', {$user->getType_of_user()})";
        
        return $this->connection->query($SQLQuery);
        
    }
}
