<?php

require 'configfile.php';

session_start();

unset($_SESSION['Admin_User_Type']);
unset($_SESSION['login_username']);

header('Location:'.$AppLogIn);

?>