<?php

if (isset($_POST["contact"]) AND isset($_POST["DU"]))	{							//получаем контакт и понимаем добавили его или убрали
    $contact   = $_POST["contact"];
    $DU     = $_POST["DU"];
    $email  = $_POST["email"];
    require "connect.php";
    $sqlmail = ("SELECT * FROM favorites WHERE email = '$email'");    // получаем список избранного пользователя
    $result1 = $mysqli->query($sqlmail);
    $row = $result1->fetch_assoc();
    $favorit = $row["favorit"];
    if(empty($favorit)){
        require "connect.php";
        $mysqli->query("INSERT INTO favorites (email, favorit) 
		Values ('$email', '$contact')");
    } else {
        if($DU == 0){           // добавляем контакт
            $favorit = $favorit.",".$contact;
            require "connect.php";
            $mysqli->query("UPDATE favorites SET favorit = '$favorit' WHERE email = '$email'");
        } else {               // забираем контакт
            $variki = array($contact.",", ",".$contact);
            $favorit = str_replace($variki, "", $favorit);
            require "connect.php";
            $mysqli->query("UPDATE favorites SET favorit = '$favorit' WHERE email = '$email'");
        }
    }


}







?>










