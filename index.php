<?php

//connexion à la bdd
try 
{
    $bdd = new PDO('mysql:host=localhost;dbname=ma_premiere_base;charset=utf8', 'root', 'street');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

//lecture des données
$reponse = $bdd->query('SELECT * FROM exemple_auch');

while ($donnees = $reponse->fetch()){
	echo '<p>Nom user = '.$donnees['nom'].' - Email user = '.$donnees['email'].'</p>';
}

//écrire des données
$nom = 'Toto';
$email = 'toto@123';
$password = 1234;

$req = $bdd->prepare('INSERT INTO exemple_auch(nom, email, password) VALUES(:nom, :email, :password)');
$req->execute(array(
    'nom' => $nom,
    'email' => $email,
    'password' => $password,
    ));

//modifier les données
$bdd->exec('UPDATE exemple_auch SET nom = "TRALALA" WHERE nom = "toto"');


//supprimer des données 
$bdd->exec('DELETE FROM exemple_auch WHERE nom = "TRALALA"');

?>