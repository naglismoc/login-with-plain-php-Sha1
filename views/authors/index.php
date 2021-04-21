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

if($_SERVER['REQUEST_METHOD']=='POST'){

  if(isset($_POST['id'])){
    if(destroy($_POST)){
      header("location:".views."/authors");
    }
    $message = "Autoriaus trinti negalima nes jis turi knygų";
  }
}
if(isset($_POST['idAll'])){
  destroyAll($_POST);
    header("location:".views."/authors");
}


$authors = findAll();







?>


<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Autoriai</h2>
<?php
if(isset($message)){
  echo '<h1 style="color:red";>'.$message.'</h1>';
}
?>
<table>
  <tr>
    <th>Name</th>
    <th>Surname</th>
    <th>books</th>
    <th>edit</th>
    <th>delete</th>
    <th>delete all</th>
  </tr>
  <?php 
  foreach ($authors as  $author) {  
      echo "
      <tr>
      <td>".$author->name."</td>
      <td>".$author->surname."</td>
      <td>".$author->surname."</td>";
      echo '<td><a href="'.views.'/authors/edit.php?id='.$author->id.'">edit</a></td>
      <td><form action="#" method="post">
      <input type="hidden" name="id" value="'.$author->id.'">
      <button type="submit">trinti</button>
      </form></td>';

      echo '<td>
              <form action="#" method="post">
                <input type="hidden" name="idAll" value="'.$author->id.'">
                <button type="submit">trinti viską</button>
              </form>
            </td>';
      
        echo'</tr>';
       
 
}

?>
</table>

</body>
</html>