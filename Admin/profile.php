<?php
session_start();
include_once '../dbconfig/connection.php';
include_once '../partials/current_user.php';
include_once '../partials/find_by_username.php';
include_once 'validation/randomFileCreate.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = current_user();
    $profile = $_FILES['profile'];
    $target_file = '';
    $user = find_by_username($username);

    var_dump($profile);

    if (!empty($profile['name'])) {
        $target_file = 'uploads/images/' . $username . '/' . $profile['name'];
        var_dump($target_file);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (getimagesize($profile['tmp_name']) !== false) {
            if ($profile['size'] <= 10000000) {
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

    if (empty($errors)) {
        if (!is_dir('uploads/images')) {
            mkdir('uploads/images');
        }
        $oldPath = $user['profile'];
        unlink($oldPath);
        rmdir(dirname($oldPath));

        mkdir(dirname($target_file));
        move_uploaded_file($profile['tmp_name'], $target_file);

        $sql = 'UPDATE user SET profile = :profile WHERE email = :username';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':profile' => $target_file, ':username' => $username]);
        echo "success";
    } else {
        var_dump($errors);
    }
}
