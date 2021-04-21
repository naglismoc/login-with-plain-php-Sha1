<?php
include("Dbh.php");

class Author{

public static function findById($id)
{
    $dbh = new Dbh();
    $sql ="SELECT * from `authors` where `id` = '".$id."' ";
    $result = $dbh->connect()->query($sql);
    $author;
    while ($row = $result->fetch_assoc()) {
        $author = new Author();
        $author->id = $row['id'];
        $author->name = $row['name'];
        $author->surname = $row['surname'];

    }
    return $author;
}

public static function findAll()
{
   $dbh = new Dbh();
   $sql ="SELECT * from `authors`";
   $result = $dbh->connect()->query($sql);
    $authors;
   while ($row = $result->fetch_assoc()) {
    $author = new Author();
    $author->id = $row['id'];
    $author->name = $row['name'];
    $author->surname = $row['surname'];
    $authors[] = $author;

   }
    return $authors;

}



    public function save()
    {
        $dbh = new Dbh();
        if($this->id == 0){
            $sql = "INSERT INTO `authors` (`id`, `name`, `surname`) 
            VALUES (NULL, '".$this->name."', '".$this->surname."');";
        }else{
            $sql = "UPDATE `authors` 
            SET `name` = '".$this->name."', `surname` = '".$this->surname."' 
            WHERE `authors`.`id` = '".$this->id."';";
        }
        $dbh->connect()->query($sql);
    }
}






?>