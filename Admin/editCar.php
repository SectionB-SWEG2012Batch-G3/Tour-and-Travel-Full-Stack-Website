<?php
include_once 'carPartials/DBConfig.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once 'carPartials/form_data.php';

    echo '<br/>' . $carName . '<br/>' . $category . '<br/>'  . $desc . '<br/>' . $price . '<br/>';

    include_once 'carPartials/form_validation.php';

    if (!$errors) {

        $stmt = $pdo->prepare("UPDATE image SET description = :newModelName WHERE imageFor = :id && description = :desc");
        $stmt->bindParam(':newModelName', $carName);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':desc', $oldcarName);

        $stmt->execute();

        $stmt = $pdo->prepare("UPDATE transport SET modelName = :modelName , price = :price, category = :category, description = :description WHERE id = :id");
        include_once 'carPartials/saveCarToDB.php';
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header('Location: cars.php?active=cars');
    } else {
        // echo '<br/>' . $carNameErr[0] . '<br/>' . $categoryErr[0] . '<br/>'  . $descErr[0] . '<br/>' . $priceErr[0] . '<br/>' . '<br/>' . $imagesErr[0];
        echo "Error occured";
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</article>

<?php
include_once '../Admin/includes/footer.php'
?>