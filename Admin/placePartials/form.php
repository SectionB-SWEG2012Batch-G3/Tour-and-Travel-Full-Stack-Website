<button class="btn btn-primary me-md-2" type="button">Add Place to Visit</button>
<?php if (!empty($errors)) : ?>
    <?php foreach ($errors as $i => $error) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<br />
<div class="mb-3">
    <label for="name" class="form-label">Region/Place/City Name</label>
    <input type="text" class="form-control" value="<?php echo $placeName ?>" name="name" id="name" placeholder="Region/City Name">
</div>
<div class="mb-3">
    <label for="desc" class="form-label">Description</label>
    <textarea class="form-control" name="desc" id="desc" cols="30" rows="10" placeholder="<?php echo $desc ? '' : 'something about ...' ?>"><?php echo $desc ?? '' ?></textarea>
</div>
<div class="mb-3">
    <label for="map" class="form-label">Google Map Link</label>
    <input type="url" class="form-control" value="<?php echo $mapLink ?>" name='map' id="map" placeholder="https://maps.google.com/maps">
</div>