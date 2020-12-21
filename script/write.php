<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Storymaker</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/read_style.css">
</head>
<body>
<div class="header">
    <h1>STORYMAKER</h1>
</div>
<div class="container">
    <div class="middle">
        <?php
        include 'class/make_story.php';
        /*
            Проверка массива $_GET на пустые поля.
            Если есть хотябы одно не заполненное поле
            то данные формы в базу не вносятся.
        */
        $get_check = true;
        foreach ($_GET as $value) {
            if(strlen($value) == 0) {
                $get_check = false;
                break;
            }
        }

        if($get_check == true) {
            $object_story = new make_story($_GET, $_SESSION['table']);
            $object_story -> echo_story();
        }
        else {
            echo "Ошибка! Все поля формы должны быть заполнены."."<br/>";
        }
        ?>
        </br>
        <form action="read.php" method="get" >
            <input class="button" type="submit" name="button" value="Сгенерировать еще">
        </form>
        <a onclick="document.location = 'http://lexamok.beget.tech/script/form.php'">Записать еще</a>
        <a onclick="document.location = 'http://lexamok.beget.tech/'">Вернуться к выбору комнаты</a>
    </div>
</div>
</body>
</html>




