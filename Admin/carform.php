<?php
include_once 'carPartials/DBConfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once 'carPartials/form_data.php';

    $images = $_FILES['images'];

    // echo '<br/>' . $carName . '<br/>' . $category . '<br/>'  . $desc . '<br/>' . $price . '<br/>';

    $image_names =  [];
    $tmp_names = [];
    // var_dump($images);

    include_once 'carPartials/form_validation.php';

    if (!empty($images)) {
        $image_names = $images['name'];
        $tmp_names = $images['tmp_name'];
        $sizes = $images['size'];
        foreach ($image_names as $i => $name) {
            $target_file = 'images/' . $carName . randomString(8) . '/' . $name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (
                $imageFileType === 'jpg' || $imageFileType === 'png' || $imageFileType === "jpeg"
                || $imageFileType === "gif"
            ) {
            } else {
                // echo $imageFileType . '<br/>';
                array_push($imagesErr, 'Image file extension name must be in [png,jpg,jpeg,gif]');
                $errors = true;
            }
        }
        foreach ($sizes as $i => $size) {
            if ($size > 20000000) {
                array_push($imagesErr, "image $i has size larger than 20MB");
                $errors = true;
            }
        }
    } else {
        array_push($imagesErr, 'Image is not choosen');
        $errors = true;
    }

    if (!$errors) {
        $stmt = $pdo->prepare("INSERT INTO transport(modelName, price, category, description) VALUES( :modelName, :price, :category, :description)");
        include_once 'carPartials/saveCarToDB.php';
        $stmt->execute();
        $id = $pdo->lastInsertId();

        $sql2 = 'INSERT INTO image(path,description,imageFor) VALUES(:path,:desc,:for)';
        if (!is_dir('uploads/images/')) {
            mkdir('uploads/images/');
        }
        foreach ($image_names as $i => $name) {
            $target_file = 'uploads/images/' . $carName . randomString(8) . '/' . $name;
            // echo '<br/>'.$target_file.'<br/>';
            $isCreated = mkdir(dirname($target_file));
            // echo '<br/>'.$isCreated.'<br/>';
            move_uploaded_file($tmp_names[$i], $target_file);
            $query = $pdo->prepare($sql2);
            $query->bindParam(':path', $target_file);
            $query->bindParam(':desc', $carName);
            $query->bindParam(':for', $id);
            $query->execute();
        }
    } else {
        // echo '<br/>' . $carNameErr[0] . '<br/>' . $categoryErr[0] . '<br/>'  . $descErr[0] . '<br/>' . $priceErr[0] . '<br/>' . '<br/>' . $imagesErr[0];
    }
}

include_once '../Admin/includes/header.php'
?>

<li>
    <a class="active" href="#">Cars </a>
</li>
<li><i class='bx bx-chevron-right'></i></li>
<li> <a class="active" href="#">Add cars</a>
</li>
</ul>
</div>
</div>
<article>
    <form method="post" class="form" enctype="multipart/form-data">
        <?php include_once 'carPartials/form.php' ?>
        <div class="mb-3">
            <label for="images" class="form-label">Images</label>
            <input type="file" name="images[]" class="form-control" multiple>
            <div class="<?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            echo $imagesErr ? 'alert alert-danger py-2 m-2' : '';
                        }
                        ?>" role="alert">
                <small><?php echo $imagesErr[0] ?? '' ?></small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="cars.php?active=cars" class="btn btn-primary">Go Back</a>
    </form>
</article>


<?php
include_once '../Admin/includes/footer.php'
?>