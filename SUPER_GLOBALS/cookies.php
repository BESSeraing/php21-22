<?php

if (!isset($_COOKIE['auth'])) {
    testLogin();
    loginForm();

} else {
 echo 'Bienvenue utilisateur connecté';
}

function testLogin()
{
    $users = [
        ['username' => 'Claudy', 'password' => 'dikkenek'],
        ['username' => 'Claudette', 'password' => 'alexandrie']
    ];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
        $key = array_search($_POST['username'], array_column($users, 'username'));
        if ($key !== false && isset($users[$key])) {
            $user = $users[$key];
            if ($user && $user['password'] === $_POST['password']) {
                setcookie('auth', $user['username'], time()  + (60 * 60), null, null, true, false);
                header('Location: cookies.php');
//            // setCookie + redirection
            }
        }
    }
}

function loginForm() {
    echo '<form method="post">
        <div>
            <label for="username">Login</label>
            <input name="username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div><button type="submit" >Login</button></div>
</form>';
}
