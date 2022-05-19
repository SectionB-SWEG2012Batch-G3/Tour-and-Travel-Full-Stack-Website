<?php
include_once 'placePartials/DBConfig.php';

$placeName = '';
$desc = '';
$mapLink = '';
$errors = [];

$image_names =  [];
$tmp_names = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once 'placePartials/form_data.php';
    $files = $_FILES['image'];
    // echo '<br/>'.$placeName.'<br/>'.$desc.'<br/>'.$mapLink.'<br/>';
    // var_dump($files);
    // echo '<br/>';
    if (!empty($files)) {
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
        include_once 'placePartials/getRegion.php';
        // echo '<br/>'.$region_name[0].'<br/>';
        $sql = "INSERT INTO places_to_visit(title,description,mapLink,region_id,regionName) VALUES(:name,:desc,:link,:region,:regionName)";

        include_once 'placePartials/saveToDB.php';
        $stmt->bindParam(':region', $id);
        $stmt->bindParam(':regionName', $region_name[0]);
        $res = $stmt->execute();

        if (!is_dir('uploads/images/')) {
            mkdir('uploads/images/');
        }

        $lastId = $pdo->lastInsertId();
        $sql2 = 'INSERT INTO image(path,description,imageFor) VALUES(:path,:desc,:for)';

        foreach ($image_names as $i => $name) {
            $target_file = 'uploads/images/' . $placeName . randomString(8) . '/' . $name;
            // echo '<br/>'.$target_file.'<br/>';
            $isCreated = mkdir(dirname($target_file));
            // echo '<br/>'.$isCreated.'<br/>';
            move_uploaded_file($tmp_names[$i], $target_file);
            $query = $pdo->prepare($sql2);
            $query->bindParam(':path', $target_file);
            $query->bindParam(':desc', $placeName);
            $query->bindParam(':for', $lastId);
            $query->execute();
        }
        // echo '<br/>'.$pdo->lastInsertId().'<br/>';

        header('Location: destinations.php?active=destination');
    }
}
include_once 'includes/header.php';
?>
<li>
    <a class="active" href="#">Destinations </a>

</li>
<li><i class='bx bx-chevron-right'></i></li>
<li> <a class="active" href="#">Add Places to visit</a>
</li>
</ul>
</div>
</div>
<article>
    <form method="POST" class="form" enctype="multipart/form-data">
        <?php include_once 'placePartials/form.php' ?>
        <div class="mb-3">
            <labe class="form-label" for="image">Images(can choose multiple images)</labe>
            <input type="file" class="form-control" value="<?php echo $images ?>" name='image[]' id="image" multiple>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary me-md-2" type="submit">Save</button>
        </div>
        <div class="mb-3">
            <a href="destinations.php?active=destination" class="btn btn-primary me-md-2" type="submit">Go Back to Destination</a>
        </div>
    </form>
</article>
<?php include_once 'includes/footer.php'; ?>

</html>