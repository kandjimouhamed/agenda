<?php

require 'header.php';
$avatar ="";

if(isset($_POST['enregistrer']))
{
    echo "le button ne passe passa";
     $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $image = $_POST['image'];
    $email = $_POST['email'];
    $numphone = $_POST['numphone'];
    $datecreation= $_POST['datecreation']; 
    $avatar = $_FILES['avatar']['name']; 
    //ajout image
    $upload = "avatar/".$avatar;
    move_uploaded_file($_FILES['avatar']['tmp_name'], $upload);
  
                if (!empty($prenom) && !empty($nom)&& !empty($adresse)&& !empty($image)&& !empty($email)&& 
                !empty($numphone)&& !empty($datecreation) && !empty($avatar)) {
                    
                $req = $pdo->prepare('INSERT INTO contact(prenom,nom,adresse,image,email,numphone,datecreation,avatar)
                VALUES(:prenom, :nom, :adresse,:image,:email,:numphone,:datecreation,:avatar)');
                
                $result=$req->execute(array(
                    'prenom' => $prenom,
                    'nom' => $nom,
                    'adresse' => $adresse,
                    'image' => $image,
                    'email' => $email,
                    'numphone' => $numphone,
                    'datecreation' => $datecreation,
                    'avatar' => $avatar));

                        if (!$result) {
                            echo "la requette ne passe passa";
                        } 
                   
                    
                     $message =  'ok';
                        echo"insertion ok"; 
                        
                        
                        header('location: affichage.php?message='.$message.'&message=Enregistrement effectuee avec succes');
                        
                        exit;
                        
                    }else {
                   
                        echo " les champs non pas remplis"; 
                    }

                }elseif(!isset($_POST['enregistrer']))
                    {

                    }else {
                    echo"insertion non ok";

                    }
                
                    



?>
           
<div class="form-group row">
                    <div class="col-md-2"> </div>
                    <div class="col-md-8">
                    <?php if ((isset($_GET['succes']))) {?>
                         <div class="alert alert-success" role="alert">
                         <?php echo $_GET['succes'];?>
                        </div>
                        <?php } ?>

                  
                    <h3 class="h3"> Veillez enregistrez ton contact:</h3>
                    <form class="form" action="" method="POST" enctype="multipart/form-data">
      
                
                            <label for="prenom" class="control-label">Prenom:</label>
                            <input type="etext" class="form-control mb-3" id="prenom" name="prenom" required ="requitred">
                        

                    
                            <label class="control-label" for="nom">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" required ="requitred">
                     
                        
                            <label class="control-label" for="adresse ">Adresse:</label>
                            <input type="text" class="form-control " id="adresse" name="adresse" required ="requitred">
                        
                        
                            <label class="control-label" for="image ">Profil:</label>
                            <input type="text" class="form-control " id="image" name="image" required ="requitred">
                     
                        
                            <label class="control-label" for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required ="requitred">
                      

                            <label class="control-label" for="pwd">Telephone:</label>
                            <input type="text" class="form-control" id="telephone" name="numphone"required ="requitred">
                   
                            <label class="control-label" for="date">Date de Creation:</label>
                            <input type="date" class="form-control" id="date" name="datecreation"required ="requitred">
                            <label class="control-label" for="avatar">Avatar</label>
                            <input  class="form-control-file" type="file" name="avatar">
                    
                            <button type="submit" class="btn btn-lg btn-primary mt-3" name="enregistrer">Enregistrer</button>

                        </form>
                 </div>
                    
                
            
         <div class="col-md-2"> </div>    
            
                    </div>       
        
        

                   
  </div> 
         
</body>
</html>