<?php 
try{
    $db=new PDO('mysql:host=mysqldb;dbname=weatherapp;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur:'.$e->getMessage());
}

if (isset($_POST)){
$newCity=$_POST['ville'];
$newHigh=$_POST['haut'];
$newHigh=(int)$newHigh;
$newLow=$_POST['bas'];
$newLow=(int)$newLow;
$sql='INSERT INTO meteo (Ville,haut,bas) VALUES ('.$newCity.','.$newHigh.','.$newLow.')';
$db->exec($sql);

$meteo=$db->query('SELECT * from meteo');
$dataSet=$meteo->fetch();
// print_r($dataSet);

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL -PDO</title>
</head>
<body>
    <form action="#" method="POST">
        <label for="ville">Ville</label>
        <input type="text" name="ville">
        <label for="haut">Maxima</label>
        <input type="text" name="haut">
        <label for="bas">Minima</label>
        <input type="text" name="bas">
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
             while ($dataSet=$meteo->fetch()){
                print_r($dataSet);
                echo '<tr><td>'.$dataSet[Ville].'</td>'.'<td>'.$dataSet[haut].'</td>'.'<td>'.$dataSet[bas].'</td></tr>';
                echo '<input type="checkbox" name='.$dataSet[Ville].' value='.$dataSet[Ville].'>'.$dataSet[Ville].'</input>';
             }
            ?>
        </tbody>
    </table>
</body>
</html>
