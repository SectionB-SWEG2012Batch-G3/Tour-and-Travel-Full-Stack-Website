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
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <img src="<?php echo $res['image'] ?>" class="card-img-top" width="70%" alt="<?php echo $res['RegionName'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $res['RegionName'] ?></h5>
                    <p class="card-text"><?php echo $res['description'] ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        <iframe src="<?php echo $res['video'] ?>" title="YouTube video player" width="100%" height="550px" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <a href="editDestination.php?id=<?php echo $res['id'] ?>" style="float: right;" class="btn btn-lg btn-outline-primary col-6 m-4">Edit <?php echo $res['RegionName'] ?> </a>
        </div>
    </div>


    <!-- <div class="container-fluid">
        <?php echo $res['description'] ?>
    </div> -->
    <!-- <div class="container-fluid">
        <iframe src="<?php echo $res['video'] ?>" title="YouTube video player" width="80%" height="700px" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </iframe>
    </div> -->
    <?php if ($places) : ?>
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
                            <a href="editPlace.php?active=destination&pid=<?php echo $place['id'] ?>" class=" btn btn-sm btn-outline-primary m-2">Edit</a>
                            <a href="deletePlace.php?active=destination&id=<?php echo $place['id'] ?>" class="btn btn-sm btn-outline-danger m-2">Delete</a>
                            <a href="manageImages.php?id=<?php echo $place['id'] ?>&active=destination&name=<?php echo $place['title'] ?>" class="btn btn-sm btn-outline-primary m-2">Manage the images</a>
                        </td>
                    </tr>
                    <tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif ?>
    <?php if (!$places) : ?>
        <div class="d-grid gap-2 col-6 mx-auto alert alert-info">
            No Place to visit in this region
        </div>
    <?php endif ?>
</article>

<?php
include_once 'includes/footer.php';
?>

</html>