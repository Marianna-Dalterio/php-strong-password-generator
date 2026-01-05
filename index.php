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

if ($length > 0) {
    $final_password = generatePassword($length, $all_characters);
} 

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-strong-password-generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>

    <div class = "container mt-5 text-center">

        <h1 class = "text-body-secondary">Strong Password Generator</h1>
        <h3>Genera una password sicura</h3>

        <div class = "mt-5">
            <form action="index.php" method="GET" >
            
                <label for="pass_length">Lunghezza password:</label>
                <input type="text" name="pass_length">
                <button type="submit">Invia</button>

             </form>
        </div>


       <?php if ($final_password!== "" ) : ?>
        
        <div class = "alert alert-info mt-5">
            La tua password è: <?php echo $final_password ?>
        </div>

        <?php endif; ?>
        

    </div>
  

</body>
</html>