<?php

include(Models."/User.php");


 function login($request)
{
 
    $Dbh = new Dbh();
    $sql = "SELECT * from `users` where email ='".$request['email']."'";
    $result =  $Dbh->connect()->query($sql);
    $user = new User();
    while ($row = $result->fetch_assoc()) {
        $user->setId($row['id']);
        $user->setEmail($row['email']);
        $user->setPassword($row['password']);
        
    }
    $_SESSION['logged'] = 0;
    $email = $_POST['email'];
    if($user->getPassword() == sha1($request['password'])){
        $_SESSION['user'] = 1;
        $_SESSION['logged'] = 1;
       
    }
}
function test()
{
    echo "test";
}
    function logout(){
        $_SESSION['user'] = 0;
    }

    function register($request){
        if($request['password'] == $request['password2']){
            
            $user = new User();
            $user->setEmail($request['email']);
            $user->setPassword(sha1($request['password']));
            $user->save();
            $_SESSION['user'] = 1;
        }
    }








?>