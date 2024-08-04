<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    
    if (!empty($username) && !empty($password)){
    $file = fopen('traineedata.txt', 'r');
    $loginSuccessful = false;

    while (($line = fgets($file)) !== false) { 
        $data = explode(',', trim($line));
        
        $storedUsername = $data[0];
        $storedPassword = $data[1];

        if ($username === $storedUsername && $password === $storedPassword) {
            $loginSuccessful = true;
            break;
        }
    }

    fclose($file);
    
    if ($loginSuccessful) {
        $_SESSION['username'] = $username;
        header('Location: home.php');
        exit();
    } else {
        echo '<form method="post">
            <label>Username</label>
            <input type="text" name="username" required>
            <br>
            <label>Password</label>
            <input type="password" name="pass" required>
            <br>
            <input type="submit" value="Login">
        </form>';
        echo 'Invalid username or password.';
    }
}
}
     else {
    echo '<form method="post">
        <label>Username</label>
        <input type="text" name="username" required>
        <br>
        <label>Password</label>
        <input type="password" name="pass" required>
        <br>
        <input type="submit" value="Login">
    </form>';
}
?>