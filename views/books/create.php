<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knygos</title>
</head>
<body>
<?php include("../header.php");
 
include(Controllers."/BookController.php");
$authors = authors();

if($_SERVER['REQUEST_METHOD']=='POST'){
    store($_POST);
   }








?>

<form action="" method="POST">
  <label for="title">Knygos pavadinimas: </label>
  <input type="text" id="title" name="title"><br><br>
  <label for="pages">Puslapiai: </label>
  <input type="text" id="pages" name="pages"><br><br>
  
<select name="author_id" id="author">
<?php
foreach ($authors as $author) {
    echo '<option value="'.$author->id.'">'.$author->name.' '.$author->surname.'</option>';
}
?>
</select><br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>