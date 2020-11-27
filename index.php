<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Storymaker</title>
    <link rel="stylesheet" href="script/css/index_style.css">
	<link rel="icon" href="script/source/img/favicon.ico" type="image/x-icon">
</head>
<body>
	<div class="header">
		<h1>STORYMAKER</h1>
	</div>
	<div class="container">
		<div class="align-middle">
			<?php
                session_destroy();
				include_once 'script/class/BDTools.php';
				$show = new BDTools(null,null,false);
				$result = $show -> show_table();
				$http = "http://lexamok.beget.tech/script/create_session.php?name_table=";
				$array = [];
				foreach ($result as $value){
					$encoded_link = urlencode($value);
					$full_link = "${http}${encoded_link}";
					$array[] = $full_link;
				}

				/*foreach ($result as $key => $value) {
					echo '<div class="line">'.'<span class="name">'.htmlspecialchars($value).'</span><a href="'.$array[$key].'">Войти в комнату</a>'.'</div>';
				}*/
			?>
			<?php foreach($result as $key => $value) {?>
				<div class="line">
					<span class="name"><?=htmlspecialchars($value)?></span>
					<a href="<?=$array[$key]?>">Войти в комнату</a>
				</div>
			<?php }?>

			</br>

			<a class="createBtn" href = 'http://lexamok.beget.tech/script/create_table.php'">Создать новую комнату</a>
		</div>
	</div>
</body>
</html>