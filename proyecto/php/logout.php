<?php
    session_start();

    session_unset();

    session_destroy();
    header('Location: ../index.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <title>Logout</title>
</head>
<body>
    <header>
        <a href="../index.php">Inicio</a>
    </header>
    
</body>
</html>