<?php 
$note=$_GET['note'];        //Aller chercher les points


$age=$_GET["age"];          //Aller chercher l'âge
$gender=$_GET["gender"];    //Aller chercher le genre
$english=$_GET["english"];  //Aller chercher la langue



?>






<form action="conditions.php" method="get">
    <label for="note"> Votre note </label>
        <input type="text" name="note" id="note">
        <input type="submit">   
</form>



<form action="conditions.php" method="get">
    <label for="age"> Votre âge (chiffres uniquement) </label>
    <input type="text" name="age" id="age">
    <label for="gender">Quel est ton genre?</label>
    <input type="radio"name="gender" value="homme">Homme</input>
    <input type="radio" name="gender" value="femme">Femme</input>
    <input type="radio" name="gender" value="autre">Autre</input><br>
    <label for="english">Parles-tu anglais?</label>
    <input type="radio"name="english" value="yes">Yes</input>
    <input type="radio" name="english" value="non"> Non</input>    
    <input type="submit">   
</form>


