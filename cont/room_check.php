<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../view/main.css">
</head>

<body>
    部室にいる人<br>
    <?php
    require_once '../setup/Connect.php';
    try {
        $dbh = connect();
        $sql = 'SELECT id,user FROM room_in';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $data = array();
        $count = $stmt->rowCount();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
    } catch (PDOException $e) {
        print '問題が発生しました。<br> 管理者に連絡します。';
    }
    ?>
    <table border="1" align="center">
        <tr>
            <th>名前</th>
        </tr>
        <?php foreach ($data as $row) : ?>
            <tr>
                <td><?php echo $row['user']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>