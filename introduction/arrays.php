<?php


$geoffrey = [
    'firstName' => 'Geoffrey',
    'lastName' => 'Verlaine'
];

echo 'Le tableau a ' . count($geoffrey) . ' éléments <br>';

// Boucle sur les valeurs
foreach ($geoffrey as $elementValue) {
    echo $elementValue . '<br>';
}


// Boucle sur les clés et valeurs
foreach ($geoffrey as $elementKey => $elementValue) {
    echo $elementKey . ': ' . $elementValue . '<br>';
}


$fruits = ['banane', 'pomme', 'poire'];

echo 'Le tableau de fruits a ' . count($fruits) . ' éléments <br>';

// Boucle sur les valeurs
foreach ($fruits as $fruit) {
    echo $fruit . '<br>';
}

// Boucle sur les clés et valeurs
foreach ($fruits as $index => $fruit) {
    echo $index . ': ' . $fruit . '<br>';
}


// Tableaux à deux dimensions
$students= [
    ['firstName' => 'Fabienne', 'lastName' => 'Benoit'],
    ['firstName' => 'Manuel', 'lastName' => 'Balder'],
    ['firstName' => 'Philippe', 'lastName' => 'Lovinfosse'],
    ['firstName' => 'Geoffrey', 'lastName' => 'Verlaine']
];

array_push($students, ['firstName' => 'Yael', 'lastName' => 'Brugmans']);

echo '<table>';
echo '<tr>
    <td>Prénom</td>
    <td>Nom</td>
</tr>';

foreach ($students as $student) {
    echo '<tr>
            <td>' . $student['firstName'] . '</td>
            <td>' . $student['lastName'] . '</td>
        </tr>';
}
echo '</table>';

// Ne modifie pas le tableau, extrait juste une portion
$extract = array_slice($students, 1, 3);

var_dump($extract);
var_dump($students);

// Modifie le tableau
array_splice($students, 1, 3);
var_dump($students);
