<?php

$lachambreestsale='maniaque';

if ($lachambreestsale=='maniaque'){
    echo '<p> Get a life, loser!</p>';
}
elseif ($lachambreestsale=='immaculée'){
    echo '<p> Il fait propre ici!</p>';
}
elseif ($lachambreestsale=='en ordre'){
    echo '<p> Attaboy!</p>';
}
elseif ($lachambreestsale=='sale'){
    echo '<p> Tu te fous de moi?!</p>';
}
elseif ($lachambreestsale=='dégoutante'){
    echo '<p> Mais ça pue la merde ici!</p>';
}

$time=date("hi.s");

if($time>500 && $time<900){
    echo 'Bonjour! Il est '.date('h:i:s');
}
elseif($time >=900 && $time<1200){
    echo 'Bonne journée! Il est '.date('h:i:s');
}
elseif($time >=1200 && $time<1600){
    echo 'Bon après-midi! Il est '.date('h:i:s');
}
elseif($time >=1600 && $time<2100){
    echo 'Bonne soirée! Il est '.date('h:i:s');
}
else{
    echo 'Bonne nuit! Il est '.date('h:i:s');
};


$age=$_GET["age"];

if ($_SERVER["REQUEST_METHOD"]=="GET"){
    if($age<12 && $age>0){
        echo '<p> Salut petit!</p>';
    }
    elseif($age>=12 && $age<18){
        echo '<p> Salut l\'ado!</p>';
    }
    elseif($age>=18 && $age<115){
        echo '<p> Salut l\'adulte!</p>';
    }
    elseif($age>=12 && $age<18){
        echo '<p> Salut l\'ado!</p>';
    }
    elseif($age>=115){
        echo '<p> Wow! Toujours en vie?!</p>';
    }
};

//Skipping to switch exercise

$note=$_GET['note'];
/*switch($note){
    case 1;
    case 2;
    case 3;
    case 4:
        echo '<p> C\est de la merde!</p>';
        break;
    case 5;    
    case 6; 
    case 7;
    case 8;
    case 9:
        echo '<p> C\est pas top, coco..!</p>';
        break;
    case 10;
    case 11;
    case 12;
    case 13;
    case 14:
        echo '<p> Allez, ça passe</p>';
        break;
    case 15;
    case 16;
    case 17;
    case 18;
        echo '<p> Now we\'re talking!</p>';
        break;
    case 19;
    case 20;
        echo '<p>Dude, sois un peu plus discret quand tu triches...</p>';
        break;


}*/

// using ranges solution from stackoverflow

switch(true){
    case $note>=0 && $note <5:
        echo '<p> C\'est de la merde!</p>';
        break;
    case $note>=5 && $note<10:
        echo '<p> C\'est pas top, coco..!</p>';
        break;
    case $note>=11 && $note<15:
        echo '<p> Allez, ça passe</p>';
        break;
    case $note>=15 && $note<19:
        echo '<p> Now we\'re talking!</p>';
        break;
    case $note>=19:
        echo '<p>Dude, sois un peu plus discret quand tu triches...</p>';
        break;
}

//ternary conditions (with switch)
$gender=$_GET["gender"];
$english=$_GET["english"];

switch(true){
    case $age>=0 && $age<12:
        if ($gender=="homme"){
            echo ($english="yes"? "Hello boy!":"Salut petit!");
        }
        elseif ($gender=="femme"){
            echo($english="yes"? "Hello girl!":"Salut petite!");
        }
        elseif ($gender=="autre"){
            echo($english="yes"? "Hello you!":"Salut toi!");
        }
        break;
    case $age>=12 && $age<18:
        if ($gender=="homme"){
            echo ($english="yes"? "Hello dude!":"Salut l'adolescent!");
        }
        elseif ($gender=="femme"){
            echo($english="yes"? "Hello gal!":"Salut l'adolescente!");
        }
        elseif ($gender=="autre"){
            echo($english="yes"? "Hello you teenager!":"Salut l'ado!");
        }
        break;
        
    case $age>=18 && $age<115:
        if ($gender=="homme"){
            echo ($english="yes"? "Hello Old Man!":"Salut Vieille Croûte!");
        }
        elseif ($gender=="femme"){
            echo($english="yes"? "Hello Old Lady!":"Salut Vieille Peau!");
        }
        elseif ($gender=="autre"){
            echo($english="yes"? "Hello you Old Timer!":"Salut l'ancêtreS!");
        }
        break;
};


?>

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

<form action="conditions.php" method="get">
    <label for="note"> Votre note </label>
        <input type="text" name="note" id="note">
        <input type="submit">   
</form>

