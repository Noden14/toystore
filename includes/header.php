<?php

    require_once __DIR__ . '/database-connection.php';

    /* TO-DO: Include session.php to handle login sessions
              Hint: Use require_once to avoid redeclaring functions if the file is loaded elsewhere.
                    Both header.php and session.php are inside the includes folder
    */
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toys R URI</title>

    <link rel="stylesheet" href="css/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>

<body>

<header class="site-header">

    <div class="container header-container">

        <div class="logo">
            <img src="imgs/logo.png" alt="Toys R URI logo">
        </div>

        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Toy Catalog</a></li>

                <!-- TO-DO: Update this link to show "Log In" or "Log Out" depending on whether the user is logged in
                            Hint: Check session.php for a flag variable tracking login status
                                  Consider using the null-coalescing operator
                -->
                <li><a href="login.php">Log In</a></li>  
                 
            </ul>
        </nav>

    </div>

</header>

<main class="container">
