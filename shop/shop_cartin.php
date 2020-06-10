<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login'])==false)
    {
        print 'ようこそゲスト様';
        print '<a href="member_login.html">会員ログイン</a><br>';
        print '<br>';
    }

    else
    {
        print 'ようこそ,';
        print $_SESSION['member_name'];
        print '様';
        print '<a href="member_logout.php">ログアウト</a><br>';
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
                $pro_code=$_GET['procode'];

                if(isset($_SESSION['cart'])==true){
                    $kazu = $_SESSION['kazu'];
                    $cart = $_SESSION['cart'];
                    if(in_array($pro_code,$cart)==true){
                        print 'その商品は既にカートに入っています。<br>';
                        print '<br><a href="shop_list.php">商品一覧へ戻る</a>';
                        exit();
                    }
                }

                $cart[] = $pro_code;
                $kazu[] = 1;

                $_SESSION['cart'] = $cart;
                $_SESSION['kazu'] = $kazu;
            }

            catch (Exception $e){
                print'ただいま障害により大変ご迷惑をおかけしております。';
                exit();
            }


        ?>
        カートに追加しました。<br>
        <br>
        <a href="shop_list.php">商品一覧に戻る</a>


    </body>
</html>



