<?php
include_once 'includes/header.php';
include_once '../dbconfig/connection.php';
$sql = "SELECT * FROM destination WHERE id = :id";
$id = $_GET['id'];
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$res = $stmt->fetch();

$sql2 = "SELECT places_to_visit.id as id, places_to_visit.title,places_to_visit.description,places_to_visit.mapLink FROM places_to_visit INNER JOIN destination ON places_to_visit.region_id = destination.id WHERE places_to_visit.regionName = :regionName && region_id = :region_id";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute([':region_id' => $id, ':regionName' => $res['RegionName']]);
$places = $stmt2->fetchAll();
?>
<li>
    <a class="active" href="#">Destinations </a>

</li>
<li><i class='bx bx-chevron-right'></i></li>
<li><a class="active" href="#"><?php echo $res['RegionName'] ?></a></li>
</ul>
</div>
</div>
<article>
    <div class="container">
        <img src="<?php echo $res['image'] ?>" class="img-fluid" width="70%" alt="<?php echo $res['RegionName'] ?>">
        <a href="editDestination.php?id=<?php echo $res['id'] ?>" style="float: right;" class="btn btn-lg btn-outline-primary">Edit <?php echo $res['RegionName'] . ' ' . $id ?> </a>
    </div>

    <div class="container-fluid">
        <?php echo $res['description'] ?>
    </div>
    <div class="container-fluid">
        <iframe src="<?php echo $res['video'] ?>" title="YouTube video player" width="80%" height="700px" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </iframe>
    </div>

    <table class="table">
        <tdead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Region/City Name</th>
                <th scope="col">Description</th>
                <th scope="col">Map Link</th>
                <th scope="col">Action</th>
            </tr>
        </tdead>
        <tbody>
            <?php foreach ($places as $i => $place) : ?>
                <tr>
                    <td scope="row"><?php echo $i + 1 ?></td>
                    <td scope="row"><?php echo $place['title'] ?></td>
                    <td scope="row"><?php echo explode('.', $place['description'])[0]; ?></td>
                    <td scope="row"><?php echo $place['mapLink'] ?></td>
                    <td scope="row" rowspan="2">
                        <a class="btn btn-sm btn-outline-primary m-2">Edit</a>
                        <a class="btn btn-sm btn-outline-danger m-2">Delete</a>
                        <a href="managehOTELImages.php?id=<?php echo $place['id'] ?>&active=destination&name=<?php echo $place['title'] ?>" class="btn btn-sm btn-outline-primary m-2">Manage the images</a>
                    </td>
                </tr>
                <tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</article>

<?php
include_once 'includes/footer.php';
?>

</html>