<?php
session_start();
if(!$_SESSION['login']){
    header('Location: login.php');
} else {
    $login = $_SESSION['login'];
}
if(isset($_POST['exit'])){
    unset($_SESSION['firstname']);
    unset($_SESSION['login']);
    header('Location: login.php');
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>главная</title>
    <link rel="shortcut icon" href="images/icon1.png" type="image/x-icon">
    <link href="css/index.css?ver=124" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="/test/images/logo.png" />
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/favorites.js?ver=125"></script>
    <script type="text/javascript" src="js/account.js?ver=124"></script>
</head>

<body>
<?php
    require "header.php";
?>
<div id="content">
    <br>
<?php
    $i = 0;
    require "connect.php";
    $sqlmail = ("SELECT * FROM favorites WHERE email = '$login'");
    $result1 = $mysqli->query($sqlmail);
    $row = $result1->fetch_assoc();
    $favorit = $row["favorit"];
    echo(
    "
			<table id='myTable' cellspacing='0' border='1' align='center' style='display: inline-table; width: 100%; max-width: 800px;'>
				<tr id='fix' bgcolor='#4FAB67'>
					<th class='number'>№</th>
					<th class='contact'>Контакт</th>
					<th class='contact'>номер/id/почта</th>
					<th class='favorit'>Избранное</th>
				</tr>
			"
    );

    require "connect.php";
    $sqlmail = ("SELECT * FROM contacts");
    $result2 = $mysqli->query($sqlmail);
    while($row2 = $result2->fetch_assoc()){
        $contact_id = $row2["contact_id"];
        $name_contact = $row2["name"];
        $contact = $row2["contact"];
        if(!empty($favorit)){
            $favor = stripos($favorit, $contact_id);
            if ($favor !== false) {
                $check = "#F5AB26";
                $flag = 1;
            } else{
                $check = 'rgba(255, 255, 255, 0)';
                $flag = 0;
            }
        } else {
            $check = '';
        }
        $i++;
        if($i%2 == 0) {
            $bgcolor = "#c6c6c6";
            $star = 'nonfavor2';
        }
        else {
            $bgcolor = "white";
            $star = 'nonfavor1';
        }
        echo(
        "
				<tr style='background-color: $bgcolor; height: 40px;'>
					<td class='number'>$i</td>
					<td class='contact'>$name_contact</td>
					<td class='contact'>$contact</td>
					<td class='favorit' style='text-align: center;'>
					    <img class='favor' id='$contact_id' name='$flag' src='images/$star.png' style='background-color: $check; cursor: pointer;' alt='star'>
					</td>
				</tr>
			"
        );
    }
    $i++;
    echo(
    "
			</table>
			"
    );

?>

    <div id="settings" class="tut">
        <img class="quickorderkrest" src="images/close.png" width="40px" height="40px" alt="krest">
        <h2>Settings</h2>
        <div class="check-block">
            <label class="control-label" for="password_login">Change password</label>
            <input type="text" name="<?php echo $_SESSION['login']; ?>" id="password_login" class="form-control empty_field" />
        </div>
        <br>
        <br>
        <input type="submit" id="confirm_login" class="button7" value="change" />
    </div>
</div>
<div id="quickorderfon"></div>

<?php
    require "footer.php";
?>
</body>
</html>