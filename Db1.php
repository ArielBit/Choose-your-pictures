<?php
//Coordonnées du serveur sql
$Dbname="choose";
$Host='127.0.0.8';
$Port=3310;
$Username="root";
$Password="Ariel&007"

//Connexion à la base de donnée
try{
  $Connect= new PDO('mysql:host=$Host dbname=$Dbname, port=$Port', $Username, $Password);
  $Connect-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXECPTION);
   
}catch(PDO EXECPTION $e){
  echo "Erreur de connexion." . $e->getMessage();
}

?>
