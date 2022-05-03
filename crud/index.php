<?php
require_once 'gamesManager.php';
require_once 'platformsManager.php';

$action = 'list'; // Peut avoir avoir comme autre valeurs insert, update ou delete (CRUD)
$type = 'games';
$accepted_types = ['games', 'platforms'];
if(isset($_GET['action'])) {
    $action = $_GET['action'];
}
if(isset($_GET['type']) && in_array($_GET['type'], $accepted_types)) {
    $type = $_GET['type'];
}


if ($action == 'list') {
    switch ($type) {
        case 'games':
            $games = getAllGames();
            $html = getHtmlGameList($games);
            printPage($html);
        break;
        case 'platforms':
            $platforms = getAllPlatform();
            $html = getHtmlPlatformsList($platforms);
            printPage($html);
        break;
    }

} else if($action == 'insert') {
    if( isFormPosted()) {
        if (isFormValid()) {
            insertGame($_POST['name'], $_POST['year'], $_POST['platform']);
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
$list .= '<table>
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
function getHtmlGameList($games) {
    $list = '<a href="?action=insert&type=games">ajouter un jeu</a><a href="?action=list&type=games">afficher la liste</a>';

    }


    $list .= '</tbody></table>';
    return $list;
}

function getHtmlPlatformsList($platforms) {

    $list = '<a href="?action=insert&type=platforms">ajouter une platforme</a><a href="?action=list&type=platforms">afficher la liste</a>';
    $list .= '<table>
    <thead>
    <tr>
    <th>id</th>
    <th>name</th>
   
</tr>
</thead>
<tbody>
';

    foreach ($platforms as $platform) {
        $list .= '<tr>
        <td>'.$platform['id'].'</td>
        <td>'.$platform['name'].'</td>

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
    echo '<html><head></head><body>
        <nav>
        <ul>
            <li>
                <a href="?type=games">Games</a>
            </li>
            <li>
                <a href="?type=platforms">Platforms</a>
            </li>
</ul>
</nav>';
    echo $dynamicHtml;
    echo '<body></html>';
}

