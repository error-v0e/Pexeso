<?php
session_start();

if(isset($_SESSION["isLogged"])){
    $isLogged = $_SESSION["isLogged"];
}
else{
    $isLogged = false;
}
if($isLogged){
    $username= $_SESSION["username"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $score = $_POST["score"];
        $kod = $_POST["kod"];
        $height = $_POST["height"];
        $width = $_POST["width"];
        

        $connection = new mysqli("localhost", "root", "", "2itc");
        $sql = `SELECT id FROM users WHERE jmeno = '$username' `;
        $result = $connection->query($sql);
    
        $sql = "INSERT INTO  games (score, height, width, kod, fk_user) VALUES ('$score', '$height', '$width', 'kod', '$result')";
        mysqli_query($connection, $sql);
    }


}
else{
    header("location:index.php");
    die();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table class="scoreTable">
        <tr class="scoreTr">
            <th class="scoreTh">Jmeno</th>
            <th class="scoreTh">Score</th>
            <th class="scoreTh">
                <form method="get" action="leadeboard.php">
                    <select id="hxw" name="hxw">
                        <option value="0"> </option>
                    <?php
                        $connection = new mysqli("localhost", "root", "", "2itc");
                        $selectSQL = "SELECT DISTINCT kod, height, width FROM games ORDER BY kod DESC";
                        $result = $connection->query($selectSQL);
                        $pozice = 1;
                        while($row = $result->fetch_object()){
                            echo `
                                <option value="{$row->kod}">{$row->height} x {$row->width}</option>
                            `;
                            $pozice++;
                        }
                        
                    ?>
                    </select>
                    <input type="submit">
                  </form>
            </th class="scoreTh">
        </tr>
        <?php
            $selected = $_GET['hxw'];
            $connect = new mysqli("localhost", "root", "", "2itc");
            $selectSQL = "SELECT * FROM games ORDER BY score DESC WHERE kod = '$selected'";
            $result = $connect->query($selectSQL);
            $pozice = 1;
            while($row = $result->fetch_object()){
                echo '
                <tr class="scoreTr">
                    <td class="scoreTd">{$pozice}. </td>
                    <td class="scoreTd">{$row->username} </td>
                    <td class="scoreTd">{$row->score} </td>
                    <td class="scoreTd">{$row->height}x{$row->width}</td>
                </tr>
                ';
                $pozice++;
            }
        
        ?>
    </table>
    
</body>
</html>