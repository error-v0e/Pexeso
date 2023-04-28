<?php
session_start();

if(isset($_SESSION["isLogged"])){
    $isLogged = $_SESSION["isLogged"];
}
else{
    $isLogged = false;
}

    $username= $_SESSION["username"];
    $bool=true;
    
    if (isset($_GET['score'])) {
        $score = $_GET['score'];
    } else {
        $bool=false;
    }
      
    if (isset($_GET['kod'])) {
        $kod = $_GET['kod'];
    } else {
        $kod = $_SESSION["kcod"];
    }
      
    if (isset($_GET['height'])) {
        $height = $_GET['height'];
    } else {
        $bool=false;
    }
      
    if (isset($_GET['width'])) {
        $width = $_GET['width'];
    } else {
        $bool=false;
    }


    if($isLogged){
        if($bool){
            $_SESSION["kcod"] = $kod;
            $_SESSION["score"] = $score;

            $idUser;
            $idGame=0;
            $scoreB=10000000000;

            $connection = new mysqli("localhost", "root", "", "2itc");
            $sql = "SELECT id FROM users WHERE jmeno = '$username' ";
            $result = $connection->query($sql);
            while($row = $result->fetch_assoc()) {
                $idUser = $row['id'];
            }
                
            $sql = "SELECT score, id FROM games WHERE fk_user = '$idUser' AND kod = '$kod';";
            $result = $connection->query($sql);
            while($row = $result->fetch_assoc()) {
                $scoreB = $row['score'];
                $idGame = $row['id'];
            }

            if($scoreB > $score){
                $sql = "INSERT INTO  games (score, height, width, kod, fk_user) VALUES ('$score', '$height', '$width', '$kod', '$idUser')";
                mysqli_query($connection, $sql);
                $sql = "DELETE FROM games WHERE id = '$idGame';";
                mysqli_query($connection, $sql);
            }
        }
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
            <th class="scoreTh">Pozice</th>
            <th class="scoreTh">Jmeno</th>
            <th class="scoreTh">Score</th>
            <th class="scoreTh">
                <form method="get" action="leadeboard.php">
                    <select id="hxw" name="hxw">
                        <option <?php echo 'value="' . $_SESSION["kcod"] . '"'; ?>> </option>
                        <?php
                            $connection = new mysqli("localhost", "root", "", "2itc");
                            $selectSQL = "SELECT DISTINCT kod, height, width FROM games ORDER BY kod";
                            $result = $connection->query($selectSQL);
                            while($row = $result->fetch_object()){
                                echo '<option value="' . $row->kod . '">' . $row->height . ' x ' . $row->width . '</option>';
                            }
                        ?>

                    </select>
                    <input type="submit">
                  </form>
            </th class="scoreTh">
            <th class="scoreTh"><?php echo "tve skoreje: " . $_SESSION["score"];?></th>
            <th class="scoreTh">
                <form method="get" action="index.php">
                    <input type="submit" value="Hrat znovu">
                </form>
            </th class="scoreTh">
        </tr>
        <?php
            if (isset($_GET['hxw'])) {
                $selected = $_GET['hxw'];
            } else {
                $selected = $_SESSION["kcod"];
            }
            $connect = new mysqli("localhost", "root", "", "2itc");
            if ($connect->connect_error) {
                die("Connection failed: " . $connect->connect_error);
            }
            
            $selectSQL = "SELECT users.jmeno AS username, games.kod AS kod, games.score AS score, games.height AS height, games.width AS width 
                          FROM games 
                          INNER JOIN users ON games.fk_user = users.id 
                          WHERE kod = '$selected' 
                          ORDER BY score ";
            $result = $connect->query($selectSQL);
            
            if (!$result) {
                die("SQL Error: " . mysqli_error($connect));
            }
            
            $pozice = 1;
            while($row = $result->fetch_object()){
                echo '<tr class="scoreTr">';
                echo '<td class="scoreTd">' . $pozice . '.</td>';
                echo '<td class="scoreTd">' . $row->username . '</td>';
                echo '<td class="scoreTd">' . $row->score . '</td>';
                echo '<td class="scoreTd">' . $row->height . 'x' . $row->width . '</td>';
                echo '</tr>';
                $pozice++;
            }
        ?>
    </table>
    
</body>
</html>