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


if($_SERVER['REQUEST_METHOD']=='POST'){

 
    destroy($_POST);
    header("location:".views."/books");

}



$books = findAll();







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

<h2>Knygos</h2>

<table>
  <tr>
    <th>Title</th>
    <th>Pages</th>
    <th>author_id</th>
    <th>edit</th>
    <th>delete</th>
  </tr>
  <?php 
  foreach ($books as  $book) {  
    
    $author = author($book->author_id);
      echo "
      <tr>
      <td>".$book->title."</td>
      <td>".$book->pages."</td>
      <td>".$author->name." ".$author->surname."</td>";
      echo '<td><a href="'.views.'/books/edit.php?id='.$book->id.'">edit</a></td>';
      echo '<td>
      <form action="#" method="post">
        <input type="hidden" name="id" value="'.$book->id.'">
        <button type="submit">trinti knygą</button>
      </form>
    </td>';
      
      echo  '</tr>';
 
}

?>
</table>

</body>
</html>