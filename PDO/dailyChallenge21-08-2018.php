<?php
    
        try{
        $db=new PDO('mysql:host=mysqldb;dbname=dailychallenges;charset=utf8', 'root', 'root');
        //Declare variables
        $longueur=100; //nombre d'éléments dans la DB
        $maxValue=1000;//Valeur maximale des nombres à générer
        $arrayA=[];
        $arrayB=[];

        //Clean up Db at start (pour éviter de surcharger la DB)
        function resetOnLoad(){
            global $db;
            $trasher=$db->prepare("DELETE FROM randomNumbers");
            $trasher->execute();
            $trasher->closeCursor();
        }

        //Generate the numbers and push them into a DB
        function randomGenerator ($iterations, $limit){
            global $db;
            for ($i=0; $i<$iterations;$i++){
                    $random=rand(0,$limit); 
                    //echo $random;                  
                    $stmnt=$db->prepare("INSERT INTO randomNumbers(random) VALUES(:random)");
                    $stmnt->bindParam(':random', $random);
                    $stmnt->execute();
                    $stmnt->closeCursor();
            }
        }

        //Calling the functions. At this stage Db is populated
        resetOnLoad();
        randomGenerator($longueur, $maxValue);

        // Get the numbers and order them
        $order=$db->prepare("SELECT * FROM randomNumbers ORDER BY random ASC");
        $order->execute();
        $ordered=$order->fetchAll(PDO::FETCH_COLUMN,0);
        function displayAsc(){
            global $arrayA;
            global $ordered;
            foreach($ordered as $o){
                echo '<tr><td>'.$o.'</td></tr>';
                array_push($arrayA,$o);
            }
        }

        //Second sorting algorithm
        $reverse=$db->prepare("SELECT * FROM randomNumbers ORDER BY random DESC");
        $reverse->execute();
        $reversed=$reverse->fetchAll(PDO::FETCH_COLUMN,0);
        function sorter(){
            global $arrayB;
            global $ordered;
            global $reversed;
            global $longueur;
            for($i=0;$i<$longueur/2;$i++){
                echo '<tr><td>'.$ordered[$i].'</td></tr>';
                echo '<tr><td>'.$reversed[$i].'</td></tr>';
                array_push($arrayB,$ordered[$i],$reversed[$i]);
            }
        }
    }
    //This is part of the PDO creation (see Parcours)
    catch(Exception $e)
    {
        die('Erreur:'.$e->getMessage());
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Challenge 21/08/2018</title>
</head>
<body>
    <table>
        <thead>
            <th>Numbers</th>
        </thead>
        <tbody>
            <?php 
                displayAsc();
            ?>
        </tbody>
    </table>
    <table>
        <thead>
            <th>Sorted as fuck</th>
        </thead>
        <tbody>
            <?php 
                sorter();
            ?>
        </tbody>
    </table>
    
</body>
</html>

