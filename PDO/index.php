<?php 
    require __DIR__.'/weatherapp.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL-PDO</title>
</head>
<body>
    <form action="weatherapp.php" method="post">
        <label for="ville">Ville</label>
        <input type="text" name="ville">
        <?php
            if ($_GET['city']=='false'){
                echo '<p>Format incorrect</p>';
            } 
        ?>
        <label for="haut">Maxima</label>
        <input type="text" name="haut">
        <?php
            if ($_GET['max']=='false'){
                echo '<p>Format incorrect</p>';
            } 
        ?>
        <label for="bas">Minima</label>
        <input type="text" name="bas">
        <?php
            if ($_GET['min']=='false'){
                echo '<p>Format incorrect</p>';
            } 
        ?>
        <?php
            foreach($meteoFetch as $m){
                echo '<input type="checkbox" name= location[] value='.$m['Ville'].'>'.$m['Ville'].'</input>';
            }
        ?>
        <input type="submit" value="Envoyer">
    </form> 
    <table>
        <thead>
            <th>Ville</th>
            <th>haut</th>
            <th>bas</th>
        </thead>
        <tbody>
        <?php 
            foreach($meteoFetch as $n){
                echo '<tr><td>'.$n['Ville'].'</td>'.'<td>'.$n['haut'].'</td>'.'<td>'.$n['bas'].'</td></tr>';
            }
        ?>
        </tbody>
    </table>
</body>
</html>
