<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Storymaker</title>
	    <link rel="stylesheet" href="css/read_style.css">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
    </head>
    <body>
    <div class="header">
        <h1>STORYMAKER</h1>
    </div>
    <div class = "container">
        <div class="middle">
            <?php
            include 'class/make_story.php';
            if(isset($_SESSION['table'])){
                $object_story = new make_story(null,$_SESSION['table']);
                $object_story -> echo_story();
            }

            else {
                $_SESSION['table'] = $_GET['name_table'];
                $object_story = new make_story(null,$_SESSION['table']);
                $object_story -> echo_story();
            }
            ?>

            </br>
            <form action="read.php" method="post" >
                <input class="button" type="submit" name="button" value="Сгенерировать еще">
            </form>
            <a class="button1" onclick="document.location = 'http://lexamok.beget.tech/script/form.php'">Записать еще</a>
            <a class="button2" onclick="document.location = 'http://lexamok.beget.tech'">Вернуться к выбору комнаты</a>
        </div>
    </div>

    </body>
</html>