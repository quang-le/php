<?php 
try{
    $db=new PDO('mysql:host=mysqldb;dbname=weatherapp;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur:'.$e->getMessage());
}
$meteo=$db->query('SELECT * from meteo');
$meteoFetch=$meteo->fetchAll();
$newCity;
$newHigh;
$newLow;

if (!empty($_POST)){
    $newCity=$_POST['ville'];
    $newHigh=$_POST['haut'];   
    $newLow=$_POST['bas'];
    $address='index.php?status=false';
    $errorLog=[];
    $toDelete=$_POST['location'];
    //var_dump($toDelete);

    //Delete with checkbox
    if (!empty($toDelete)){
        foreach($toDelete as $delete){
            $erase=$db->prepare('DELETE FROM meteo WHERE Ville= :toDelete');
            $erase->bindParam(':toDelete',$delete);
            $erase->execute();
            $erase->closeCursor();
        }
        if (empty($newCity) || empty($newHigh) || empty($newLow)){
        header('Location: index.php');
        }
    }

    if (!empty($newCity && !empty($newHigh) && !empty($newLow))){
        $newHigh=(int)$newHigh;
        $newLow=(int)$newLow;
        //Sanitize
        $newCity=filter_var($newCity,FILTER_SANITIZE_STRING);
        // Somehow the FLOAT filter messes the whole thing up
        // $newHigh=filter_var($newCity,FILTER_SANITIZE_NUMBER_FLOAT);  
        // $newLow=filter_var($newCity,FILTER_SANITIZE_NUMBER_FLOAT);


        //Validate city name
        $newCity=trim($newCity);
        if (!empty($newCity)){
            $newCity=ucfirst($newCity);
        }
        else{
            array_push($errorLog,"city");
        }
        //Validate max temperature
        if($newHigh>60){
            array_push($errorLog,"max");
        }
        //Validate min temperature
        if($newLow<-276){
            array_push($errorLog,"min");
        }

        //Routing according to errors
        if (empty($errorLog)==false){
            foreach($errorLog as $error){
                $address.='&'.$error.'=false';
            }
            header('Location: '.$address);
        }
        else{
            global $db;
            global $newCity;
            global $newHigh;
            global $newLow;
            $sql='INSERT INTO meteo (Ville,haut,bas) VALUES (:newCity,:newHigh,:newLow)';
            $newData=$db->prepare($sql);
        
            $newData->bindParam(':newCity',$newCity);
            $newData->bindParam(':newHigh',$newHigh);
            $newData->bindParam(':newLow',$newLow);
            $newData->execute();
            header('Location: index.php');
            
        }
    }
    // var_dump($meteo);
    // $dataSet=$meteo->fetchAll();
    // print_r($dataSet);
}

?>

