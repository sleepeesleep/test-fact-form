<?php
include 'connection.php';
$result = $conn->query('SELECT * FROM users WHERE is_delete=0');
$a = $result->fetchAll();
print_r(json_encode($a));
