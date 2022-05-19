<?php
include_once 'placePartials/DBConfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once 'placePartials/form_data.php';

    // echo '<br/>'.$placeName.'<br/>'.$desc.'<br/>'.$mapLink.'<br/>';
    // var_dump($files);
    // echo '<br/>';


    if (empty($errors)) {
        // echo '<br/>'.$region_name[0].'<br/>';
        $stmt = $pdo->prepare("UPDATE image SET description = :newDesc WHERE imageFor = :id && description = :desc");
        $stmt->bindParam(':newDesc', $placeName);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':desc', $oldplaceName);

        $sql = "UPDATE places_to_visit SET title = :name, description = :desc, mapLink = :link WHERE id = :id";
        include_once 'placePartials/saveToDB.php';
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        //header('Location: destinations.php?active=destination');
    }
}
include_once 'includes/header.php';
?>
<li>
    <a class="active" href="#">Destinations </a>

</li>
<li><i class='bx bx-chevron-right'></i></li>
<li> <a class="active" href="#">Edit <?php echo $place['title'] ?></a>
</li>
</ul>
</div>
</div>
<article>
    <form method="POST" class="form" enctype="multipart/form-data">
        <?php include_once 'placePartials/form.php' ?>

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