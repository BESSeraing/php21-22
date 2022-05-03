<?php
require_once 'gamesManager.php';
require_once 'platformsManager.php';

header('Access-Control-Allow-Origin: http://localhost:4200');

$type = null;
$accepted_types = ['games', 'platforms'];

if(isset($_GET['type']) && in_array($_GET['type'], $accepted_types)) {
    $type = $_GET['type'];
}

$data = [];
switch ($type) {
    case 'games':
        $data = getAllGames();
        break;
    case 'platforms':
        $data = getAllPlatform();
        break;
    default:
        http_response_code(404);
        die();
        break;
}

header('Content-Type: application/json');
echo json_encode($data);

