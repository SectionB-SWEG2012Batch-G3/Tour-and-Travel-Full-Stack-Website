
<?php
      include_once 'hotelPartials/dbOperation.php';
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           include_once 'hotelPartials/form_data.php';
        echo '<br/>'.$regionName.'<br/>'.$hotelName.'<br/>'.$minPrice.'<br/>'.$image['name'].'<br/>'.$maxPrice.'<br/>'.$rating.'<br/>';
        if(!empty($image['name'])){
            $imagePath = 'uploads/images/'.randomString(8).'/'.$image['name'];
        }
        if(empty($errors)){
            $sql = "UPDATE hotel SET region_name = :rname, hotel_name = :hname ,min_price = :minp , max_price = :maxp, rating = :rate, image = :img WHERE  id = :id";
            if(!is_dir('uploads/images/')){
                mkdir('uploads/images/');
            }
            if(!empty($image['name'])){
                unlink($oldPath);
                rmdir(dirname($oldPath));
                $isCreated =  mkdir(dirname($imagePath));
            // mkdir(dirname('uploads/images/'.randomString(8).'/'.$image['name']));
                echo $isCreated;
                move_uploaded_file($image['tmp_name'],$imagePath);
            }
            
            include_once 'hotelPartials/save_to_DB.php';
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            echo '<br/>'.$pdo->lastInsertId();
            header('Location: hotels.php?active=hotel');
        }
    }
    include_once 'hotelPartials/form.php';
?>

