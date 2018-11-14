<?php


class User {
   private $id;
   private $username;
   private $password;
   private $name_user;
   private $first_surname;
   private $dni;
   private $email;
   private $phone_number;
   private $type_of_user;
   
   public function __construct($username, $password, $name_user = "-1", $first_surname = "-1", $dni = "-1",$email = "-1",  $phone_number = "-1", $type_of_user = "0", $id = -1) {
       $this->username = $username;
       $this->password = $password;
       if($name_user != "-1"){
           $this->id = $id;
           $this->name_user = $name_user;
           $this->first_surname = $first_surname;
           $this->dni = $dni;
           $this->email = $email;
           $this->phone_number = $phone_number;
           $this->type_of_user = $type_of_user;
       }
       
   }
   public function __construct1($hola){
       echo "hola";
       die();
   }
   
   /*Getters*/
   
   public function getUsername(){
       return $this->username;
   }
   public function getPassword(){
       return $this->password;
   }
   
   function getId() {
       return $this->id;
   }

   function getName_user() {
       return $this->name_user;
   }

   function getFirst_surname() {
       return $this->first_surname;
   }

   function getDni() {
       return $this->dni;
   }

   function getEmail() {
       return $this->email;
   }

   function getPhone_number() {
       return $this->phone_number;
   }

   function getType_of_user() {
       return $this->type_of_user;
   }
   
   /*Setters*/
   
   function setId($id) {
       $this->id = $id;
   }

   function setName_user($name_user) {
       $this->name_user = $name_user;
   }

   function setFirst_surname($first_surname) {
       $this->first_surname = $first_surname;
   }

   function setDni($dni) {
       $this->dni = $dni;
   }

   function setEmail($email) {
       $this->email = $email;
   }

   function setPhone_number($phone_number) {
       $this->phone_number = $phone_number;
   }

   function setType_of_user($type_of_user) {
       $this->type_of_user = $type_of_user;
   }
   
   public function setUsername($username){
       $this->username = $username;
   }
   public function SetPassword($password){
       $this->password = $password;
   }
   
   public function __destruct() {}
}
