<?php
session_start();
require_once 'connect.php';

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $pass = hash('sha512', $_POST['password']);

    $flag = false;

    $sql = "SELECT * FROM `users` WHERE `name` = '$login';";

//    $row = $connect->prepare($sql);
//    $row->execute(array($login));
//    $count_r = $row->rowCount(); # посчитать колличество строк в ответе
//    echo "Count row: $count_r";

    foreach ($connect->query($sql) as $row) {
        if ($row['name'] == $login && $row['password'] == $pass) {
            $_SESSION['user'] = [
                'name' => htmlspecialchars($row['name']),
                'email' => htmlspecialchars($row['login']),
                'created_at' => htmlspecialchars($row['created_at']),
                'photo' => htmlspecialchars($row['photo'])
            ];
            header('Location: ../profile.php');
            $flag = true;
        }
    }

    if (!$flag) {
        $_SESSION['msg'] = "Wrong login or password.";
        header('Location: ../index.php');
    }
}