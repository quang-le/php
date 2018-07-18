<?php

$wtf=$_POST["wtf"];

//This function prevents cross-scripting
function testInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $wtf=testInput($wtf);
}
$display=($wtf=="humain"? "https://media.giphy.com/media/nKN7E76a27Uek/giphy.gif":($wtf=="chat"?"https://media.giphy.com/media/rjnOZxmdv6rXG/giphy.gif":($wtf=="licorne"?"https://media.giphy.com/media/21F1TuLSxWPAY/giphy.gif":"https://media.giphy.com/media/3ornk57KwDXf81rjWM/giphy.gif")));

echo '<img src= '.$display.'>';

?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="wtf">Qu'est-tu?</label>
    <input type="radio" name="wtf" value="humain">Humain</input>
    <input type="radio" name="wtf" value="chat">Chat</input>
    <input type="radio" name="wtf" value="licorne">Licorne</input>
    <input type="submit">
</form>
