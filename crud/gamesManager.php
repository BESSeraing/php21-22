<?php
require_once 'pdo.php';


function getAllGames(): array {
    $db = getDB();
    $statement = 'SELECT * from `games`';
    $query = $db->prepare($statement);
    $query->execute();
    return $query->fetchAll();
}

function getOneGameById(int $id): array {
    $db = getDB();
    $statement = 'SELECT * from `games` WHERE `id`=:id';
    $query = $db->prepare($statement);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function deleteGame(int $id): void {
    $db = getDB();
    $statement = 'DELETE from `games` WHERE `id`=:id';
    $query = $db->prepare($statement);
    $query->execute(['id' => $id]);
}

function updateGame(int $id, string $name, int $year, string $platform): array {
    $db = getDB();
    $statement = 'UPDATE `games` SET `name`=:name, `year`=:year, `platfomr`=:platform WHERE `id`=:id';
    $query = $db->prepare($statement);
    $query->execute(['id' => $id, 'name'=> $name, 'year' => $year, 'platform' => $platform]);


    return getOneGameById($id);
}


function insertGame($name, $year, $platform): array {
    $pdo = getDB();
    $statement = 'INSERT INTO `games` (`name`, `year`, `platform`) values (:name, :year, :platform)';
    $query = $pdo -> prepare($statement);

    $query->execute([
        'name' => $name,
        'year' => $year,
        'platform' => $platform
    ]);

    return getOneGameById($pdo->lastInsertId());
}
