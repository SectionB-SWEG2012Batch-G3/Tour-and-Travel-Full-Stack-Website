<?php
    include_once 'includes/header.php'
?>  

    <li>
                    <a class="active" href="#">Hotels</a>
                </li>
            </ul>
        </div>
    </div>
    <article>
    <form method="POST" class="form" enctype="multipart/form-data">
    <button class="btn btn-primary me-md-2 mb-3"  type="button">Add Hotel</button>
        <?php if(!empty($errors)):?>
            <?php foreach($errors as $i => $error):?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $error;?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="mb-3">
            <label for="name" class="form-label">Region/City Name</label>
            <input type="text" class="form-control" value="<?php echo $regionName ?>" name="name" id="name" placeholder="Region/City Name">
        </div>
        <div class="mb-3">
            <label for="hotel" class="form-label">Hotel Name</label>
            <input class="form-control" type="text" name="hotel"  id="hotel" value="<?php echo $hotelName?>" placeholder="Hotel Name"/>
        </div>
        <div class="mb-3">
            <label for="minprice" class="form-label">Min Price</label>
            <input type="number" class="form-control" step="0.01" value="<?php echo $minPrice ?>"  name = 'minprice' id="minprice" min = "0">
        </div>
        <div class="mb-3">
            <label for="maxprice" class="form-label">Max Price</label>
            <input type="number" class="form-control" step="0.01" max = "1000" value="<?php echo $maxPrice ?>"  name = 'maxprice' id="maxprice" >
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" class="form-control" step="1" min = "1" max = "5" value="<?php echo $rating ?>"  name = 'rating' id="rating" />
        </div>

        <div class="mb-3">
            <labe class="form-label" for ="image">Image</labe>
            <input type="file" class="form-control"  value="<?php echo $imagePath ?>" name = 'image' id="image"/>
        </div>
          
        <div class="mb-3">
             <button class="btn btn-primary me-md-2"  type="submit">Add Hotel</button>
        </div>
    </form>
    </article>
    <?php
    include_once 'includes/footer.php'
    ?>
    </html>
