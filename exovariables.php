<?php
$name='Son';
$age=38;
$hungry=false;
$eyes='brun';
$family=array(0=>'Amandine',1=>'Maman',2=>'Papa');

?>

<html>
    <p>Je m'appelle <?php echo $name?></p>
    <p>J'ai <?php echo $age?> ans</p>
    <p><?php 
    if ($hungry==true){
         echo "J'ai la dalle!";}
    else {
        echo "J'ai assez mangé, merci!";} ?></p>
    <p>j'ai les yeux bruns</p>
    <p>Ma famille se compose de <?php echo $family;?></p>
</html>