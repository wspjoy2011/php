<?php
session_start();
if (isset($_SESSION['user'])) {
    $name = $_SESSION['user']['name'];
    $email = $_SESSION['user']['email'];
    $created_at = $_SESSION['user']['created_at'];
    $photo = $_SESSION['user']['photo'];

    include_once 'templates/profile.html';
} else {
    $_SESSION['msg'] = "You have to login.";
    header('Location: index.php');
}