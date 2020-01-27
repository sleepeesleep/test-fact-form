<?php
require __DIR__ .  '/vendor/autoload.php';
include 'config/const.php';
include 'moduls/connection.php';

$result = $conn->query('SELECT * FROM users WHERE is_add=1');
$data = $result->fetchAll();

$client = new \Google_Client();
$client->setApplicationName('fact_test');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credentials.json');
$service = new Google_Service_Sheets($client);
$spreadsheetId = $googleId;
$range = 'test-fack!A1:E1';
foreach ($data as $values) {
	$dataGoogle = [
		[$values['id'], $values['first_name'], $values['last_name'], $values['role'], $values['username'], "добавлен " . date('Y-m-d')],
	];
	$body = new Google_Service_Sheets_ValueRange([
		'values' => $dataGoogle
	]);
	
	$param = [
		'valueInputOption' => 'RAW'
	];
	
	$result = $service->spreadsheets_values->append(
		$spreadsheetId,
		$range,
		$body,
		$param
	);
}

$sql = "UPDATE users SET is_add=0 WHERE is_add=1";
$query = $conn->prepare($sql);
$query->execute();
