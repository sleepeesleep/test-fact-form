<?php
include 'connection.php';
$id = $_POST['id'];
$sql = "UPDATE users SET is_delete=1 WHERE id=$id";
$result = $conn->prepare($sql);
$result->execute();
