<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
if (!empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['firstname']) )	{   //проверяем все ли данные заполненны
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['firstname'];
    $email = stripslashes($email); 			$email = htmlspecialchars($email); 			$email = trim($email);
    $password = stripslashes($password); 	$password = htmlspecialchars($password); 	$password = trim($password);
    $name = stripslashes($name); 			$name = htmlspecialchars($name); 			$name = trim($name);

    require "connect.php";
    $sqlTalon = ("SELECT email FROM customer WHERE email = '$email'");// проверяем почту нет ли уже такой в базе
    $resultProd = $mysqli->query($sqlTalon);
    $row = $resultProd->fetch_assoc();
    if ($row["email"]){
        $message = "<p style='color: maroon'>Такая почта уже зарегистрирована!</p>";
    } else{
        require "connect.php";
        $mysqli->query("INSERT INTO customer (firstname, email, password, date_added) 
		Values ('$name', '$email', '$password', NOW())");
        // Шлем письмо с логином и паролем на почту
        $subject = "Спасибо за регистрацию на сайте 'Vash sait' ";
        $message = "You need not reply to this email.<br>".
            "Your login is ".$email."<br>".
            "Your password is: ".$password."<br>".
            "<a href='https://Vash sait/'>We invite you to visit our website Vash sait</a>";
        $boundary = "--".md5(uniqid(time()));
        $to = $email;
        $mailheaders = "MIME-Version: 1.0;\r\n";
        $mailheaders .="Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
        $mailheaders .= "From: <auto@Vashsait<>\r\n";
        $multipart = "--$boundary\r\n";
        $multipart .= "Content-Type: text/html; charset=utf-8\r\n";
        $multipart .= "Content-Transfer-Encoding: base64\r\n";
        $multipart .= "\r\n";
        $multipart .= chunk_split(base64_encode(iconv("utf-8", "utf-8", $message)));

        mail($to,$subject,$multipart,$mailheaders);

        $_SESSION['firstname'] = $name;
        $_SESSION['login'] = $email;
        header('Location: index.php');
        $message ='';
    }
} else {
    $message = "<p id='message' style='color: maroon; display: none;'></p>";
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>регистрация</title>
    <link rel="shortcut icon" href="images/icon1.png" type="image/x-icon">
    <link href="css/index.css?ver=128" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="/test/images/logo.png" />
</head>
<body>
<div id="loginForm" class="forms">
    <form action='registration.php' method='post'>
        <div style="width: 90%; max-width: 400px; display: inline-block; z-index: 5; position: relative;">
            <div id="tutLogin" class="tut" style="height: 350px;">
                <?php
                    echo $message;
                ?>

                <h2>Регистрация</h2>
                <div class="check-block">
                    <label class="control-label" for="input-firstname">Ваше имя<span>*</span></label>
                    <input type="text" name="firstname" id="input-firstname" class="form-control empty_field" />
                </div>
                <div class="check-block">
                    <label class="control-label" for="input-email">Ваша почта<span>*</span></label>
                    <input type="text" name="email" id="input-email" class="form-control empty_field" />
                </div>
                <div class="check-block">
                    <label class="control-label" for="input-password">Ваш пароль<span>*</span></label>
                    <input type="password" name="password" id="input-password" class="form-control empty_field" />
                </div>
                <input type="submit" id="confirm_login" class="button7" value="Зарегистрироваться" />
                <br><br>
                <span>Уже есть аккаунт?</span>
                <div style="text-align: center;">
                    <a class="button7" href="login.php">Войти</a>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
