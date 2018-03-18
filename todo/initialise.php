<?php

session_start();

$_SESSION['user_id'] = 1;

$db = new PDO('mysql:dbname=todo;host=127.0.0.1', 'root', 'toor');

if(!isset($_SESSION['user_id'])) {
	die('Please sign in.'); 
}
?>