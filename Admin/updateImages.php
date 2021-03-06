<?php
include_once '../dbconfig/connection.php';
include_once 'validation/randomFileCreate.php';

$id = '';
$imgId = '';
$title = '';
$active = '';
if (isset($_GET['name'])) {
    $title = $_GET['name'];
}
if (isset($_GET['img'])) {
    $imgId = $_GET['img'];
}
if (isset($_GET['active'])) {
    $active = $_GET['active'];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
echo $imgId . '<br/>';
$target_file = '';
$imageFileType = '';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES['image']['name'])) {
        $target_file = 'uploads/images/' . $title . randomString(8) . '/' . $_FILES['image']['name'];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (getimagesize($_FILES['image']['tmp_name']) !== false) {
            if ($_FILES['image']['size'] <= 2000000) {
                if (
                    $imageFileType === 'jpg' || $imageFileType === 'png' || $imageFileType === "jpeg"
                    || $imageFileType === "gif"
                ) {
                } else {
                    array_push($errors, 'Image file extension name must be in [png,jpg,jpeg,gif]');
                }
            } else {
                array_push($errors, 'image file size is to large');
            }
        } else {
            array_push($errors, 'file is not an image');
        }
    } else {
        array_push($errors, 'photo is not choosen');
    }
}

if (empty($errors)) {

    try {
        $stmt = $pdo->prepare("SELECT * FROM image WHERE id = :id");
        $stmt->execute([':id' => $imgId]);
        $image = $stmt->fetch();
        if (!is_dir('uploads/images/')) {
            mkdir('uploads/images/');
        }
        $filpath = $image['path'];
        unlink($filpath);
        rmdir(dirname($filpath));
        mkdir(dirname($target_file));
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        $stmt = $pdo->prepare("UPDATE image SET path = :path WHERE id = :id");
        $stmt->bindParam(':path', $target_file);
        echo '<br/>' . $image['id'];
        $stmt->bindParam(':id', $image['id']);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'PDO exception ' . $e->getMessage();
    }
    header("Location: manageImages.php?id=$id&name=$title&active=$active");
}
