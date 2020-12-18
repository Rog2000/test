<?php
    session_start();
    $articles = array();

    if (!isset($_POST['password'])) {
        $password = '';
    } else {
        $password = $_POST['password'];
    }

    if (!isset($_POST['login'])) {
        $login = '';
    } else {
        $login = $_POST['login'];
    }
    $password = stripslashes($password); 			$password = htmlspecialchars($password);			$password = trim($password);
    if($login AND $password){
        require "connect.php";
        $mysqli->query("UPDATE customer SET password = '$password' WHERE email = '$login'");
        $articles[0] = 1;
    } else {
        $articles[0] = 0;
    }



    echo json_encode($articles);


?>