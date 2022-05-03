<?php
require_once 'pdo.php';

function getAllPlatform(): array {
    $db = getDB();
    $statement = 'SELECT * from `platform`';
    $query = $db->prepare($statement);
    $query->execute();
    return $query->fetchAll();
}

function getOnePlatformById(int $id): array {
    $db = getDB();
    $statement = 'SELECT * from `platform` WHERE `id`=:id';
    $query = $db->prepare($statement);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function deletePlatform(int $id): void {
    $db = getDB();
    $statement = 'DELETE from `platform` WHERE `id`=:id';
    $query = $db->prepare($statement);
    $query->execute(['id' => $id]);
}

function updatePlatform(int $id, string $name): array {
    $db = getDB();
    $statement = 'UPDATE `platform` SET `name`=:name WHERE `id`=:id';
    $query = $db->prepare($statement);
    $query->execute(['id' => $id, 'name'=> $name]);


    return getOnePlatformById($id);
}


function insertPlatform($name): array {
    $pdo = getDB();
    $statement = 'INSERT INTO `platform` (`name`) values (:name)';
    $query = $pdo -> prepare($statement);

    $query->execute(['name' => $name]);

    return getOnePlatformById($pdo->lastInsertId());
}
