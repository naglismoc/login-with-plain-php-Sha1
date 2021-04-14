<div class="header">
<div class="menu">
<a href="./index.php">home</a>
<?php
if(!isset($_SESSION['user'])){
    session_start();
}

if($_SESSION['user']==1){?>
    <a href="./index.php?logout=1">logout</a>
    
    <?php }
else{?>
    <a href="./login.php">login</a>
    <a href="./register.php">register</a>
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