<?php
session_start();
unset($_SESSION['admin']);

echo header("Location: ../index.php");