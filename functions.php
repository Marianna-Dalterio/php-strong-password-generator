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
function generatePassword ($length, $all_characters, $allow_repeats){

    // SICUREZZA: Se l'utente vuole caratteri univoci ma ne chiede più di quelli disponibili...
    if(!$allow_repeats && $length > count($all_characters)){
        return "Errore: non ci sono abbastanza caratteri unici disponibili! ";
    }


    $password = "";

    
// Finchè la password non raggiunge la lunghezza desiderata...
    while (strlen($password)<$length) {

        // 1. Pesco un carattere a caso
        $random_index = rand(0, count($all_characters)-1);
        $carattere_pescato = $all_characters[$random_index];

        // 2. Controllo: devo vietare i doppioni?
        // Se SI (allow_repeats è false) AND il carattere è già dentro la password...
        if ($allow_repeats == false && str_contains($password, $carattere_pescato)){
            // ...allora NON faccio nulla (il ciclo ricomincia e pescherà un altro carattere)
            continue;
        }

        // 3. Se arrivo qui, significa che o le ripetizioni sono ammesse 
        // o il carattere è nuovo. Quindi lo aggiungo!
        $password.=$carattere_pescato;
        
    }
    
    return $password;
    
}






?>
