<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ロロろ</title>
</head>
<body>
    <?php
        require_once ('../common/common.php');

        $post=sanitize($_POST);

        $onamae=$post['onamae'];
        $email=$post['email'];
        $postal1=$post['postal1'];
        $postal2=$post['postal2'];
        $adress=$post['adress'];
        $tel=$post['tel'];

        $okflg =true;
        if($onamae==""){
            print 'お名前が入力されていません<br><br>';
            $okflg = false;
        }
        else{
            print 'お名前<br>';
            print $onamae;
            print '<br><br>';
        }

        if(preg_match('/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/',$email)==0){
            print 'メールアドレスを正確に入力してください<br><br>';
            $okflg = false;
        }
        else{
            print 'メールアドレス<br>';
            print $email;
            print '<br><br>';
        }


        if(preg_match('/\A[0-9]+\z/',$postal1)==0){
            print '郵便番号は半角で入力してください。<br><br>';
            $okflg = false;
        }


        if(preg_match('/\A[0-9]+\z/',$postal2)==0){
            print '郵便番号は半角で入力してください。<br><br>';
            $okflg = false;
        }
        else{
            print '郵便番号<br>';
            print $postal1;
            print '-';
            print $postal2;
            print '<br><br>';
        }


        if($adress==''){
            print '住所が入力されていません。<br><br>';
            $okflg = false;
        }
        else{
            print '住所<br>';
            print $adress;
            print '<br><br>';
        }


        if(preg_match('/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/',$tel)==0){
            print '電話番号を正確に入力してください<br><br>';
            $okflg = false;
        }
        else{
            print '電話番号<br>';
            print $tel;
            print '<br><br>';
        }
        if($okflg==true) {
            print '<form method="post" action="shop_form_done.php">';
            print '<input type="hidden" name="onamae" value="' . $onamae . '">';
            print '<input type="hidden" name="email" value="' . $email . '">';
            print '<input type="hidden" name="postal1" value="' . $postal1 . '">';
            print '<input type="hidden" name="postal2" value="' . $postal2 . '">';
            print '<input type="hidden" name="adress" value="' . $adress . '">';
            print '<input type="hidden" name="tel" value="' . $tel . '">';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<input type="submit" value="OK"><br>';
            print '</form>';
        }
        else{
            print '<form>';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '</form>';
        }
    ?>

</body>
</html>