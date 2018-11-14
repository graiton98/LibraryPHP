<?php

require_once '../form/FormClass.php';
require_once '../form/LabelInputClass.php';
session_start();
if(isset($_SESSION['completed'])): ?>
    <div class="alerta">
        <?= $_SESSION['completed']?>
    </div>
<?php endif; ?>
<?php
$form = new Form("CheckRegister.php", "Register");
$form->addField(new LabelInput("username", "Username", "text"));
$form->addField(new LabelInput("password", "Password", "password"));
$form->addField(new LabelInput("name_user", "Name", "text"));
$form->addField(new LabelInput("first_surname", "First Surname", "text"));
$form->addField(new LabelInput("dni", "Dni", "text"));
$form->addField(new LabelInput("email", "Email", "email"));
$form->addField(new LabelInput("phone_number", "Phone Number", "number"));

$form->printForm();
