<?php //MILESTONE 3 - SESSION, HEADER
    session_start();
    require_once 'functions.php'; //carico gli strumenti 
    //logica di controllo: decido cosa fare
    $final_password = "";
    $error_message = "";

    // <!-- recupero dato, prendo la lunghezza richiesta usando $_GET e controllo che il dato esista, trasformo il valore ricevuto in numero intero -->
    if(isset($_GET["pass_length"])){
    $length = (int) $_GET["pass_length"] ; 

    //recupero anche la scelta sulle ripetizioni
    //uso il casting (bool) così avrò true per "1" e false per "0"
    $allow_repeats = $_GET ["allow_repetitions"];

    //recupero scelte su caratteri 
    $wants_letters = isset($_GET["wants_letters"]);
    $wants_numbers = isset($_GET["wants_numbers"]);
    $wants_symbols = isset($_GET["wants_symbols"]);

     // Se l'utente non ha spuntato nessuna delle tre opzioni
    if (!$wants_letters && !$wants_numbers && !$wants_symbols) {
        $wants_letters = true;
        $wants_numbers = true;
        $wants_symbols = true;
    }


    //eseguo la funzione 
    //controllo se l'utente ha interagito, all'inizio pagina pulita, se inserisco un numero genero password altrimenti se premo invio senza numero ottengo messaggio di errore. 
    // Questo basta a capire se c'è un numero valido
    if ($length > 0) {
        $final_password = generatePassword($length, $allow_repeats, $wants_letters, $wants_numbers, $wants_symbols);

        $_SESSION['password_generata'] = $final_password;
        header('Location: result.php'  );
        exit;

        } else if (isset($_GET["pass_length"])) {
            // Se è entrato qui, significa che il parametro esiste ma non è > 0
            $error_message = "Nessun parametro valido inserito.";
        }

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
<body class="bg-light">

    <div class = "container mt-5 text-center">

        <h1 class = "text-body-secondary">Strong Password Generator</h1>
        <h3>Genera una password sicura</h3>

        <div class = "mt-5 ">
            <form action="index.php" method="GET" >
            
                <div>
                    <label for="pass_length" class = "lead">Lunghezza password:</label>
                    <input type="text" name="pass_length">
                </div>
                
                <div class="mt-4 text-start d-inline-block">
                    <label class = "lead d-block mb-2">Consenti ripetizioni di uno o più caratteri:</label>

                    <div class = "form-check">
                        
                        <input type="radio" class="form-check-input" name="allow_repetitions" id="rep_yes" value = "1" checked >
                        <label for="rep_yes" class="form-check-label"> Sì </label>
                    </div>

                    <div class = "form-check">
                        <input type="radio" class="form-check-input" name="allow_repetitions" id="rep_no" value = "0" >
                        <label for="rep_no" class="form-check-label"> No </label>
                    </div>
                    

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="wants_letters" id="letters" value = "1" checked >
                        <label for="letters" class="form-check-label">Lettere (A,Z) - (a,z)</label>

                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="wants_numbers" id="numbers" value = "1" checked >
                        <label for="numbers" class="form-check-label">Numeri</label>

                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="wants_symbols" id="symbols" value = "1" checked >
                        <label for="symbols" class="form-check-label">Simboli</label>

                    </div>


                </div>
                


                    <div>
                        <button type="submit" class="btn btn-primary">Invia</button>  
                    </div>
                

            </form>
        </div>




        <!-- stampo in pagina password finale; questo passaggio diventa superfluo dopo aver creato il file result.php perchè è lì che la password viene generata -->
       <!-- <?php if ($final_password!== "" ) : ?>
        
        <div class = "alert alert-info mt-5">
            La tua password è: <strong> <?php echo $final_password ?> </strong>
        </div>

        <?php endif; ?> -->

        <!-- stampo in pagina messaggio di errore -->
        <?php if ($error_message !== "") : ?>
            <div class="alert alert-warning mt-5">
                <?php echo $error_message ?>
            </div>
        <?php endif; ?>
        

    </div>
  

</body>
</html>