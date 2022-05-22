
<?php
include_once 'hotelPartials/dbOperation.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once 'hotelPartials/form_data.php';
    // echo '<br/>' . $regionName . '<br/>' . $hotelName . '<br/>' . $minPrice . '<br/>' . $image['name'] . '<br/>' . $maxPrice . '<br/>' . $rating . '<br/>';

    if (!empty($image['name'])) {
        $imagePath = 'uploads/images/' . randomString(8) . '/' . $image['name'];
    }
    if (empty($errors)) {
        $stmt = $pdo->prepare("UPDATE image SET description = :newDesc WHERE imageFor = :id && description = :desc");
        $stmt->bindParam(':newDesc', $hotelName);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':desc', $oldhotelName);
        $stmt->execute();

        $sql = "UPDATE hotel SET region_name = :rname, hotel_name = :hname ,min_price = :minp , max_price = :maxp, rating = :rate, image = :img, link = :link WHERE  id = :id";
        if (!is_dir('uploads/images/')) {
            mkdir('uploads/images/');
        }
        if (!empty($image['name'])) {
            if ($oldPath) {
                unlink($oldPath);
                rmdir(dirname($oldPath));
            }
            $isCreated =  mkdir(dirname($imagePath));
            // mkdir(dirname('uploads/images/'.randomString(8).'/'.$image['name']));
            // echo $isCreated;
            move_uploaded_file($image['tmp_name'], $imagePath);
            $stmt = $pdo->prepare("UPDATE image SET description = :newDesc, path = :newpath WHERE imageFor = :id && description = :desc && path = :oldpath");
            $stmt->bindParam(':newDesc', $hotelName);
            $stmt->bindParam(':newpath', $imagePath);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':desc', $oldhotelName);
            $stmt->bindParam(':oldpath', $oldPath);
            $stmt->execute();
        }

        include_once 'hotelPartials/save_to_DB.php';
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        // echo '<br/>' . $pdo->lastInsertId();
        header('Location: hotels.php?active=hotel');
    }
}
include_once 'includes/header.php';
include_once 'hotelPartials/form.php';
include_once 'includes/footer.php';
?>

