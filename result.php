<?php
    session_start();
    // Se la password non c'è, torna in home
    if (!isset($_SESSION['password_generata'])) {
        header('Location: index.php');
        exit;
    }

     $password = $_SESSION['password_generata'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

    <div class="container mt-5 text-center" >
        
        <h1>Ecco la tua password sicura!</h1>
        
        <div class="alert alert-success mt-4">
            <code class="display-6"><?php echo $password; ?></code>
        </div>
        
        <a href="index.php" class="btn btn-primary mt-3">Generane un'altra</a>
       
    </div>

</body>
</html>