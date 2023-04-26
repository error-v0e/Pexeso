<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pexeso</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous">
    </script>
</head>
<body>
    <a href="login.php">login</a>
    <a href="register.php">register</a>
    <form id="size" name="size" onsubmit="return Size();">
        <label for="height">height</label>
        <input type="number" name="height" min="3" max="10" placeholder="3-10">
        <label for="width">wight</label>
        <input type="number" name="width" min="3" max="10" placeholder="3-10">
        <input class="button" type="submit" value="Start">
    </form>
    <div id="score">Score: 0</div>
    <table id="table"></table>


    <script src="script.js"></script>
</body>
</html>