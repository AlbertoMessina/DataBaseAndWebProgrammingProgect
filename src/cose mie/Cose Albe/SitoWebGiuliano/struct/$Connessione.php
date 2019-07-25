<?php

// Inizializzazione delle variabili del database
$ip_db = "151.97.9.185:3307";
$utente_db = "portaro_giuliano";
$password_db = "6867145723";
$nome_db = "portaro_giuliano";

// Inizializza la connessione al database
$connessione = mysqli_connect($ip_db, $utente_db, $password_db, $nome_db) or die ("Il database è temporaneamente offline.");

?>