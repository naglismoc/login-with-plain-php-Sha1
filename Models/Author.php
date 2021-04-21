<?php
include("Dbh.php");

class Author{

public static function findById($id)
{
    $dbh = new Dbh();
    $sql ="SELECT * from `authors` where `id` = '".$id."' ";
    $result = $dbh->connect()->query($sql);
    $author = new Author();
    $author->id = 0;
    $author->name = "";
    $author->surname = "";
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
   $sql ="SELECT * from `authors` ORDER BY `surname`";
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

public static function findAllAsc()
{
   $dbh = new Dbh();
   $sql ="SELECT * from `authors` ORDER BY `surname` ";
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
    public static function delete($request)
    {

        $dbh = new Dbh();
        $sql ="SELECT * from `books` where `author_id` = '".$request['id']."' ";
        $result = $dbh->connect()->query($sql);
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            $count++;
        }

        if($count == 0){
            $sql = "DELETE FROM `authors` WHERE `authors`.`id` = ".$request['id'];
            $dbh->connect()->query($sql);
            return true;
        }
        return false;
    }


    public static function deleteAll($request)
    {
      
        $dbh = new Dbh();
        $sql ="DELETE  from `books` where `author_id` = '".$request['idAll']."' ";
        $result = $dbh->connect()->query($sql);
        if($count == 0){
            $sql = "DELETE FROM `authors` WHERE `authors`.`id` = ".$request['idAll'];
            $dbh->connect()->query($sql);
        }
    
    }
}






?>