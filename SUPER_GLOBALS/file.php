<form method="post" enctype="multipart/form-data">
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
        <label for="picture">Image</label>
        <input type="file" name="picture">
    </div>
    <div>
        <button type="submit">Envoyer</button>
    </div>
</form>

<?php

if (isset($_FILES['picture'])) {
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    $max_file_size = 1024 * 400; // = 1 mo
    $extension = strtolower(pathinfo($_FILES['picture']['name'])['extension']);
    if (in_array($extension, $allowed_extensions)) {
        if ($_FILES['picture']['size'] < $max_file_size) {
            move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__.'/upload/'.uniqid().'-'.$_FILES['picture']['name']);
        } else {
            echo 'Maximum ' . $max_file_size . ' per file';
        }

    } else {
        echo 'Only images files allowed';
    }


    var_dump($_FILES['picture']);
}
