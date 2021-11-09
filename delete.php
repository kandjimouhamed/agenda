
<?php  require 'header.php'; 
if (isset($_GET['id'])) {
    $id =$_GET['id'];

$req = "DELETE FROM contact WHERE id = $id ";
$result = $pdo->query($req);

header('location: affichage.php?message=ok&message1=Mise a jour effectuee avec succes');
  
}

?>

           