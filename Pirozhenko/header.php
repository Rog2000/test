<header class="container">
    <img style="float: left;" src="images/logo.png" alt="логотип">
    <?php
                if (isset($_SESSION['firstname']))	{
            echo "<span style='float: right;'>Здравствуйте, ".$_SESSION['firstname']."</span>";
        }
    ?>
    <h2 class="h2head">Тестовое задание</h2>
    <div id="buttonright" style="float: right;">
    <?php
        if (isset($_SESSION['firstname']))	{
            echo "
                <form action='".$_SERVER['REQUEST_URI']."' method='post'>
                    <input type='button' id='account' class='button7' value='account' />
                    <input type='submit' id='exit' name='exit' class='button7' value='exit' />
                </form>
                ";
        }
    ?>

    </div>
</header>