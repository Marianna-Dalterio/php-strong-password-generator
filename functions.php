<?php
//IN QUESTO FILE SOLO GLI STRUMENTI, IN INDEX.PHP LA LOGICA DI CONTROLLO. 

// <!-- creo un unico "grande calderone" da cui pescare -->
 $lower_case= range('a','z');
 $upper_case= range('A','Z');
 $number=range(0,9);
 $stringa_simboli = "!@#$%^&*()";
$array_simboli = str_split($stringa_simboli);
 $all_characters = array_merge($lower_case, $upper_case, $number, $array_simboli);

//  scrivo la funzione per generare la password
function generatePassword ($length, $all_characters){
    $password = "";
    for ($i=0; $i<$length; $i++){
        $random_index = rand(0, count($all_characters)-1);
        $carattere_pescato = $all_characters[$random_index];
        $password.=$carattere_pescato;
        
    }
    
    return $password;
    
}






?>
