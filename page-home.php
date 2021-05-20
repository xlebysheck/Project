<?php
$name = $_COOKIE['name']; 
?>

<?php
if(isset($_POST['clearCookies'])){
setcookie('id', '', time()-60*60*24*90, '/', '', 0, 0);
unset($_COOKIE['id']);
setcookie('mail', '', time()-60*60*24*90, '/', '', 0, 0);
unset($_COOKIE['mail']);
setcookie('name', '', time()-60*60*24*90, '/', '', 0, 0);
unset($_COOKIE['name']);
header("Refresh: 1");
}
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
    <title>JamaNews - портал для сотрудников </title>
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/style.css" />
</head>
<body>
    <header class="header">
        <div class="wrapper">
        
            <div class="header_wrapper">
            
                <div class="header_logo">
                    <a href="#" class="header_logo_link">
                        <img src="<?php bloginfo( 'template_directory' ); ?>/images/svg/logo.svg" alt="Логотип" class="logo_pic" rel="stylesheet" />
                    </a>
                </div>
    
                <nav class="header_nav">
                    <ul class="header_list">
                        <li class="header_item">
                            <a href="#" class="header_link">Новости</a>
                        </li>
                        <li class="header_item">
                            <a href="http://192.168.88.31/index.php/chat/" class="header_link">Чатик</a>
                        </li>
                        <li class="header_item">
                             <a href="http://192.168.88.31/index.php/ot/" class="header_link">Отчетность</a>
                        </li>
                        <li class="header_item">
                        <span class="header_link" style="color: white;text-decoration: none;opacity: .50"><?php echo "$name"; ?></span>
                            <a href="#!" class="header_link_1">
                                <img src="<?php bloginfo( 'template_directory' ); ?>/images/svg/profile.svg" alt="User" rel="stylesheet" />
                            </a>
                        </li>
                    </ul>
                </nav>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="">
             <button class="button1" type="submit" name="clearCookies"><p class="button1_text">выход</P></button>
        </form>
            </div>
        </div>
    </header>
    
    <main class="main">
        <section class="intro">
            <div class="wrapper">
                <h1 class="intro_title">
                    Новости ЯМЯ
                </h1>
                <p class="intro_subtitle">
                    Новостной портал для сотрудников ЯМЯ-ИНЖИНИРИНГ
                </p>
                <p class="button_info">
                    <a href="#zatemnenie" class="button_link">
                        <button class="button">
                            <p class="button_text">
                                Обратная связь
                            </p>
                        </button>
                    </a>
                </p>
                
            </div>
            <div class="block2">
            
            
            </div>
        </section>
    </main>
    <div id="zatemnenie">
        <div id="okno">
            <div class="okno_wrapper">
                <p class="okno_info">
                     <img src="<?php bloginfo( 'template_directory' ); ?>/images/svg/JAMANEWForm.svg" alt="Лого">
                   </p>
                <a href="#" class="close">
                <img src="<?php bloginfo( 'template_directory' ); ?>/images/svg/close.svg" alt="Закрыть" class="close_pic">
                </a>
            </div>
            <p class="name_form">
                Обратная связь
            </p>
        <form action="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/obrat.php" class="input_form" method="post" name="ob">
            <select name="problem"  class="form_problem" required="required">
                <option valuse="" id="problem_pi" style="display:none">Выбор проблемы *</option>
                <option value="СЭД" class="problem_item">СЭД</option>
                <option value="OutLook" class="problem_item">Outlook</option>
                <option value="Интернет" class="problem_item">Интернет</option>
                <option value="Принтер" class="problem_item">Принтер</option>
                <option value="Другое" class="problem_item">Другое</option>

            </select>
        
            <div class="block_star">    
           <input type="text" name="name" placeholder="Введите Ваше имя" required class="input_name">
           <span class="star">*</span>
        </div>
        <div class="block_star">
           <textarea name="Op_problem" placeholder="Опишите вашу проблему" class="input_problem"
            required></textarea>
            <span class="star">*</span>
        </div>
            <button class="problem_button" type="submit" name="problem_button">Отправить</button>
        </form>
        </div>
    </div>
    <a href="#" class="obrat">
        <div id="zatem2">
            <div id="okno2">
                <div class="okno2_wrapper">
                    <p class="fraza">
                        Ваше сообщение отправлено!
                    </p>
                </div>
            </div>
        </div>
</body>
</html>