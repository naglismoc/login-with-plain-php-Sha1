<?php
include(Models."/Book.php");

function authors()
{
  return  Book::authors();
}

function findAll(){
    return Book::findAll();
}
function findById($id)
{
    return Book::findById($id);
}

function store($request)
{
    
    $book = new Book();
    $book->title = $request['title'];
    $book->pages = $request['pages'];
    $book->author_id = $request['author_id'];
    $book->id = isset($_POST['id']) ? $_POST['id'] : 0;
    $book->save();

    header("location:./index.php");
}
function author($id)
{
    return Book::author($id);
}





?>