<form method="post">
    <div>
        <label for="firstName">Prénom</label>
        <input type="text" id="firstName" name="firstName">
    </div>
    <div>
        <label for="lastName">Nom de famille</label>
        <input type="text" id="lastName" name="lastName">
    </div>
    <div>
        <label for="year">Année de naissance</label>
        <select name="year" id="year">
            <option value="1980">1980</option>
            <option value="1981">1981</option>
            <option value="1982">1982</option>
            <option value="1983">1983</option>
        </select>
    </div>
    <div>
        <button type="submit">Envoyer</button>
    </div>
</form>

<?php

var_dump($_POST);



