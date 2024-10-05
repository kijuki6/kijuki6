<?php
	ob_start();
	ob_clean();
	session_unset();
	session_destroy();
	header('Location: login.php');
?>