<?php

$pages = [
    [
        'FR'=>['menu' => 'Accueil', 'content' => 'Bienvenue'],
        'EN'=>['menu' => 'Home', 'content' => 'Welcome']
    ],
    [
        'FR'=>['menu' => 'Contactez-nous', 'content' => 'Appelez le 010/303909'],
        'EN'=>['menu' => 'Contact us', 'content' => 'Dial 010/303909']
    ]
];

//$lang = isset($_GET['lang']) && ($_GET['lang'] === 'FR' || $_GET['lang'] === 'EN') ?  $_GET['lang'] : 'FR'; // Condition ternaire

if (isset($_GET['lang']) && ($_GET['lang'] === 'FR' || $_GET['lang'] === 'EN')) {
    $lang = $_GET['lang'];
} else {
    $lang = 'FR';
}

// Index courant de la page
$currentPage = isset($_GET['page']) && is_numeric($_GET['page'])  && isset($pages[$_GET['page']]) ? $_GET['page'] : 0;

displayLangMenu($currentPage);
displayMenu($pages, $currentPage, $lang);
displayContent($pages[$currentPage][$lang]);


function displayLangMenu($currentPage) {
    echo '<ul><li><a href="?lang=FR&page=' . $currentPage . '">fr</a></li><li><a href="?lang=EN&page=' . $currentPage . '">en</a></li></ul>';
}

function displayMenu($pages, $currentPage, $lang) {
    echo '<nav><ul>';
    foreach ($pages as $pageIndex => $pageContent) {
        echo '<li><a href="?page=' . $pageIndex . '&lang=' . $lang. '">' . $pageContent[$lang]['menu'] . '</a></li>';
    }
    echo '</ul></nav>';
}

function displayContent($page) {
    echo '<h1>'. $page['content'] .'</h1>';
}
