<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                
<?php

require "data.php";
$req = "SELECT *FROM contact ORDER BY id ASC ";
$result = $pdo->query($req);


while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
    
        var_dump(count($ligne)-1);
        for ($i=0; $i <= count($ligne)-1; $i++) { 
            foreach ($ligne as $key => $value) {
        // $arr[3] will be updated with each value from $arr...
       /*  if ($ligne[$key] == $ligne['avatar']) {
            print_r($ligne['avatar']);
        } */
        print_r($ligne[$key]);
    }
}
/* echo '<img width ="100px" height = "100px" src="avatar/'.$ligne['avatar'].'"> ';
echo' <br>';
 */
}
?>

    
</body>
</html>

