<?php

include_once 'includes/header.php';
include_once '../dbconfig/connection.php';

$sql = "SELECT * FROM image WHERE imageFor = :for && description = :desc";
$id = '';
$title = '';
$active = '';
if (isset($_GET['name'])) {
    $title = $_GET['name'];
}

if (isset($_GET['active'])) {
    $active = $_GET['active'];
}

echo $active;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql2 = "SELECT * FROM hotel WHERE id = :id";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute([':id' => $id]);
$place = $stmt2->fetch();

$stmt = $pdo->prepare($sql);
$stmt->execute([':for' => $id, ':desc' => $title]);
$images = $stmt->fetchAll();


// $image_names =  [];
// $errors = [];
// $tmp_names = [];
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $image_names =  []; 
//     $tmp_names = [];
//     $files = $_FILES['image'];

//     if (!empty($files)) {
//         $image_names = $files['name'];
//         $tmp_names = $files['tmp_name'];
//         $sizes = $files['size'];
//         foreach ($image_names as $i => $name) {
//             $target_file = 'images/' . randomString(8) . '/' . $name;
//             $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//             if (
//                 $imageFileType === 'jpg' || $imageFileType === 'png' || $imageFileType === "jpeg"
//                 || $imageFileType === "gif"
//             ) {
//             } else {
//                 array_push($errors, 'Image file extension name must be in [png,jpg,jpeg,gif]');
//             }
//         }
//         foreach ($sizes as $i => $size) {
//             if ($size > 20000000) {
//                 array_push($errors, "image $i has size larger than 20MB");
//             }
//         }
//     } else {
//         array_push($errors, 'Image is not choosen');
//     }

//     if (empty($errors)) {
//         $sql2 = 'INSERT INTO image(path,description,imageFor) VALUES(:path,:desc,:for)';
//         if (!is_dir('uploads/images/')) {
//             mkdir('uploads/images/');
//         }
//         foreach ($image_names as $i => $name) {
//             $target_file = 'uploads/images/' . $title . randomString(8) . '/' . $name;
//             // echo '<br/>'.$target_file.'<br/>';
//             $isCreated = mkdir(dirname($target_file));
//             // echo '<br/>'.$isCreated.'<br/>';
//             move_uploaded_file($tmp_names[$i], $target_file);
//             $query = $pdo->prepare($sql2);
//             $query->bindParam(':path', $target_file);
//             $query->bindParam(':desc', $title);
//             $query->bindParam(':for', $id);
//             $query->execute();
//         }

//         header("Location: manageHotelImages.php?active=destination&name=$title");
//     }
// }

?>
<li><i class='bx bx-chevron-right'></i></li>
<li><a class="active" href="#"><?php echo  $title ?> Images </a></li>
</ul>
</div>
</div>
<article>
    <div class="card-group">
        <div class="col">
            <?php if (!empty($images)) : ?>
                <?php foreach ($images as $i => $image) : ?>
                    <div class="card m-3" style="width: 20rem;display:inline-block">
                        <img height="200" width="220" src="<?php echo $image['path'] ?>" class="card-img-top" alt="<?php echo $image['description'] ?>">
                        <div class="card-body" style="display:inline-block">
                            <h5 class="card-title"><?php echo $image['description'] ?></h5>
                            <p class="card-text" style="display:inline-block">Some quick example text to build</p>

                            <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#exampleModala<?php echo $i ?>">
                                Change
                            </button>
                            <div class="modal fade" id="exampleModala<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Insert image</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" id="form<?php echo $i ?>" name="form<?php echo $i ?>" action="updateImages.php?id=<?php echo $id ?>&name=<?php echo $title ?>&active=<?php echo $active ?>&img=<?php echo $image['id'] ?>" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label" for="image">Image to replace</label>
                                                    <input type="file" class="form-control" name='image' id="image">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" form="form<?php echo $i ?>" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-danger m-3" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $i ?>">
                                Delete
                            </button>
                            <div class="modal fade" id="exampleModal<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete image</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are sure to delete <b><?php echo $image['description']; ?></b>'s image from images?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            <a href="deleteImage.php?id=<?php echo $image['id']; ?>&title=<?php echo $title ?>&active=<?php echo $active ?>" form="form" class="btn btn-primary">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
    <?php if (empty($images)) : ?>
        <div class="alert alert-primary m-4" role="alert">
            Empty Gallary
        </div>
    <?php endif ?>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add image
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="form" name="form" action="saveImages.php?id=<?php echo $id ?>&name=<?php echo $title ?>&active=<?php echo $active ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="image">Images(can choose multiple images)</label>
                            <input type="file" class="form-control" value="<?php echo $images ?>" name='image[]' id="image" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" form="form" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    include_once 'includes/footer.php';
    ?>

    </html>