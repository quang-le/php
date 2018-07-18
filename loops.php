<?php

$countWhile=0;
while($countWhile<121){
    echo'<p>'.$countWhile.'</p>';
    $countWhile++;
}


$countFor=0;
for($countFor=0; $countFor<121; $countFor++){
    echo'<p>'.$countFor.'</p>';
}

$lovelace2=["Son",
"Mostapha","Julie","Mohamed",
"Geoffrey","Morgane","Claudiu",
"Mariane","Sammuel",
"Sourech","Stéphane",
"Liliane","Andrea",
"Ludo D","Paul",
"Ludo H","Gally",
"Gaetano","Anthony",
"Mika","Baptiste",
"Guillaume","Dylan",
"Pedro","Romain",];

for ($i=0;$i<count($lovelace2);$i++){
    echo'<p>'.$lovelace2[$i].'</p>';
}

$countries=["Groland", "Neverland", "Principality of Hutt River","Hyrule", "Mushroom Kingdom","Alola","Rivellon", "Inkopolis","Mos Eisley","Melmac"];
$countryCodes=["GRO","NVR","HUTT","HY","MK","ALO","RIV","INK","ME","MEL"];

for($i=0;$i<count($countries);$i++){
    $countries[$countryCodes[$i]]=$countries[$i];
    unset($countries[$i]);
}

?>

<select name="country" id="country">
    <?php foreach($countries as $c){
        
        echo '<option value = "'.array_search($c,$countries).'">'.$c.'</option>';
    
}?>

</select>