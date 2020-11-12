<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registreer!</title>
</head>
<body>
<?php
    require('db.php');
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
          Header("Location: login.php");
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" name="username" placeholder="Gebruikersnaam" required />
        <input type="text" name="email" placeholder="Email Adress">
        <input type="password" name="password" placeholder="Wachtwoord">
        <input type="submit" name="submit" value="Register">
        <p>Heb je al een account? <a href="login.php">Login!</a></p>
    </form>
<?php
    }
?>
</body>
</html>
