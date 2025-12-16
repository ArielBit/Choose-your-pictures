<?php
//Coordonnées du serveur sql
$Dbname="choose";
$Port=3310;
$Username="root";
$Password="Ariel&007";

//Connexion à la base de donnée
try{
  $Connect= new PDO('mysql:host= dbname=$Dbname, port=$Port', $Username, $Password);
  $Connect-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXECPTION);


  //Verification par la methode POST
  if($_SERVER["REQUEST METHOD"] =="POST") {

    $user = $_POST["user"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $img = $_POST["img"];

    if($user && $email && $mdp && $img) {

      $stmt = $Connect->prepare('SELECT COUNT(*) FROM choose WHERE user =:user, email =:email, mot_de_passe =:$mdp, img =:$img');
      $stmt->bindParam(':user', $user);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':mdp', $mdp);
      $stmt->bindParam(':img', $img);
      $stmt->execute();
      $Count= $stmt->fethColumn();

      if($Count >0) {
        echo "Compte Existant.";
      }else{
      $stmt =$Connect->prepare('INSERT INTO chose (user, email, mot_de_passe, img) VALUES(:nom, :email, :mdp, :img)');
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $mdp);
        $stmt->bindParam(':img', $img);
        $stmt->execute();

        if($stmt->execute()){
          echo "Données enregistrés avec succès.";
          header('Location : Confirmation.html');
          
        }else {
          echo "Erreur lors del'insertion des données.";
        }
      }
      
    } else {
      echo "Tout les champs sont obligatoires.";
    }
  } 

  
}catch(PDO EXECPTION $e){
  echo "Erreur de connexion." . $e->getMessage();
}

?>
