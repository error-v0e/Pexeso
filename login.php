<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginStyle.css">
    <script src="https://kit.fontawesome.com/abc1fc3e2f.js" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous">
    </script>
</head>
<body class="background">
<script>
    <?php
    $connection = new mysqli("localhost", "root", "", "2itc");
    if($connection->errno === TRUE){
        echo $connection->error;
        die();
    }
    if (isset($_POST["heslo"])) {
        
    $username = $_POST['jmeno'];
    $email = $_POST['e-mail'];
    $password = $_POST['heslo'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "SELECT jmeno, email, heslo FROM users WHERE jmeno = '$username' AND heslo = '$password' AND email = '$email'";
    mysqli_query($connection, $sql);
    
    header("Location: index.php");
    }

    ?>

</script>
    
<form action="login.php" method="post">
    <div class="white-square">
        <div class="h1">
            Login
        </div>
        <div class="username">
            Username
        </div>
        <div class="jmeno">
            <label for="jmeno"></label>
            <input type="text" id="jmeno" name="jmeno" placeholder="Enter your username" required>
        </div>
        <div class="email">
            E-mail
        </div>
        <div class="e-mail">
            <label for="jmeno"></label>
            <input type="email" id="e-mail" name="e-mail" placeholder="Enter your e-mail" required>
        </div>
        <div class="password">
            Password
        </div>
        <div class="heslo">
            <label for="heslo"></label>
            <input type="password" id="heslo" name="heslo" placeholder="Enter your password" required>
        </div>
        <div class="submit">
            <input id="submitedit" type="submit" value="Login">
        </div>
        <div class="p1">
            <a href="http://localhost/workspace/Pexeso/register.php">Register</a>
        </div>
    </div>
</form>
</body>
</html>