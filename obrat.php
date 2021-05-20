<?php header("Content-Type: text/html; charset=utf-8");?>

<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8">

</head> 
<body> 
    <button><a href="http://192.168.88.31/index.php/home/#" class="back">Назад</a></button>
<?php 
 $name = trim(strip_tags($_POST['name'])); 
 $problem = trim(strip_tags($_POST['problem'])); 
 $message = trim(strip_tags($_POST['Op_problem']));
 $eto = trim(strip_tags($_COOKIE['name'])); 
 $headers  = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
 $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
 
//  $headers = "Content-type: text/html; charset=utf-8";
 if(mail("a.dryagin@jama.ru", "Обратная свзяь с сайта","Вам написал: ".$name."<br> Тема проблемы: ".$problem."<br> Его сообщение: ".$message."<br> Сообщение отправлено от: " 
    .$eto, $headers)){
    
    $home_urll = 'http://192.168.88.31/index.php/home/#zatem2';
    header('Location: '.$home_urll);
    
    exit;
 } else {
    echo "ошибка";
 } 
 
 
 
 
?>
</body>