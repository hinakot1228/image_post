<?php
    require_once('dbconnect.php');

    $stmt = $dbh->prepare('SELECT * FROM users');
    $stmt->execute();
    $users = $stmt->fetchAll();

    // var_dump($users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>画像投稿アプリ</title>
</head>
<body>
    <form action="store.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" id="">
        <input type="file" name="image" id="">
        <input type="submit" value="送信">

        <h1>ユーザー一覧</h1>

        <div>
        <?php foreach ($users as $user): ?>
            <div>
                <h2><?= $user['name']; ?></h2>
                <img class="user-img" src="<?= $user['image_at']; ?>" alt="">
            </div>
        <?php endforeach; ?>
        </div>
    </form>
</body>
</html>