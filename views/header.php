<?php
include($_SERVER['DOCUMENT_ROOT']."/loginas/views/bootstrap.php");
?>
<div class="header">
<div class="menu">
<a href="<?=views?>">home</a> ||

<a href="<?=views?>/books">books</a>
<a href="<?=views?>/books/create.php">new book</a> ||
<a href="<?=views?>/authors">authors</a>
<a href="<?=views?>/authors/create.php">new author</a> ||
<?php
if(!isset($_SESSION['user'])){
  
    $_SESSION['user'] = 0;
}

if($_SESSION['user']==1){?>
    <a href="<?=views?>/index.php?logout=1">logout</a>
    
    <?php }
else{?>
    <a href="<?=views?>/auth/login.php">login</a>
    <a href="<?=views?>/auth/register.php">register</a>
<?php } 
 ?>

</div>
</div>

<style>
.header{
    height:80px;
    background-color:#75eba8;
    width:100%;
}
.menu{
    margin:20px;
    float:right;
}
</style>