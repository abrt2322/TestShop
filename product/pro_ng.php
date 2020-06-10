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
    商品が選択されていません。<br>
    <a href="pro_list.php">戻る</a>
</body>
</html>


