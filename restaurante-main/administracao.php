<?php

//controller
if (isset($_COOKIE['admin'])) {
	header('Location: principal.php');
}else{
	header('Location: login_admin.php');
}

if(isset($_COOKIE['cliente'])){
	header('Location: index.php');
}

?>