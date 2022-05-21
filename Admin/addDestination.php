<?php
include_once 'destPartials/dbOperations.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $regionName = $_POST['name'] ?? $regionName;
    $desc = $_POST['desc'] ?? $desc;
    $link = $_POST['wiki'] ?? $link;
    $image = $_FILES['image'] ?? $image;
    $vid = $_POST['vid'] ?? $vid;
    $imagePath = $image ? '' : $imagePath;
    echo '<br/>' . $regionName . '<br/>' . $desc . '<br/>' . $link . '<br/>' . $image['name'] . '<br/>' . $vid . '<br/>';
    if (!empty($image)) {
        $imagePath = 'uploads/images/' . $regionName . randomString(8) . '/' . $image['name'];
    } else {
        array_push($errors, 'Image is not choosen');
    }

    if (empty($errors)) {
        $sql = "INSERT INTO destination(RegionName,description,image,wikiLink,video) VALUES(:name,:desc,:imgPath,:link,:vid)";
        if (!is_dir('uploads/images/')) {
            mkdir('uploads/images/');
        }
        $isCreated =  mkdir(dirname($imagePath));
        // mkdir(dirname('uploads/images/'.randomString(8).'/'.$image['name']));

        move_uploaded_file($image['tmp_name'], $imagePath);
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $regionName);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':imgPath', $imagePath);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':vid', $vid);

        $stmt->execute();
        header('Location: destinations.php?active=destination');
    }
}

include_once 'includes/header.php';
?>
<li>
    <a class="active" href="#">Add destination</a>
</li>
</ul>
</div>
</div>
<?php
include_once 'destPartials/form.php';
include_once 'includes/header.php';
?>