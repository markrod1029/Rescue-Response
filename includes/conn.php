<?php
	$conn = new mysqli('localhost', 'sc', 'rose_database', 'sc_db');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>