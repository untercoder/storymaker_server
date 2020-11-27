<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Storymaker</title>
	<link rel="stylesheet" href="css/form_style.css">
</head>
<body>
<div class ="container">
<div class="InnerContainer">
<form action="write.php" method="get" >
     <input type="text" name="who" placeholder="Кто?"> <br/><br/>
     <input type="text" name="where" placeholder="Где?"> <br/><br/>
     <input type="text" name ="do" placeholder="Что сделал?"> <br/><br/>
     <input type="text" name="what_for" placeholder="Зачем?"> <br/><br/>
     <input type="text" name="end" placeholder="Чем закончилось?"> <br/><br/>
        <br/>
     <input class="button button1" type="submit" name="button" value="Записать">
</form>
<br/>
<button class="button" onclick="document.location = 'http://lexamok.beget.tech/script/read.php'">Прочитать</button>
<button class="button" onclick="document.location = '/'">Вернуться к выбору комнаты</button>
<div/>
<div/>
</body>
</html>