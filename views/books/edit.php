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

include(Controllers."/BookController.php");
    $book = findById($_GET['id']);
    $authors = authors();

if($_SERVER['REQUEST_METHOD']=='POST'){
    store($_POST);
   }








?>

<form action="" method="POST">
  <label for="title"> title: </label>
  <input type="text" id="title" name="title" value="<?=$book->title?>"><br><br>
  <label for="pages">Last name: </label>
  <input type="hidden" name="id" value="<?=$book->id?>">
  <input type="text" id="pages" name="pages" value="<?=$book->pages?>"><br><br>
  <select name="author_id" id="author">
    <?php
    foreach ($authors as $author) {
        $selected = "";
        if($author->id == $book->author_id){
            $selected = "selected";
        }
        echo '<option value="'.$author->id.'" '.$selected.'>'.$author->surname.' '.$author->name.'</option>';
    }


    ?>
</select>
  <input type="submit" value="Save">
</form> 
</body>
</html>