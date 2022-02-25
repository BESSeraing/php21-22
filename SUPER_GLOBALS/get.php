<?php

// Tableaux à deux dimensions
$students= [
    ['firstName' => 'Fabienne', 'lastName' => 'Benoit', 'email' => 'fb@efpl.be'],
    ['firstName' => 'Manuel', 'lastName' => 'Balder', 'email' => 'mb@efpl.be'],
    ['firstName' => 'Philippe', 'lastName' => 'Lovinfosse', 'email' => 'pl@efpl.be'],
    ['firstName' => 'Geoffrey', 'lastName' => 'Verlaine', 'email' => 'gv@efpl.be']
];

//var_dump($_GET);

if (isset($_GET['pos'])) {
    $pos = $_GET['pos'];
    $clicked = $students[$pos];
    echo 'Vous avez cliqué sur ' . $clicked['firstName'];
}


echo '<table>';
echo '<tr><th>prénom</th><th>nom</th><th></th></tr>';
$pos = 0;
foreach($students as $line) {
    echo '<tr><td>' . $line['firstName'] . '</td><td>' . $line['lastName'] . '</td><td><a href="?pos='.$pos.'">details</a></td></tr>';
    $pos++;
}

echo '</table>';
