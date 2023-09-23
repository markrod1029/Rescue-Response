<?php
session_start();
unset($_SESSION['staff']);

echo header("Location: ../index.php");