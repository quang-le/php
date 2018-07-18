<?php
//1st letter uppercase
$randomShit=["emile","kara","odile","simon"];

foreach ($randomShit as $shit){
   array_push($randomShit,ucfirst($shit));
   array_shift($randomShit);  
}
echo '<p>'.print_r($randomShit).'</p>';

//Display date and time
$today=date('d/m/Y');
$now=date('H:i');
echo '<p>'.$today.'</p>';
echo '<p>'.$now.'</p>';

//sum function

function addition($a,$b) {
    if (gettype($a)=="integer" && gettype($b)=="integer"){
        return $a+$b;
    }
    else {
        echo '<p>"Erreur, entrez un nombre entier!</p>';
    }
}

echo addition(5,7);
addition("5",7);
addition (5.6, 3);

//Function to return uppercase initials of string
$motto='Scientia Vincere Tenebras';

function acronym($string){
    $blah=str_word_count($string,2);
    foreach($blah as $b){
       $b=ucfirst($b);
       $splitter=str_split($b);
       array_push($blah,$splitter[0]);
       array_shift($blah);   
       
    }
    $blah=implode($blah);
    echo '<p>'.$blah.'</p>';  
}
acronym($motto);

//replace ae with latin character "ae"
function latinize ($word){
    return str_replace("ae","æ",$word);
}

echo latinize("microsphaera");






?>