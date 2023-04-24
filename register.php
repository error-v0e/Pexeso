<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="registerStyle.css">
    <script src="https://kit.fontawesome.com/abc1fc3e2f.js" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous">
    </script>
</head>
<body class="background">

    <?php
    $connection = new mysqli("localhost", "root", "", "2itc");
    if($connection->errno === TRUE){
        echo $connection->error;
        die();
    }

    $username = $_POST['jmeno'];
    $email = $_POST['e-mail'];
    $password = $_POST['heslo'];
    $confPassword = $_POST['potvrdHeslo'];

    if($confPassword == $password){
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else{
        echo "password isnt same as confirm password";
    }

    ?>

<form action="register.php" method="POST"></form>
<div class="white-square">
        <div class="h1">
            Register
        </div>
        <div class="username">
            Username
        </div>
        <div class="jmeno">
            <label for="jmeno"></label>
            <input type="text" id="jmeno" name="jmeno" placeholder="Enter your username">
        </div>
        <div class="email">
            E-mail
        </div>
        <div class="e-mail">
            <label for="jmeno"></label>
            <input type="text" id="e-mail" name="e-mail" placeholder="Enter your e-mail">
        </div>
        <div class="password">
            Password
        </div>
        <div class="heslo">
            <label for="heslo"></label>
            <input type="password" id="heslo" name="heslo" placeholder="Enter your password" >
        </div>
        <div class="confirmPassword">
            Confirm password
        </div>
        <div class="potvrdHeslo">
            <label for="potvrd heslo"></label>
            <input type="password" id="potvrdHeslo" name="potvrdHeslo" placeholder="Confirm your password" >
        </div>
        <div class="submit">
            <input id="submitedit" type="submit" value="Register">
        </div>
        <div class="p1">
            <a href="http://localhost/workspace/Pexeso/login.php">Login</a>
        </div>
    </div>
</body>
</html>