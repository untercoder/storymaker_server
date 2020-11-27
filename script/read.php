<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Storymaker</title>
	    <link rel="stylesheet" href="css/read_style.css">
        <link rel="icon" href="script/img/favicon.ico" type="image/x-icon">
    </head>
    <body>
    <div class="text">
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
    </div>
    <div>
        <form action="read.php" method="post" >
            <input class="button" type="submit" name="button" value="Сгенерировать еще">
        </form>
    </div>
        <div>
            <button class="button" onclick="document.location = 'http://lexamok.beget.tech/script/form.php'">Записать еще</button>
        </div>
        <div>
            <button class="button" onclick="document.location = 'http://lexamok.beget.tech'">Вернуться к выбору комнаты</button>
        </div>
    </body>
</html>