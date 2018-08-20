<?php
try 
{
    $bdd=new PDO('mysql:host=mysqldb;dbname=clients;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur:'.$e->getMessage());
}

$resultat=$bdd->query('SELECT * from becode');

$donnees=$resultat->fetch();

while ($donnees=$resultat->fetch()){
    echo $donnees['name'];
}
$resultat->closeCursor();
?>