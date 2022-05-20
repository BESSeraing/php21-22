<?php
require_once 'gamesManager.php';
require_once 'platformsManager.php';

header('Access-Control-Allow-Origin: http://localhost:4200');

$type = null;
$accepted_types = ['games', 'platforms', 'contact'];

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
    case 'contact':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            handleContactForm();
        } else {
            http_response_code(405);
        }

        break;
    default:
        http_response_code(404);
        die();
        break;
}

header('Content-Type: application/json');
echo json_encode($data);


function handleContactForm()
{
    $inputString = file_get_contents('php://input');
    $_POST = json_decode($inputString, true);
    var_dump($_POST);

    // On valide le $_POST
    // Si valide on l'envoie dans la DB
    // PEtit bonus, on pourrait envoyer un mail mais ça implique de mettre des mots de passe sue le server.
}
