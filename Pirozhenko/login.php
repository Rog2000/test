<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
if (isset($_POST['login']) AND isset($_POST['password']) )	{
    $login = $_POST['login'];
    $login = stripslashes($login); 			$login = htmlspecialchars($login); 			$login = trim($login);
    $password = $_POST['password'];

    require "connect.php";
    $sqlProd = ("SELECT firstname, password FROM customer WHERE email = '$login'");
    $resultsqlProd = $mysqli->query($sqlProd);
    $rowGlobal = $resultsqlProd->fetch_assoc();
    if($rowGlobal["password"]){
        if($rowGlobal["password"] == $password){
            $_SESSION['firstname'] = $rowGlobal["firstname"];
            $_SESSION['login'] = $login;
            header('Location: index.php');
            $message ='';
        } else{
            $message = "<p style='color: maroon'>Вы ввели не верный пароль!</p>";
        }
    } else{
        $message = "<p style='color: maroon'>Такая почта не зарегистрирована!</p>";
    }
} else {
    $message = "<p id='message' style='color: maroon; display: none;'></p>";
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>авторизация</title>
    <link rel="shortcut icon" href="images/icon1.png" type="image/x-icon">
    <link href="css/index.css?ver=128" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="/test/images/logo.png" />
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/forgot_password.js?ver=123"></script>
</head>
<body>
<div id="loginForm" class="forms">
    <form action='login.php' method='post'>
        <div style="width: 90%; max-width: 400px; display: inline-block; z-index: 5; position: relative;">
            <div id="tutLogin" class="tut">
                <?php
                    echo $message;
                ?>

                <h2>Авторизация</h2>
                <div class="check-block">
                    <label class="control-label" for="email_login">Email<span>*</span></label>
                    <input type="text" name="login" id="email_login" class="form-control empty_field" />
                </div>
                <div class="check-block">
                    <label class="control-label" for="password_login">Password<span>*</span></label>
                    <input type="password" name="password" id="password_login" class="form-control empty_field" />
                </div>
                <input type="submit" id="confirm_login" class="button7" value="Войти" />

                <input type="button" id="forgot_password" class="button7" value="Забыли пароль?" />
                <br>
                <p>Вы еще не присоединились к нам ?</p>
                <div style="text-align: center;">
                    <a class="button7" href="registration.php">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
