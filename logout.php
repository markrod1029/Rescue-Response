<?php
session_start();
unset($_SESSION['user_login']);

echo header("Location: index.php");