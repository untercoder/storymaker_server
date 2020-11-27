<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Storymaker</title>
    <link rel="icon" href="script/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/read_style.css">
</head>
<body>

<form action="read.php" method="get" >
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
    <br/>
    <input type="submit" name="button" value="Сгенерировать еще">
</form>
<br/>
<button onclick="document.location = 'http://lexamok.beget.tech/script/form.php'">Записать еще</button>
<button onclick="document.location = 'http://lexamok.beget.tech/'">Вернуться к выбору комнаты</button>
</body>
</html>




