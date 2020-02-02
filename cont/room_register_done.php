<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../view/main.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" media="(min-width: 640px)" href="../view/main.css">
	<link rel="stylesheet" media="(max-width: 640px)" href="../view/main.css">
	<title> メンバ-登録</title>
</head>

<body>
	<?php
	require_once '../setup/Connect.php';
	try {
		$reg_code = $_POST['code'];
		$reg_pass = $_POST['pass'];
		$reg_name = $_POST['user'];
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
	?>
	<form method="POST" action="room_in_index.html">
		<input type="submit" value="ログイン">
	</form>
</body>

</html>