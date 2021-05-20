<?php
$name = $_COOKIE['name']; 
?>

<?php if(!isset($_COOKIE['id'])){
    $home_urll = 'http://192.168.88.31/';
    header('Location: '.$home_urll);
} 
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php bloginfo( 'template_directory' ); ?>/images/icon1.png">
    <title>Чат сотрудников </title>
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/styleChat.css" />
    <script>
    $(function(){
  //Если куки с именем не пустые, тащим имя и заполняем форму с именем
  if($.cookie("name")!=""){$("#t-box input[class='name']").attr("value", $.cookie("name"));}
  //Переменная отвечает за id последнего пришедшего сообщения
  var mid = 0;
  //Функция обновления сообщений чата
  function get_message_chat(){
    //Генерируем Ajax запрос
    $.ajaxSetup({url: "chat.php",global: true,type: "GET",data: "event=get&id="+mid+"&t="+
        (new Date).getTime()});
    //Отправляем запрос
    $.ajax({
      //Если все удачно
      success: function(msg_j){
        //Если есть сообщения в принятых данных
        if(msg_j.length > 2){
          //Парсим JSON
          var obj = JSON.parse(msg_j);
          //Проганяем циклом по всем принятым сообщениям
          for(var i=0; i < obj.length; i ++){
            //Присваиваем переменной ID сообщения
            mid = obj[i].id;
            //Добавляем в чат сообщение
            $("#msg-box ul").append("<li><b>"+obj[i].name+"</b>: "+obj[i].msg+"</li>");
          }
          //Прокручиваем чат до самого конца
          $("#msg-box").scrollTop(2000);
        }
      }
    });
  }
 
  //Первый запрос к серверу. Принимаем сообщения
  get_message_chat();
 
  //Обновляем чат каждые две секунды
  $("#t-box").everyTime(2000, 'refresh', function() {
    get_message_chat();
  });
 
  //Событие отправки формы
  $("#t-box").submit(function() {
    //Запрашиваем имя у юзера.
    if($("#t-box input[class='name']").attr("value") == ""){ alert("Пожалуйста, введите свое имя!")}else{
      //Добавляем в куки имя
      $.cookie("name", $("#t-box input[class='name']").attr("value"));
 
      //Тащим сообщение из формы
      var msg = $("#t-box input[class='msg']").val();
      //Если сообщение не пустое
      if(msg != ""){
        //Чистим форму
        $("#t-box input[class='msg']").attr("value", "");
        //Генерируем Ajax запрос
        $.ajaxSetup({url: "chat.php", type: "GET",data: "event=set&name="+
            $("#t-box input[class='name']").val()+"&msg="+msg});
        //Отправляем запрос
        $.ajax();
      }
    }
    //Возвращаем false, чтобы форма не отправлялась.
    return false;
  });
});
    </script>
</head>
<body>
<style>
#msg-box{overflow:auto; width:750px; height:300px; border:1px solid black; padding:5px; margin:0px; display:inline-block; background:#FFF; margin:32px 0 0 32px;}
#msg-box ul{list-style:none; padding:0px; margin:0px;}
#t-box{margin-left:32px;}
</style>
<div id="msg-box">
  <ul>
  </ul>
</div>
<form id="t-box" action="?" style="">
  Имя: <input type="text" class='name' style="width:100px;" >
  <input type="text" class='msg' style="width:500px;" >
  <input type="submit" value="Отправить" style="margin-top:5px;">
</form>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/js/jquery.timers.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/js/jquery.cookie.js"></script>
</body>
</html>