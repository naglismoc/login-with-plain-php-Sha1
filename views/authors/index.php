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

<h2>HTML Table</h2>

<table>
  <tr>
    <th>Name</th>
    <th>Surname</th>
    <th>books</th>
    <th>edit</th>
    <th>delete</th>
  </tr>
  <?php 
  foreach ($authors as  $author) {  
      echo "
      <tr>
      <td>".$author->name."</td>
      <td>".$author->surname."</td>
      <td>".$author->surname."</td>";
      echo '<td><a href="'.views.'/authors/edit.php?id='.$author->id.'">edit</a></td>
      <td>'.$author->surname.'</td>
      
        </tr>';
 
}

?>
</table>

</body>
</html>