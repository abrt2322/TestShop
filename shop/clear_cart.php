<?php
session_start();
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
    setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OGRI|ログイン画面</title>
</head>
<body>
カートを空にしました<br>

</body>
</html>
