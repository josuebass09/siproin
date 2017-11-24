<?php
/* Siproin (v0.4) 
Licensed under MIT (https://github.com/josuebass09/siproin/blob/master/LICENSE)
 */	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../login.php");
		exit;
    }