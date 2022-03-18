<?php
$id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


$dbConnexion = new PDO('mysql:host=127.0.0.1;dbname=php_20_21;charset=utf8', 'root', 'root');
$dbConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Permet d'afficher les erreurs mysql, mais ne doit pas être mis sur un environment de production

if ($id !== null) {
    $statement = 'SELECT * FROM `games` WHERE `id`=:id';
} else {
    $statement = 'SELECT * FROM `games`';
}
$query = $dbConnexion->prepare($statement);
if ($id !== null) {
    $query->bindParam('id', $id);
}

try {
    $query->execute();
} catch (PDOException $e) {
    die($e->getMessage());
}
$games = $query->fetchAll();

echo '<ul>';
foreach ($games as $game) {
    echo '<li>'.$game['name'].'</li>';
}
echo '</ul>';
