<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
	
	$pass = md5($pass);

	include 'connectdb.php';

	$resultauth = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
	/*результат выводим как массив*/
	$user = mysqli_fetch_assoc($resultauth);
	if(count($user) == 0){
		echo "Такой пользователь не найден";
		exit();
	}

	$link->close();

	header('Location: ../main.php');

?>