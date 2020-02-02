<!DOCTYPE html>

<head>
    <title>入室完了</title>
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
    $sql = 'INSERT INTO room_in (code,user) VALUES (?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $_SESSION['code'];
    $data[] = $_SESSION['user'];
    $stmt->execute($data);

    $dbh = null;
    print '入室完了';
    ?>
</body>