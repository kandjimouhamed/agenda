<?php

define("DB_USER" , "root");
define("DB_PASSWORD" , "");
define("HOST" , "localhost");
define("DB_NAME","agenda");
try
{
	// On se connecte à MySQL
	$pdo = new PDO("mysql:host=localhost;dbname=agenda; charset=utf8", 'root', '');
	//echo "la connection est etablie";
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur Connexion : '.$e->getMessage());
}

?>