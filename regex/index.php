<?php

$postedPhoneNumber = getPostValue('phoneNumber');
function displayWin()
{
    echo '<p style="color: forestgreen;">Le numéro de téléphone est valide</p>';
}

function displayLose()
{
    echo '<p style="color: red;">Booooo, Le numéro de téléphone n\'est pas valide</p>';
}

if ($postedPhoneNumber) {
    $valid = isPhoneNumberValid($postedPhoneNumber);
    if ($valid) {
        displayWin();
    } else {
        displayLose();
    }
}

createForm();

function createForm() {
    echo '<form method="post">
    <div>
        <label for="phoneNumber">Numéro de téléphone</label>
        <input id="phoneNumber" name="phoneNumber">
    </div>
    <button type="submit">Phone Home</button>
</form>';
}

function isPhoneNumberValid($entryToTest): bool {
    $pattern = "#^[0-9]{10}$#";
    return preg_match($pattern, $entryToTest);
}

function getPostValue($key) {
    return $_POST[$key] ?? null;
}

function getPostValueLong($key) {
    if (isset($_POST[$key])) {
        return $_POST[$key];
    } else {
        return null;
    }
}

