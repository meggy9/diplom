<?php
	require_once 'connection.php';
	header('Content-Type: text/html; charset=utf-8');
	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка".mysqli_error($link));
?>

<!DOCTYPE>
<html(lang="en")>
<head>
	<title>Курсовой проект</title>
	<meta(charset="UTF-8")>
	<meta(name="viewport", content="width=device-width, initial-scale=1.0")>
	<link rel="stylesheet" href="css/main.css">
	<script src="jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	
</head>

<body>
	<div id="app" class="wrapper">
		<header>
		<div class="header-wrapper">
			<h1 class="header-text">Реестр поставщиков социальных услуг Курской области</h1>
		</div>
		</header>
		<div class="body-wrapper">
			<section class="content-block">
				<div class="filter-block">
					<form method="POST">
						<div class="input-container">
							<span class="input-container__title">Поиск по наименованию</span>
							<input @keyup="getList" class="input-container__field" type="text" name="organization_name">
						</div>
						<div class="input-container">
							<span class="input-container__title">Муниципальные образования</span>
							<select name="mun_obrazovaniya" id=""></select>
						</div>
						<div class="input-container">
							<span class="input-container__title">Вид организации</span>
							<select name="organization_type" id=""></select>
						</div>
						<div class="input-container">
							<span class="input-container__title">Форма обслуживания</span>
							<input type="checkbox" name="stacionar" value="стационарная">
							<input type="checkbox" name="polustacionar" value="полустационарная">
							<input type="checkbox" name="nadomu" value="на дому">			
						</div>	
						<div class="input-container">
							<span class="input-container__title">Вид социальных услуг</span>
							<input type="checkbox" name="stacionar" value="социально-бытовые">
							<input type="checkbox" name="polustacionar" value="социально-медицинские">
							<input type="checkbox" name="nadomu" value="социально-психологические">
							<input type="checkbox" name="nadomu" value="социально-педагогические">
							<input type="checkbox" name="nadomu" value="социально-трудовые">
							<input type="checkbox" name="nadomu" value="социально-правовые">
							<input type="checkbox" name="nadomu" value="срочные социальные услуги">
							<input type="checkbox" name="nadomu" value="услуги в целях повышения коммуникативного потенциала получателей социальных услуг, имеющих ограничения жизнедеятельности">		
						</div>
						<div class="input-container">
							<span class="input-container__title">Категория получателей</span>
							<input type="checkbox" name="stacionar" value="дети">
							<input type="checkbox" name="polustacionar" value="семьи с детьми">
							<input type="checkbox" name="nadomu" value="дети инвалиды">
							<input type="checkbox" name="nadomu" value="инвалиды(взрослые)">
							<input type="checkbox" name="nadomu" value="граждане пожилого возраста">
							<input type="checkbox" name="nadomu" value="лица БОМЖ">
						</div>
						<div class="input-container">
							<span class="input-container__title">Категория получателей</span>
							<input type="checkbox" name="state" value="государственная">
							<input type="checkbox" name="municipal" value="муниципальная">
							<input type="checkbox" name="private" value="частная">
						</div>
					</form>
				</div>
				<ul class="content-list">
					<?php
						$query = "SELECT * FROM entities";
						if ($result = mysqli_query($link, $query)) {

	    					/* извлечение ассоциативного массива */
	    					while ($row = mysqli_fetch_assoc($result)) {
	        					echo '<li class="content-list__item">
	        							<div class="content-list__item_header">'.$row["Name"].'</div>
	        							<div class="content-list__item_data-block">
	        								<p class="content-list__item_data-title">Номер организации:</p>
	        								<p class="content-list__item_data-string">'.$row["Number"].'</p>
	        								<p class="content-list__item_data-title">Дата включения в реестр:</p>
	        								<p class="content-list__item_data-string">'.$row["Date_of_entry"].'</p>
	        								<p class="content-list__item_data-title">Адрес организации:</p>
	        								<p class="content-list__item_data-string">'.$row["Address"].'</p></div>
	        							<div class="hidden" data-lat="'.$row["CoordLat"].'" data-lon="'.$row["CoordLon"].'" data-name="'.$row["Name"].'"></div>
	        							</li>';
	    					};

	    					/* удаление выборки */
	    					mysqli_free_result($result);
						}
					?>
					
				</ul>
				<? echo "<div class='map-block'>
							<div class='map__button'></div>
							<div id='map'></div></div>"; ?>
			</section>
		</div>
	</div>
</body>
<script src="main.js"></script>
<script src="encoder.js" type="text/javascript"></script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=dc8a2989-b85b-4663-b372-a8882b2704ae" type="text/javascript"></script>
<script src="icon_customImage.js" type="text/javascript"></script>
<script src="button.js" type="text/javascript"></script>
<html>
<?php
	mysqli_close($link);
?>