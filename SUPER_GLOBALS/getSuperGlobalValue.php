<?php

$name = getRequestParam('name');
if ($name !== null) {
    echo $name;
} else {
    echo 'no name provided';
}



function getRequestParam($paramName) {
    if(isset($_GET[$paramName])) {
        return $_GET[$paramName];
    } else {
        return null;
    }
}

function getPostParam($paramName) {
    return $_POST[$paramName] ?? null; // Equivalent à la methode du dessus
}
