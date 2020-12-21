<?php
    session_start() or die("Session no");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Storymaker</title>
	<link rel="stylesheet" href="css/create_session_style.css">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
<div class="header">
    <h1>STORYMAKER</h1>
</div>
<div class ="container">
    <div class="middle">
        <?php
        include_once 'class/make_story.php';
        $query = "http://lexamok.beget.tech/script/read.php?name_table=";
        $full_link = "${query}${_GET['name_table']}";
        $_SESSION['table'] = $_GET['name_table'] or die("No table name");
        echo '<div class="room">'.'<h1>Комната: '.$_SESSION['table'].'</h1></div>';
        $counter = new make_story(null,$_SESSION['table']);
        $result = $counter -> count();
        echo '<div class= "count">'.'<h1>Всего записей в комнате:'.$result.'</h1><div/>'.'<br/>';
        unset($counter);
        ?>
        <a class="button2" onclick="location.href = '<?=$full_link?>'">Начать игру</a>
        <a class="button1" onclick="document.location = '/'">Вернуться к выбору комнаты</a>
    </div>
</div>
</body>
</html>