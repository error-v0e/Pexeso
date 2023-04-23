<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pexeso</title>
    
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/abc1fc3e2f.js" crossorigin="anonymous"></script>
</head>
<body>
    <form id="size" name="size" onsubmit="return Size();">
        <label for="height">height</label>
        <input type="number" name="height" min="3" max="10" placeholder="3-10">
        <label for="width">wight</label>
        <input type="number" name="width" min="3" max="10" placeholder="3-10">
        <input type="submit" value="Start">
    </form>
    <table id="table"></table>


    <script src="script.js"></script>
</body>
</html>