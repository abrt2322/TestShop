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

        $dsn = 'mysql:dbname=xs070332_test;host=mysql10011.xserver.jp;charset=utf8';
        $user = 'xs070332_wp1';
        $password = 'u5zkgczl0d';
        $dbh = new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT code,name FROM mst_staff WHERE 1';
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        $dbh = null;

        print 'スタッフ一覧<br> <br>';

        print '<form method="post" action="staff_branch.php">';
        while(true){
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if($rec==false){
                break;
            }
            print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
            print  $rec['name'];
            print '<br>';
        }

        print '<br>';
        print '<input type="submit" name="disp" value="参照">';
        print '<input type="submit" name="add" value="追加">';
        print '<input type="submit" name="edit" value="修正">';
        print '<input type="submit" name="delete" value="削除">';
        print '</form>';
    }
    catch (Exception $e){
        print'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    ?>
    <br>
    <a href="../staff_login/staff_top.php">トップメニューへ</a><br>
</body>
</html>

