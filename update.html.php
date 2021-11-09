
<?php    require 'header.php'; 
if (isset($_GET['id'])) {
    $id =$_GET['id'];

    $req = "SELECT *FROM contact WHERE id =$id ";
    $result = $pdo->query($req);


  
 

?>

                    <div class="form-group row">
                    <div class="col-md-2"> </div>
                    <div class="col-md-8">    
                      <h3 class="h3"> Veillez Modifiez ton contact:</h3>
                            <form class="form" action="update.php" method="POST" enctype="multipart/form-data">
      
                                <?php
                               while($row = $result->fetch(PDO::FETCH_ASSOC)){?>

                            <input type="hidden" class="form-control mb-3" id="prenom" name="id" required ="requitred" value ="<?php echo $row['id'];?>">  
                            <label for="prenom" class="control-label">Prenom:</label>
                            <input type="text" class="form-control mb-3" id="prenom" name="prenom" required ="requitred" value ="<?php echo $row['prenom'];?>">
                            
                
                            <label class="control-label" for="nom">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" required ="requitred"  value ="<?=$row['nom']?>">
                     
                        
                            <label class="control-label" for="adresse ">Adresse:</label>
                            <input type="text" class="form-control " id="adresse" name="adresse" required ="requitred" value ="<?=$row['adresse']?>">
                        
                        
                            <label class="control-label" for="image ">Profil:</label>
                            <input type="text" class="form-control " id="image" name="image" required ="requitred" value ="<?=$row['image']?>">
                     
                        
                            <label class="control-label" for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required ="requitred" value ="<?=$row['email']?>">
                      

                            <label class="control-label" for="pwd">Telephone:</label>
                            <input type="text" class="form-control" id="telephone" name="numphone"required ="requitred" value ="<?=$row['numphone']?>">
                   
                            <label class="control-label" for="date">Date de Creation:</label>
                            <input type="date" class="form-control" id="date" name="datecreation"required ="requitred" value ="<?=$row['datecreation']?>">
                            
                              <label class="control-label" for="avatar">Avatar</label>
                            <input   class="form-control-file" type="file" name="avatar"  value="avatar/<?=$row['avatar']?>">
                            <img  class="profil" src="avatar/<?=$row['avatar']?>" alt="" >
                          
                          
                          
                            
                               
                            <?php } ?>
                    
                            <button type="submit" class="btn btn-lg btn-primary mt-3" name="modifier">Modifier</button>
                            

                        </form>
                        
                
                        
                 </div>
          

                <script src ="style/bootstrap.min.js"></script>      
  </div> 
  </div> 
<?php } ?>


</body>
</html>