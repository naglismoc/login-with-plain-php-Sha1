
<?php
session_start();
if(!isset($_SESSION['user'])){
    $_SESSION['user'] = 0;
}
if($_SESSION['user'] == 1){
    header("location:./index.php");
 }
 $logged = -1;
include("./User.php");
if($_SERVER['REQUEST_METHOD']=='POST'){

    $Dbh = new Dbh();
    $sql = "SELECT * from `users` where email ='".$_POST['email']."'";
    $result =  $Dbh->connect()->query($sql);
    $user = new User();
    // print_r($result); 
    while ($row = $result->fetch_assoc()) {
        $user->setId($row['id']);
        $user->setEmail($row['email']);
        $user->setPassword($row['password']);
        
    }
    $logged = 0;
    if($user->getPassword() == sha1($_POST['password'])){
        $_SESSION['user'] = 1;
        $logged = 1;
       
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginas</title>
</head>
<body>
<?php include("./header.php");
if($logged == -1){
    echo '<h1 style="color:blue;">Prašome prisijungti.</h1>';
}
if($logged == 0){
    echo '<h1 style="color:red;">Neteisingas slaptažodis ar pašto adresas!</h1>';
}
if($logged == 1){
    echo '<h1 style="color:green;">Sveikinu, prisijungėte!</h1>';
}
?>
<form action="" method="POST">
  <label for="email">pastas:</label><br>
  <input type="text" id="email" name="email" placeholder="pastas" ><br>
  <label for="password">slaptazodis:</label><br>
  <input type="password" id="password" name="password"  placeholder="slaptazodis"><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>