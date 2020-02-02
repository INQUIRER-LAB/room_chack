<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>メンバ登録</title>
    <link rel="stylesheet" href="../view/main.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" media="(min-width: 640px)" href="../view/main.css">
    <link rel="stylesheet" media="(max-width: 640px)" href="../view/main.css">
</head>

<body>
    <?php
    require_once '../setup/Connect.php';
    require_once '../setup/Encode.php';
    $reg_code = $_POST['code'];
    $reg_pass = $_POST['pass'];
    $reg_pass2 = $_POST['pass2'];
    $reg_name = $_POST['user'];

    if ($reg_code == '') {
        print '登録者コードがありません<br>';
    }

    if ($reg_pass == '') {
        print 'パスワードを入力してください<br>';
    }

    if ($reg_pass != $reg_pass2) {
        print 'パスワードが一致しません<br>';
    }

    if ($reg_name == '') {
        print '名前が入力されていません';
    }

    if ($reg_code == '' || $reg_pass == '' || $reg_pass != $reg_pass2) {
        print '<form>';
        print '<input type="button" onclick="history.back()" value="戻る">';
        print '</form>';
    } else {
        $reg_code = e($reg_code);
        $reg_pass = e($reg_pass);
        $reg_name = e($reg_name);
        $md5_reg_pass = hash('sha256', $reg_pass);
        $reg_pass = md5($md5_reg_pass);

        try {
            $dbh = connect();
            $sql = 'INSERT INTO member (code,pass,user) VALUES (?,?,?)';
            $stmt = $dbh->prepare($sql);
            $data[] = $reg_code;
            $data[] = $reg_pass;
            $data[] = $reg_name;
            $stmt->execute($data);

            $dbh = null;
            print '追加されました';
        } catch (Exception $e) {
            print '問題が発生しました。<br> 管理者に連絡します。';
            exit();
        }
    }
    ?>
</body>

</html>