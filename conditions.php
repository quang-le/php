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

$time=date("h:i:s");



?>
<p> <?php echo $time?> </p>

