<?php
    require_once('dbconnect.php');

    // var_dump($_FILES['image']['error']);die;

    // データの受け取り
    $name = $_POST['name'];
    $file = $_FILES['image']['tmp_name'];
            // name属性、tmp_nameにアップロードしたファイル画一時保存されている
    
    // 画像がアップロードされている場合
    if ($_FILES['image']['error'] !== 4) {
        $imgPath = 'images/' . $_FILES['image']['name'];
        move_uploaded_file($file, $imgPath);
    }
    // 画像がアップロードされていない場合
    else {
        $imgPath = 'images/default.png';
    }

    // DBへの保存
    $stmt = $dbh->prepare('INSERT INTO users (name, image_at) VALUES (?, ?)');
    $stmt->execute([$name, $imgPath]);

    // リダイレクト処理
    header('location:index.php');
    exit;
?> 