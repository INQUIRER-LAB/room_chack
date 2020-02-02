<!DOCTYPE html>

<head>
    <title>チェックイン</title>
    <link rel="stylesheet" href="../view/main.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" media="(min-width: 640px)" href="../view/main.css">
    <link rel="stylesheet" media="(max-width: 640px)" href="../view/main.css">
</head>

<body>
    <?php
    require_once '../setup/Connect.php';
    $dbh = connect();
    $sql = 'SELECT user FROM member WHERE code = ?';
    $stmt = $dbh->prepare($sql);
    session_start();
    $data[] = $_SESSION['code'];
    $stmt->execute($data);
    $dbh = null;
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($rec['user']);
    $_SESSION['user'] = $rec['user'];
    ?>
    <form action="room_in_register.php">
        <input type="submit" value="入室">
    </form>
    <form action="room_out_register.php">
        <input type="submit" value="退室">
    </form>
</body>