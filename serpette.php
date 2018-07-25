<?php 
function switcher(){
    $serpette = "<p> Buvons un coup ma serpette est perdue,<br>
    Mais le manche, mais le manche, <br>
    Buvons un coup ma serpette est perdue <br>
    Mais le manche m'est revenu! <br>
    </p>";
    
    $substitutions = array( "e", "i", "o", "u", "ou", "é", "è", "oi", "ui", "oui","an","in","on","un","oin");
    $vowels='/[aeiouâêéèôæœ]/';
    $mixers='/(ns |nt |s |st |t )+[,?;.:!]/'; 
    echo $serpette;

    foreach ($substitutions as $s){
        $malamache=preg_replace($vowels, $s, $serpette);   //replace all vowels of $vowels with array element
        $malamache = str_replace($s.$s,$s,$malamache);     //filter double vowels  
        $malamache = preg_replace($mixers,' ',$malamache); //filter conjugation markers
        // $malamache = str_replace($s.'n',$s,$malamache);
        // $malamache = str_replace($s.$s,''.$s.'n'.$s,$malamache);
        echo $malamache;
    };
}
switcher();
?>



