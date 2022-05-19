<div class="mb-3">
    <label for="carName" class="form-label">Car Name/Car Model</label>
    <input type="text" name="carName" class="form-control" value="<?php echo $carName ?>">
    <div class="<?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo $carNameErr ? 'alert alert-danger py-2 m-2' : '';
                }
                ?>" role="alert">
        <small><?php echo $carNameErr[0] ?? '' ?></small>
    </div>

</div>
<div class="mb-3">
    <label for="price" class="form-label">Price per day</label>
    <input type="number" name="price" class="form-control" value="<?php echo $price ?>">

    <div class="<?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo $priceErr ? 'alert alert-danger py-2 m-2' : '';
                }
                ?>" role="alert">
        <small><?php echo $priceErr[0] ?? '' ?></small>
    </div>
</div>
<div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select name="category" class="form-select form-select-lg mb-3" value="<?php echo $category ?>">
        <option value="alone">alone</option>
        <option value="family">family</option>
        <option value="group">group</option>
    </select>
    <div class="<?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo $categoryErr ? 'alert alert-danger py-2 m-2' : '';
                }
                ?>" role="alert">
        <?php echo $categoryErr[0] ?? '' ?>
    </div>

</div>
<div class="mb-3">
    <label for="carDescription" class="form-label">Car Description</label>
    <textarea name="carDescription" cols="30" rows="10" class="form-control">value="<?php echo $desc ?>"</textarea>

    <div class="<?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo $descErr ? 'alert alert-danger py-2 m-2' : '';
                }
                ?>" role="alert">
        <small><?php echo $descErr[0] ?? '' ?></small>
    </div>
</div>