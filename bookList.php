<?php

	header('Content-Type: application/json');
	$books = array();

	$conn = new mysqli("localhost", "root","","the_scholar_ship");
	$result = $conn->query('SET CHARACTER SET utf8');
	$result = $conn->query("SELECT book_name FROM `book` WHERE 1");

	

	while($row = $result->fetch_assoc())
		array_push($books, $row['book_name']);

	echo json_encode($books,true);

?>