<!DOCTYPE html>

<head>
    <title>退出完了</title>
    <link rel="stylesheet" href="../view/main.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" media="(min-width: 640px)" href="../view/main.css">
    <link rel="stylesheet" media="(max-width: 640px)" href="../view/main.css">
</head>

<body>
    <?php
    require_once '../setup/Connect.php';
    session_start();
    $dbh = connect();
    $sql = 'DELETE FROM room_in WHERE code = :code';
    $stmt = $dbh->prepare($sql);
    $code = array(':code'=>$_SESSION['code']);
    $stmt->execute($code);

    $dbh = null;
    print '退出完了';
    ?>
</body>