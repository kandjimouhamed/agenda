<?php
require 'header.php';

$req = "SELECT *FROM contact ORDER BY id ASC ";
$result = $pdo->query($req);
if(!$result){
    echo"la requette a suibi une defeance";
}
else{
    //recuperation des lignes de la base de donnees 
    $nb_contact = $result->rowCount();
    ?>
     

    
    <h3>Tous les contacts:</h3>
    <h4>il y a <?=$nb_contact." contacts d'enregistrements"?></h4>
    <ul>
            <!-- RECHERCHE-->
	   <?php 	
       if (isset($_GET['q']) AND !empty($_GET['q'])) {
        $q = htmlspecialchars($_GET['q']);
        $contact = $pdo->query('SELECT * FROM contact WHERE nom  LIKE "%'.$q.'%" ');
         $compte = $contact->rowCount();
    }
    ?>
            
         <!-- LES ALERTES   -->
       
    <?php if ((isset($_GET['message'])) && (trim($_GET['message'])=='ok')){?>
							<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">X</a>
              <h4 class="alert-heading">Succes!</h4>
             <?php echo $_GET['message']; ?></div>
              <?php } ?>
              <?php if ((isset($_GET['message'])) && (trim($_GET['message'])!='ok')){?>
				 <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">x</a>
              <h4 class="alert-heading">Error!</h4>
              <?php echo $_GET['message1']; ?></div> <?php } ?>

          <!-- FIN DES ALERTES   -->     
             <!-- FORMULAIRE DE RECHERCHE-->
                  <form action="" method="get" class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="search" name="q" class="form-control">
                        </div> 
                        <div class="col-md-2">
                            <input type="submit" name="rechercher" value="Rechercher" class="btn btn-success">
                        </div>
                    </div>  
                 </form>
                   <!-- FIN DU FORMULAIRE DE RECHERCHE-->
                  

    <table class=" table table-striped  table-bordered  ">
    
        <thead class="thead-dark">
        <tr>
            <th scope="col">Identifiant:</th>
            <th scope="col">Prenom:</th>
            <th scope="col">Nom:</th>
            <th scope="col">Adresse:</th>
            <th scope="col">Profil:</th>
            <th scope="col">Email:</th>
            <th scope="col">Telephone:</th>
            <th scope="col">Date de Creation:</th>
            <th scope="col">Photo Profil</th>
            <th scope="col">Actions</th>
            
            
        </tr> 
        </thead>
        <tbody>
	 
	
        <?php
        if (isset($_GET['rechercher']) AND !empty($_GET['q'])) {
            
         if($compte > 0) { ?>
            <tr> <?php 
        while($a = $contact->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr> <td><?= $a['id'] ?></>
            <td><?= $a['prenom'] ?></td>
	      <td><?= $a['nom'] ?></>
          <td><?= $a['adresse'] ?></td>
         <td><?= $a['image'] ?></td>
          <td><?= $a['email'] ?></td>
          <td><?= $a['numphone'] ?></td>
          <td><?= $a['datecreation'] ?></td>
          <td><img class="profil" src="avatar/<?php echo $a['avatar'];?>"/></td>
            <!-- <td><button type="button" class="btn btn-primary update" name="edite" ><a class="text text-white" href="update.html.php?id=<?=$a['id']?>">Edite</a></button></td> -->
           <td> 
               <a class="text text-white" href="update.html.php?id=<?=$a['id']?>">
               <i class="lar la-edit" style="color: #015093; font-size: 15px;"></i> </a>
               <a onclick ="return confirm('Etes-vous sur de vouloir supprimer cette entree?');"
               
                class="text text-white" href="delete.php?id=<?=$a['id']?>">
                <i class="lar la-trash-alt" style="color: #015093; font-size: 15px;"></i> </i></a>

                <a class="text text-white" href="update.html.php?id=<?=$a['id']?>">
               <i class="las la-info-circle" style="color: #015093; font-size: 15px;"></i> </a>
                
               
            </td>
            <!-- <td><button onclick ="return confirm('Etes-vous sur de vouloir supprimer cette entree?');"  type="button" class="btn btn-danger delete"><a class="text text-white" href="delete.php?id=<?=$a['id']?>">Supprimer</a></button></td> -->
            </tr>

           

	   <?php } ?> 
	   </tr>
       <?php } 
           

    }

       
            else{
                while($a = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr> <td><?= $a['id'] ?></>
                        <td><?= $a['prenom'] ?></td>
                      <td><?= $a['nom'] ?></>
                      <td><?= $a['adresse'] ?></td>
                     <td><?= $a['image'] ?></td>
                      <td><?= $a['email'] ?></td>
                      <td><?= $a['numphone'] ?></td>
                      <td><?= $a['datecreation'] ?></td>
                      <td><img class="profil" src="avatar/<?php echo $a['avatar'];?>" /></td>
                       
                        <td> 
                            <a class="text text-white" href="update.html.php?id=<?=$a['id']?>">
                            <i class="lar la-edit" style="color: #015093; font-size: 15px;"></i> </a>
                            <a onclick ="return confirm('Etes-vous sur de vouloir supprimer cette entree?');"
                            
                                class="text text-white" href="delete.php?id=<?=$a['id']?>">
                                <i class="lar la-trash-alt" style="color: #015093; font-size: 15px;"></i> </i></a>

                                <a class="text text-white" href="update.html.php?id=<?=$a['id']?>">
                            <i class="las la-info-circle" style="color: #015093; font-size: 15px;"></i> </a>
                
               
           
                        </td>
                        
                        </tr>
            
                   <?php } ?>
                   </tr>
                   <?php } 
                           ?>
                           </tbody>
                          
                
               
                   </table>
                   <?php
                   $result->closeCursor();   
  }
                       
           /*  while($ligne = $result->fetch(PDO::FETCH_ASSOC)){?>
                <tr>
                <?php
                foreach($ligne as $key => $valeur){?>
                     <td> <img src="avatar/<?php echo $ligne['avatar'];?>" width="100px" height="100px"/></td> 
                     <?php } ?>
                     <td><?=$valeur?></td>   
                     <?php } ?>
                    
                     <!-- <td> <img src="avatar/<?php echo $ligne['avatar'];?>" width="100px" height="100px"/> </td> -->
                      
                     
                
	   <?php } ?>
                <td><button type="button" class="btn btn-primary update" name="edite"><a class="text text-white" href="update.html.php?id=<?=$ligne['id']?>">Edite</a></button></td> 
                <td><button onclick ="return confirm('Etes-vous sur de vouloir supprimer cette entree?');" type="button" class="btn btn-danger delete "><a class="text text-white" href="delete.php?id=<?=$ligne['id']?>">Supprimer</a></button></td>   
	   </tr>
       <?php }  */
           


                /* echo'<tr>';
                foreach($ligne as $valeur){
                    echo"<td>$valeur</td>";
                }            
                echo '<td><button type="button" class="btn btn-primary"><a href="update.php?<td>$valeur</td>">Edite</a></button></td>';
                echo '<td><button type="button" class="btn btn-danger">Supprimer</button></td>';
                echo"</tr>";
 */
        
           
    
?>


</div>


</body>


</html>