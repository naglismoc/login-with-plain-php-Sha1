<?php
include(Models."/Author.php");

function authors()
{
    return findAll();
}

function findAll(){
    return Author::findAll();
}

function findAllAsc(){
    return Author::findAllAsc();
}
function findById($id)
{
    return Author::findById($id);
}

function store($request)
{
    
    $author = new Author();
    $author->name = $request['name'];
    $author->surname = $request['surname'];
    $author->id = isset($_POST['id']) ? $_POST['id'] : 0;
    $author->save();

    header("location:./index.php");
}

function destroy($request)
{
  return Author::delete($request);
}
function destroyAll($request)
{
  Author::deleteAll($request);
}



?>