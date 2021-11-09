<?php
require "header.php" ;  
$avatar = "";
if(isset($_POST['modifier'])) {
        $id = $_POST['id'] ;                        
        $prenom= $_POST['prenom'] ; 
        $nom = $_POST['nom'] ; 
        $adresse = $_POST['adresse'] ; 
        $image = $_POST['image'] ; 
        $email = $_POST['email'] ; 
        $numphone = $_POST['numphone'] ; 
        $datecreation = $_POST['datecreation'] ; 
        $avatar = $_FILES['avatar']['name']; 
        $upload = "avatar/".$avatar;
        move_uploaded_file($_FILES['avatar']['tmp_name'], $upload);
        $req = $pdo->prepare('UPDATE contact SET prenom = :prenom, nom = :nom, adresse = :adresse, image = :image,
        email = :email,numphone = :numphone, datecreation = :datecreation , avatar = :avatar WHERE id = :id');
        $result=$req->execute(array(
        'id' => $id,
        'prenom' => $prenom,
        'nom' => $nom,
        'adresse' => $adresse,
        'image' => $image,
        'email' => $email,
        'numphone' => $numphone,
        'datecreation' => $datecreation,
        'avatar' => $avatar));
        header('location: affichage.php?message=ok&message1=Mise a jour effectuee avec succes');
          if (!$result) {
            echo" la modification n'est pas reuissite";
              }else{

              echo" la modification est faite";
          }
         
}

 ?> 

 
                   