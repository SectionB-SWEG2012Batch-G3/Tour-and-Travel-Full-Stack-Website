<?php
    include_once 'includes/header.php';
    include_once '../dbconfig/connection.php';
    $sql = "SELECT * FROM image WHERE imageFor = :for && description = :desc";
    $id = '';
    $title = '';
    if(isset($_GET['name'])){
        $title = $_GET['name'];
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    $sql2 = "SELECT * FROM places_to_visit WHERE id = :id";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute([':id' => $id]);
    $place = $stmt2->fetch();
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':for' => $place['id'], ':desc' => $place['title']]);
    $images = $stmt->fetchAll();

?>
    <li>
                    <a class="active" href="#">Destinations </a>      
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li><a class="active" href="#"><?php echo $title?> Images</a></li>
            </ul>
        </div>
    </div>    
<article>  
<?php if(!empty($images)):?>
    <?php foreach ($images as $i => $image):?>
        <div class="card" style="width: 18rem;">
                <img src="<?php echo $image['path']?>" class="card-img-top" alt="<?php echo $image['description']?>">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary m-2">Change</a>
                <a href="#" class="btn btn-danger m-2">Delete</a>                
            </div>
        </div>
        
    <?php endforeach?>   
<?php endif?>    
<?php
    include_once 'includes/footer.php';
?>
</html>