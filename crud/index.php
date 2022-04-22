<?php

$action = 'list'; // Peut avoir avoir comme autre valeurs insert, update ou delete (CRUD)
if(isset($_GET['action'])) {
    $action = $_GET['action'];
}


if ($action == 'list') {
    $games = getAll();
    $html = getHtmlList($games);
    printPage($html);
} else if($action == 'insert') {
    if( isFormPosted()) {
        if (isFormValid()) {
            insert($_POST['name'], $_POST['year'], $_POST['platform']);
            header('Location: ?action=list');
        } else {
            $html = getHtmlFormErrors();
            $html .= getHtmlForm();
            printPage($html);
        }
    } else {
        $html = getHtmlForm();
        printPage($html);
    }
}

function isFormValid(): bool {
    return true;
}

function isFormPosted(): bool {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}


function getAll(): array
{
    $db = getDB();
    $statement = 'SELECT * from `games`';
    $query = $db->prepare($statement);
    $query->execute();
    return $query->fetchAll();
}

function insert($name, $year, $platform) {
    $pdo = getDB();
    $statement = 'INSERT INTO `games` (`name`, `year`, `platform`) values (:name, :year, :platform)';
    $query = $pdo -> prepare($statement);

    $query->execute([
        'name' => $name,
        'year' => $year,
        'platform' => $platform
    ]);
}

function getHtmlList($games) {
    $list = '<table>
    <thead>
    <tr>
    <th>id</th>
    <th>name</th>
    <th>year</th>
    <th>platform</th>
</tr>
</thead>
<tbody>
';

    foreach ($games as $game) {
        $list .= '<tr>
        <td>'.$game['id'].'</td>
        <td>'.$game['name'].'</td>
        <td>'.$game['year'].'</td>
        <td>'.$game['platform'].'</td>
</tr>';
    }


    $list .= '</tbody></table>';
    return $list;
}

function getHtmlForm() {
    $acceptedPlatforms = ['ps4', 'pc', 'switch', 'nes'];

    $form = '<form method="post">
    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="platform">Platforme</label>
        <select name="platform" id="platform">';

        foreach ($acceptedPlatforms as $acceptedPlatform) {
            $form .= '<option value="'.$acceptedPlatform.'">'.$acceptedPlatform.'</option>';
        }
$form .= '</select>
    </div>
    <div>
        <label for="years">Année</label>
        <select name="year" id="years">
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2003">2003</option>
        </select>
    </div>
    <div>
        <button type="submit">Envoyer</button>
    </div>
</form>';

        return $form;
}

function getHtmlFormErrors() {
    return 'ERRORS';
}

function printPage($dynamicHtml) {
    echo '<html><head></head><body><a href="?action=insert">ajouter un jeu</a><a href="?action=list">afficher la liste</a>';
    echo $dynamicHtml;
    echo '<body></html>';
}

function getDB() {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_20_21;charset=utf8', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

