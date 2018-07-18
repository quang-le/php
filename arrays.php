<?php 
$moi=array(
    'nom'=>'Le',
    'age'=>38,
    'yeux'=> 'bruns',
    'vegan'=> false,
    'gamer'=> true,
    'hobbies'=> ["gaming", "chilling", "drugs", "gardening", "plants"],
    'papa'=>$papa,
);

$papa=array(
    'nom'=>'Le',
    'age'=>66,
    'yeux'=>'bruns',
    'vegan'=>false,
    'gamer'=>false,
    'hobbies'=>["food", "chilling","karaoke"]
);
//echo '<pre>'.print_r($moi).'</pre>';
//echo '<pre>'.print_r($moi['papa']['yeux']).'</pre>';
$papaHobbies=count($papa['hobbies']);
$myHobbies=count($moi['hobbies']);


$sumHobbies= $papaHobbies+$myHobbies;


echo '<pre>'.$sumHobbies.'</pre>';

//ajoute taxidermie
$moi['hobbies'][]='taxidermie';
echo '<pre> '.$moi['hobbies'][5].'</pre>';

//changer nom

$moi['nom'];
$moi['nom']='Dieudonné';
echo $moi['nom'];

//ame soeur
$toi=array(
    'yeux'=>'bleus',
    'age'=>35,
    'vegan'=>true,
    'gamer'=>true,
    'hobbies'=>['gaming','cooking shows','plants','chilling']
);

$fusionKid=array_merge($moi['hobbies'],$toi['hobbies']);
print_r($fusionKid);
$intersectKid=array_intersect($moi['hobbies'],$toi['hobbies']);
print_r($intersectKid);
?> 

