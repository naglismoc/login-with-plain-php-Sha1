<?php
include("Author.php");

class Book{

public static function findById($id)
{
    $dbh = new Dbh();
    $sql ="SELECT * from `books` where `id` = '".$id."' ";
    $result = $dbh->connect()->query($sql);
    $book;
    while ($row = $result->fetch_assoc()) {
        $book = new Book();
        $book->id = $row['id'];
        $book->title = $row['title'];
        $book->pages = $row['pages'];
        $book->author_id = $row['author_id'];

    }
    return $book;
}

public static function findAll()
{
   $dbh = new Dbh();
   $sql ="SELECT * from `books` ORDER BY `title`";
   $result = $dbh->connect()->query($sql);
    $books;
   while ($row = $result->fetch_assoc()) {
    $book = new Book();
    $book->id = $row['id'];
    $book->title = $row['title'];
    $book->pages = $row['pages'];
    $book->author_id = $row['author_id'];
    $books[] = $book;

   }
    return $books;

}



    public function save()
    {
        $dbh = new Dbh();
        if($this->id == 0){
            $sql = "INSERT INTO `books` (`id`, `title`, `pages`, `author_id`) 
            VALUES (NULL, '".$this->title."', '".$this->pages."', '".$this->author_id."');";
        }else{
            $sql = "UPDATE `books` 
            SET `id` = '".$this->id."',
             `title` = '".$this->title."',
              `pages` = '".$this->pages."',
               `author_id` = '".$this->author_id."' 
            WHERE `books`.`id` = '".$this->id."';";
        }
        $dbh->connect()->query($sql);
    }

     function authors()
    {
       return Author::findAllAsc();
    }
    function author($id)
    {
       return Author::findById($id);
    }

    public static function delete($request)
    {
        $dbh = new Dbh();
        $sql = "DELETE FROM `books` WHERE `books`.`id` = ".$request['id'];
        $dbh->connect()->query($sql);
    }
}






?>