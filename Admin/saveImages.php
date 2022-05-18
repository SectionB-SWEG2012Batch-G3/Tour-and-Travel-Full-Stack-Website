<?php
include_once '../dbconfig/connection.php';
include_once 'validation/randomFileCreate.php';
$image_names =  [];
$errors = [];
$tmp_names = [];
$id = '';
$title = '';
if (isset($_GET['name'])) {
    $title = $_GET['name'];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_names =  [];
    $tmp_names = [];
    $files = $_FILES['image'];

    if (!empty($files['name'])) {
        $image_names = $files['name'];
        $tmp_names = $files['tmp_name'];
        $sizes = $files['size'];
        foreach ($image_names as $i => $name) {
            $target_file = 'images/' . randomString(8) . '/' . $name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (
                $imageFileType === 'jpg' || $imageFileType === 'png' || $imageFileType === "jpeg"
                || $imageFileType === "gif"
            ) {
            } else {
                array_push($errors, 'Image file extension name must be in [png,jpg,jpeg,gif]');
            }
        }
        foreach ($sizes as $i => $size) {
            if ($size > 20000000) {
                array_push($errors, "image $i has size larger than 20MB");
            }
        }
    } else {
        array_push($errors, 'Image is not choosen');
    }

    if (empty($errors)) {
        $sql2 = 'INSERT INTO image(path,description,imageFor) VALUES(:path,:desc,:for)';
        if (!is_dir('uploads/images/')) {
            mkdir('uploads/images/');
        }
        foreach ($image_names as $i => $name) {
            $target_file = 'uploads/images/' . $title . randomString(8) . '/' . $name;
            // echo '<br/>'.$target_file.'<br/>';
            $isCreated = mkdir(dirname($target_file));
            // echo '<br/>'.$isCreated.'<br/>';
            move_uploaded_file($tmp_names[$i], $target_file);
            $query = $pdo->prepare($sql2);
            $query->bindParam(':path', $target_file);
            $query->bindParam(':desc', $title);
            $query->bindParam(':for', $id);
            $query->execute();
        }
        header("Location: manageHotelImages.php?active=hotel&id=$id&name=$title");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Add Image Error</title>
</head>

<body>
    <div class="container" style="margin-top: 100px;">
        <table class="table-light">
            <?php if (!empty($errors)) : ?>
                <?php foreach ($errors as $i => $error) : ?>
                    <tr>
                        <td class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>

</body>

</html>