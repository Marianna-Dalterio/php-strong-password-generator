<?php
// <!-- recupero dato, prendo la lunghezza richiesta usando $_GET e controllo che il dato esista, trasformo il valore ricevuto in numero intero -->
//    $length = isset($_GET["pass_length"]) ? $_GET["pass_length"] : null;
$length = (int) ($_GET["pass_length"] ?? null); 

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

//eseguo la funzione 
$final_password = "";
$error_message = "";

//controllo se l'utente ha interagito, all'inizio pagina pulita, se inserisco un numero genero password altrimenti se premo invio senza numero ottengo messaggio di errore. 

// Questo basta a capire se c'è un numero valido
    if ($length > 0) {
    $final_password = generatePassword($length, $all_characters);
    } else if (isset($_GET["pass_length"])) {
        // Se è entrato qui, significa che il parametro esiste ma non è > 0
        $error_message = "Nessun parametro valido inserito.";
    }




?>
