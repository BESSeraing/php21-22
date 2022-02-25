<?php

var_dump($_POST);

$games=[
    ['name' =>'fifa22', 'platform'=> 'ps4', 'years' => '2021', 'urlCover' => 'https://www.fifplay.com/fifa-22-cover'],
    ['name' =>'marioParty', 'platform'=> 'switch', 'years' => '2021', 'urlCover' => 'https://www.nintendo.be/fr/Jeux/Nintendo-Switch/Mario-Party-Superstars-1987416.html'],
    ['name' =>'car simulator', 'platform'=> 'pc', 'years' => '2018', 'urlCover' => 'https://www.jeuxvideo.com/jeux/pc/jeu-694622/'],
    ['name' =>'satisfactory', 'platform'=> 'pc', 'years' => '2019', 'urlCover' => 'https://www.reddit.com/r/SatisfactoryGame/comments/hsj7ub/custom_satisfactory_grid_image_for_steam/'],
    ['name' =>'nba2k22', 'platform'=> 'ps4', 'years' => '2022', 'urlCover' => 'https://www.jeuxvideo.com/jeux/jeu-1437339/'],
    ['name' =>'marioTennis', 'platform'=> 'switch', 'years' => '2012', 'urlCover' => 'https://www.nintendo.fr/Jeux/Nintendo-Switch/Mario-Tennis-Aces-1325791.html'],
    ['name' =>'animalCrossing', 'platform'=> 'switch', 'years' => '2020', 'urlCover' => 'https://www.animal-crossing.com/new-horizons/fr/'],
    ['name' =>'anno1800', 'platform'=> 'pc', 'years' => '2019', 'urlCover' => 'https://www.ubisoft.com/fr-fr/game/anno/1800'],
    ['name' =>'assasinsCreedOrigin', 'platform'=> 'pc', 'years' => '2017', 'urlCover' => 'https://www.jeuxvideo.com/jeux/jeu-669186/'],
    ['name' =>'spiderman', 'platform'=> 'ps4', 'years' => '2018', 'urlCover' => 'https://www.playstation.com/fr-be/games/marvels-spider-man/'],
];


$acceptedPlatforms = ['ps4', 'pc', 'switch', 'nes'];

if (count($_POST)) {
    if (!in_array($_POST['platform'], $acceptedPlatforms)) {
        echo 'MAUVAISE PLATFORME !!!!';
    } else {
        $games[] = $_POST;
    }

}




echo '
<table>
    <thead>
        <tr>
            <th>nom</th>
            <th>platforme</th>
            <th>année</th>
            <th>lien</th>
        </tr>
    </thead>
    <tbody>';

foreach ($games as $game) {
    echo '<tr>
        <td>'.$game['name'].'</td>
        <td>'.$game['platform'].'</td>
        <td>'.$game['years'].'</td>
        <td><a href="'.$game['urlCover'].'">'.$game['urlCover'].'</a></td>
</tr>';
}

echo '</tbody>
</table>';


echo '<form method="post">
    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="platform">Platforme</label>
        <select name="platform" id="platform">';
        foreach ($acceptedPlatforms as $acceptedPlatform) {
            echo '<option value="'.$acceptedPlatform.'">'.$acceptedPlatform.'</option>';
        }
echo '        </select>
    </div>
    <div>
        <label for="years">Année</label>
        <select name="years" id="years">
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2003">2003</option>
        </select>
    </div>
    <div>
        <label for="urlCover">Lien</label>
        <input type="url" name="urlCover" id="urlCover">
    </div>
    <div>
        <button type="submit">Envoyer</button>
    </div>
</form>';
