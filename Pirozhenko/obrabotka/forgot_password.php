<?php
session_start();
$articles = array();
if (!isset($_POST['email'])) {
    $email = '';
} else {
    $email = $_POST['email'];
}
$email = stripslashes($email); 		$email = htmlspecialchars($email); 	    $email = trim($email);
require "connect.php";
$sqlTalon = ("SELECT password FROM customer WHERE email = '$email'");
$resultProd = $mysqli->query($sqlTalon);
$row = $resultProd->fetch_assoc();
if ($row["password"]){
    $password = $row["password"];

    $subject = "Forgot password VashSait";
    $message = "You need not reply to this email.<br>".
        "Your login is ".$email."<br>".
        "Your password is: ".$password."<br>".
        "<a href='VashSait'>We invite you to visit our website VashSait</a><br>";

    $boundary = "--".md5(uniqid(time()));
    $to = $email;
    $mailheaders = "MIME-Version: 1.0;\r\n";
    $mailheaders .="Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
    $mailheaders .= "From: <auto@VashSait>\r\n";
    $multipart = "--$boundary\r\n";
    $multipart .= "Content-Type: text/html; charset=utf-8\r\n";
    $multipart .= "Content-Transfer-Encoding: base64\r\n";
    $multipart .= "\r\n";
    $multipart .= chunk_split(base64_encode(iconv("utf-8", "utf-8", $message)));

    mail($to,$subject,$multipart,$mailheaders);
    $articles[0] = "ComeGetSome";
    echo json_encode($articles);
} else{
    $articles[0] = "errormail";
    echo json_encode($articles);
}



?>