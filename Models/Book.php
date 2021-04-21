<?php
include("Author.php");

class Book{

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
   $sql ="SELECT * from `books`";
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
            $sql = "UPDATE `authors` 
            SET `name` = '".$this->name."', `surname` = '".$this->surname."' 
            WHERE `authors`.`id` = '".$this->id."';";
        }
        $dbh->connect()->query($sql);
    }

     function authors()
    {
       return Author::findAll();
    }
    function author($id)
    {
       return Author::findById($id);
    }
}






?>