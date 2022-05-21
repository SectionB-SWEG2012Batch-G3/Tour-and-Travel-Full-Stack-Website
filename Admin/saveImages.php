<?php
include_once '../dbconfig/connection.php';
include_once 'validation/randomFileCreate.php';
$image_names =  [];
$errors = [];
$tmp_names = [];
$id = '';
$title = '';
$active = '';
if (isset($_GET['name'])) {
    $title = $_GET['name'];
}
if (isset($_GET['active'])) {
    $active = $_GET['active'];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
echo $title;
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
            echo '<br/>' . $title . '<br/>';
            $isCreated = mkdir(dirname($target_file));
            // echo '<br/>'.$isCreated.'<br/>';
            move_uploaded_file($tmp_names[$i], $target_file);
            $query = $pdo->prepare($sql2);
            $query->bindParam(':path', $target_file);
            $query->bindParam(':desc', $title);
            $query->bindParam(':for', $id);
            $query->execute();
        }

        header("Location: manageImages.php?id=$id&name=$title&active=$active");
    } else {
        var_dump($errors);
    }
}
include_once 'includes/header.php';
?>

<article>
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

</article>
<?php
include_once 'includes/footer.php';
?>