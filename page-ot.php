<?php if(!isset($_COOKIE['id'])){
    $home_urll = 'http://192.168.88.31/';
    header('Location: '.$home_urll);
	
}
$name = $_COOKIE['name'];
$_POST['ФИО'] = $name;
$name = $_POST['ФИО'];
$otdel = $_COOKIE['otdel'];
$_POST['Отдел'] = $otdel;
$otdel = $_POST['Отдел'];
?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="contact form example">
	<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/styleOT.css" />
	<!-- <link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/chosen.min.css"> -->
	<title>Отчетность</title>
</head>

<body>

	<form class="g-form" id="g-form-1" method="POST" action="" autocomplete="off">
	<div class="obrat"> <a href="http://192.168.88.31/index.php/home" class="obrat_link"><--на главную</a></div>
		<h2 class="g-form__title g-form__title_main">Отчет</h2>
		<h2 class="g-form__title g-form__title_respond"></h2>
		<div class="g-form__preloader"></div>
		<div class="g-form__inputs">
		 <fieldset class="g-form__input-wrapper">
		 <input type="hidden" class="g-form__input g-form__input_name" id="name" name="ФИО" value="<?=$name?>"/>
		 <span><?php echo $name ?></span>
			<!-- <select id="name" name="ФИО"  class="g-form__input g-form__input_name" placeholder="Выберете ФИО" required>
                <option value="" style="display:none">Выберете ФИО</option>
                <option value="Бобир Е.В." >Бобир Е.В.</option>
				<option value="Волков А.Ю." >Волков А.Ю.</option>
				<option value="Дрягин А.Д." >Дрягин А.Д.</option>
				<option value="Коновалов В.О." >Коновалов В.О.</option>
				<option value="Кобец И.А." >Кобец И.А.</option>
				<option value="Логинова Л.Г." >Логинова Л.Г.</option>
				<option value="Макарова А.И." >Макарова А.И.</option>
				<option value="Моисеев А.И." >Моисеев А.И.</option>
				<option value="Мунгалова В.Н." >Мунгалова В.Н.</option>
				<option value="Новиков М.А." >Новиков М.А.</option>
				<option value="Пустовойт Ю.А." >Пустовойт Ю.А.</option>
				<option value="Соловьяненко М.И." >Соловьяненко М.И.</option>
				<option value="Солодов С.А." >Солодов С.А.</option>
				<option value="Чернейко А.Н." >Чернейко А.Н.</option>
                <option value="Щербаков Д.А." >Щербаков Д.А.</option>
			</select>  -->
				
			</fieldset>
				<input type="hidden" id="otdel" name="Отдел" value="<?=$otdel?>"/>

			<fieldset class="g-form__input-wrapper">
				<input class="g-form__input g-form__input_tel" id="tel" name="Проект" placeholder="Введите проект" required>
			</fieldset> 


			<!-- <fieldset class="g-form__input-wrapper">
				<input id="arbitrary-field" name="Что было сделано?" placeholder="Что вы сделали за день?">
			</fieldset> -->

			<fieldset class="g-form__input-wrapper">
				<textarea id="message" name="Что было сделано?" rows="20"
				placeholder="Выполненная работа за день" required></textarea>
			</fieldset>

			<fieldset class="g-form__input-wrapper g-form__input-wrapper_hidden">
				<label for="honeypot">Помогает бороться со спамом. Должно быть пустым!</label>
				<input id="honeypot" type="text" name="honeypot" value="">
			</fieldset>

			<div class="g-form__button-wrapper">
				<button class="g-form__button">Отправить</button>
			</div>
		</div>
	</form>
	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/js/g-form.js"></script>
	<!-- <script src="https://snipp.ru/cdn/chosen/1.8.7/chosen.jquery.min.js"></script> -->
	<!-- <script>
$(document).ready(function(){
	$('.g-form__input_name').chosen({
		width: '100%',
		no_results_text: 'Совпадений не найдено',
		placeholder_text_single: 'Выберите ФИО'
	});
});
</script> -->
<script>
	$(".g-form__input_tel").keypress(function(e){
     if(e.keyCode==13) return false;
});
$(".g-form__input_name").keypress(function(e){
     if(e.keyCode==13) return false;
});

</script>
</body>
</html>
