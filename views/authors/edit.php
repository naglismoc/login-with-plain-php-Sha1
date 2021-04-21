<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoriai</title>
</head>
<body>
<?php include("../header.php");

include(Controllers."/AuthorController.php");
    $author = findById($_GET['id']);

if($_SERVER['REQUEST_METHOD']=='POST'){
    store($_POST);
   }








?>

<form action="" method="POST">
  <label for="name">First name: </label>
  <input type="text" id="name" name="name" value="<?=$author->name?>"><br><br>
  <label for="surname">Last name: </label>
  <input type="hidden" name="id" value="<?=$author->id?>">
  <input type="text" id="surname" name="surname" value="<?=$author->surname?>"><br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>