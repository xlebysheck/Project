<?php get_header(); ?>
<?php 
$db = mysqli_connect('localhost', 'root','SaitBD21', 'WordPress');
if(!isset($_COOKIE['id'])){
	if(isset($_POST['form_auth_submit'])){
		$user = mysqli_real_escape_string($db, trim($_POST['mail']));
		$pass = mysqli_real_escape_string($db, trim($_POST['pass']));
		if (!empty($user) && !empty($pass)){
			$query = "SELECT * FROM Users WHERE mail = '$user' AND pass = '$pass'";
			$data = mysqli_query($db,$query);
			if (mysqli_num_rows($data) == 1){
				$row = mysqli_fetch_assoc($data);
                setcookie('id', $row['id'], time() + (60*60*24*30));
                setcookie('mail', $row['mail'], time() + (60*60*24*30));
                setcookie('name', $row['name'], time()+(60*60*24*30));
                setcookie('otdel', $row['otdel'], time()+(60*60*24*30));
                $home_url = 'http://192.168.88.31/index.php/home/';
                header('Location: '.$home_url);
			} else {
				echo mysqli_error($db);
				echo 'Пароль и майл введен неверно';
			}
		} else {
            echo 'Пароль введен неверно';
        }
	}
} else {
$home_url = 'http://192.168.88.31/index.php/home/';
 header('Location: '.$home_url);
}

?>
 <body>
    <div class="form_auth_block">
        <div class="form_auth_block_content">
          <p class="form_auth_style_logo">
           <img src="<?php bloginfo( 'template_directory' ); ?>/images/svg/jamanews.svg" alt="Логотип" class="logo_pic" rel="stylesheet" />
          </p>
          <p class="form_auth_block_head_text">Авторизация</p>
          <form class="form_auth_style" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <input type="email" name="mail" placeholder="Введите Email" required >
            <input type="password" name="pass" placeholder="Введите пароль" required >
            <button class="form_auth_button" type="submit" name="form_auth_submit">Войти</button>
          </form>
        </div>
      </div>
</body>

</html>

  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>