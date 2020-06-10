<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print 'ログインされていません。<br>';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}
else
{
    print 'ようこそ,';
    print $_SESSION['staff_name'];
    print 'さん。';
    print '<br>';
    print '<br>';
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>スタッフ一覧</title>
</head>
<body>

<?php

try{
    $staff_code=$_POST['code'];

    $dsn = 'mysql:dbname=xs070332_test;host=mysql10011.xserver.jp;charset=utf8';
    $user = 'xs070332_wp1';
    $password = 'u5zkgczl0d';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'DELETE FROM mst_staff WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_code;
    $stmt->execute($data);

    $dbh = null;

}
catch (Exception $e){
    print'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>
削除しました。<br>
<a href="staff_list.php">戻る</a>

</body>
</html>

