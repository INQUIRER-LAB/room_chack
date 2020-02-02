<?php
require_once '../setup/Connect.php';
require_once '../setup/Encode.php';
try {
    $dbh = connect();

    $member_code = $_POST['code'];
    $member_pass = $_POST['pass'];

    $member_code = e($member_code);
    $member_pass = e($member_pass);

    $member_pass = hash('sha256', $member_pass);
    $member_pass = md5($member_pass);

    $sql = 'SELECT id FROM member WHERE code=? AND pass=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $member_code;
    $data[] = $member_pass;
    $stmt->execute($data);

    $dbh = null;
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rec == false) {
        header('Location: ../view/room_check_index.html');
        exit();
    } else {
        header('Location: room_check.php');
        exit();
    }
} catch (Exception $e) {
    print '問題が発生しました。<br> 管理者に連絡します。';
    exit();
}
