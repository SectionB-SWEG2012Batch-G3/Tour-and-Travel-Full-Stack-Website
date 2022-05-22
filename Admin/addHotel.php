
<?php
include_once 'hotelPartials/dbOperation.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once 'hotelPartials/form_data.php';

    // echo '<br/>' . $regionName . '<br/>' . $hotelName . '<br/>' . $rating . '<br/>' . $minPrice . '<br/>' . $image['name'] . '<br/>' . $maxPrice . '<br/>' . $rating . '<br/>';

    if (!empty($image)) {
        $imagePath = 'uploads/images/' . $hotelName . randomString(8) . '/' . $image['name'];
    } else {
        array_push($errors, 'Image is not choosen');
    }

    if (empty($errors)) {
        $sql = "INSERT INTO hotel(region_name, hotel_name,min_price, max_price, rating, image,link) VALUES(:rname,:hname,:minp,:maxp,:rate,:img,:link)";
        if (!is_dir('uploads/images/')) {
            mkdir('uploads/images/');
        }
        $isCreated =  mkdir(dirname($imagePath));
        // mkdir(dirname('uploads/images/'.randomString(8).'/'.$image['name']));
        echo $isCreated;
        move_uploaded_file($image['tmp_name'], $imagePath);
        include_once 'hotelPartials/save_to_DB.php';
        $stmt->execute();
        echo '<br/>' . $pdo->lastInsertId();
        header('Location: hotels.php?active=hotel');
    }
}
include_once 'hotelPartials/form.php';
?>

