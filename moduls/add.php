<?php
include 'connection.php';
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$role = $_POST['role'];
$username = $_POST['username'];
$sql = "INSERT INTO users (first_name,last_name,role,username) VALUES (:first_name,:last_name,:role,:username)";
$res = $conn->prepare($sql);
$result = $res->execute(array(
    ':first_name' => $first_name,
    ':last_name' => $last_name,
    ':role' => $role,
    ':username' => $username
));
$sqli = "SELECT * FROM users  WHERE username = '$username'";
$result_out = $conn->query($sqli);
$a = $result_out->fetch();
print_r(json_encode($a));
