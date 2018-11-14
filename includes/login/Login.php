<?php

require_once '../form/FormClass.php';
require_once '../form/LabelInputClass.php';


if(!isset($_SESSION))session_start();

if(isset($_SESSION['error_login'])): ?>
    <div class="alerta alerta-error">
        <?= $_SESSION['error_login']?>
    </div>
<?php endif; ?>
<?php
$form = new Form("CheckLogin.php", "Login");
$form->addField(new LabelInput("username", "Username", "text"));
$form->addField(new LabelInput("password", "Password", "password"));

$form->printForm();

