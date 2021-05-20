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
                $home_url = 'http://192.168.88.30/index.php/home/';
                header('Location:http://192.168.88.30/index.php/home/');
			} else {
				echo mysqli_error($db);
				echo 'Пароль и майл введен неверно';
			}
		} else {
            echo 'Пароль введен неверно';
        }
	}
}
?>