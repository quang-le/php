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



//opposite of previous one
function delatinize ($word){
    return str_replace("æ","ae",$word);
}

echo latinize("microsphaera");
echo latinize("microsphæra");

//feedback function

function feedback($message,$class){
    echo '<div class='.$class.'>'.$message.'</div>';
}
feedback("Adresse email incorrecte","warning");

//same with "info" as default $class
function feedback2($message,$class='info'){
    echo '<div class='.$class.'>'.$message.'</div>';
}
feedback2("caca boudin");

// Random word generator (doesn't work because of API error 401)
if ($_SERVER["REQUEST_METHOD"]=="POST"){
   $range1=rand(1,5);
   $range2=rand(7,15);
   echo '<p id="mot1"></p>';
   echo '<p id="mot2"></p>';
   echo '<script>
   //Random word generator through API
   function makeAjaxCall (methodtype, url){
       var promiseObj=new Promise(function(resolve,reject){
           
           let xhr=new XMLHttpRequest;
           xhr.open(methodtype,url,true);
           xhr.send();
      
           xhr.onreadystatechange=function(){
               if (xhr.readyState===4){                  //checks the state of the request. 4 means its been treated
                   console.log("state is 4");                
                   if (xhr.status===200){                // checks the status. 200 means OK (as opposed to 404).
                       var resp=xhr.responseText;        // store the response in a var  
                       var respJSON=JSON.parse(resp);     // convert the text response into JSON
                       console.log(xhr.responseText);  
                       resolve(respJSON);                 // the JSON converted response will be called if the promise resolves 
                   }
                   else {
                       console.log("status failure")
                       reject(xhr.status);                // the status will be called if the promise is rejected
                   }
                   
               }
               else {
                   console.log("xhr processing going on");      // if readystate !=4 it means the request isn\'t done processing. The promise can\'t be resolved or rejected yet.
               }
           }
       });
       return promiseObj;
   };
   
   errorHandler=(error)=>{console.log("too bad!try again!")};
   function success1(word){
       document.getElementById("mot1").innerHTML=word;
   }
   function success2(word2){
       document.getElementById("mot2").innerHTML=word2;
   }
   
   makeAjaxCall("POST", "https://wordsapiv1.p.mashape.com/words/?letters='.$range1.'?random=true").then(success1, errorHandler);
   makeAjaxCall("POST", "https://wordsapiv1.p.mashape.com/words/?letters='.$range2.'?random=true").then(success2, errorHandler);
   </script>';
}

//convert to lowercase doesn't work with special char
$crap='ARRÊTE DE CRIER JE N\'ENTENDS PLUS RIEN';
$crap= strtolower($crap);
echo '<p>'.$crap.'</p>';

//sweep up after previous dev

// Calcul du volume d'un cône de rayon 5 et de hauteur 2  
$volume = 5 * 5 * 3.14 * 2 * (1/3);  
echo 'Le volume du cône de rayon 5 et de hauteur 2 est : ' . $volume . ' cm<sup>3</sup><br />';  
// Calcul du volume d'un cône de rayon 3 et de hauteur 4  
$volume = 3 * 3 * 3.14 * 4 * (1/3);  
echo 'Le volume du cône de rayon 3 et de hauteur 4 est : ' . $volume . ' cm<sup>3</sup><br />'; 

function cone($rayon,$hauteur){
    $volume = $rayon*$rayon*3.14*$hauteur*(1/3);
    echo 'Le volume du cône de rayon' .$rayon.' et de hauteur' .$hauteur. ' est : ' . $volume . ' cm<sup>3</sup><br />'; 
}
cone(5,2);
cone(3,4);




?>
<h1>Generate 2 random words</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="submit" id="clicker" >
</form>





