<?php
session_start();
require_once 'connect.php';
define ('SITE_ROOT', realpath(dirname(__FILE__)));
echo __DIR__;

if (isset($_POST['name']) && isset($_POST['email']) && $_POST['password']
    && $_POST['re_password']) {

    $name = $_POST['name'];
    $login = $_POST['email'];
    $path = '';
    $created_date = date("Y-m-d H:i:s");

    if (isset($_FILES['photo'])) {
        $photo = $_FILES['photo'];
        $path ='uploads/' . time() . '_' . $photo['name'];

        if(!move_uploaded_file($photo['tmp_name'], '../' . $path)) {
            $_SESSION['msg'] = "Upload file error!";
            header('Location: http://127.0.0.1/auth_reg/registration.php');
        }

    }

    if ($_POST['re_password'] !== $_POST['password']) {
        $_SESSION['msg'] = "Passwords don't match";
        header('Location: http://127.0.0.1/auth_reg/registration.php');
    } else {
        $pass = hash('sha512', $_POST['password']);
    }

    $sql = "INSERT INTO `users` (`id`, `name`, `login`, `password`, `created_at`, `level`, `photo`)
            VALUES (NULL, '" . $name . "', '" . $login . "', '" .  $pass ."', '" . $created_date . "', NULL, '" . $path ."')";

    try {
        $connect->exec($sql);
    } catch (PDOException $e) {
        die('Insert error: ' . $e->getMessage());
    }


    $_SESSION['msg'] = "Registration completed successfully.";
    header('Location: ../index.php');

}
else {
    header('Location: http://127.0.0.1/auth_reg/');
}