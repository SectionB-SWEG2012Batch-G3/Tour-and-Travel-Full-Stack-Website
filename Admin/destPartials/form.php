<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Add Destination</title>
        <style>
            form.form{
                max-width: 500px;
                margin: 100px 0 0 100px;
            }
        </style>
    </head>
    <body>
  

    <form method="POST" class="form" enctype="multipart/form-data">
    <button class="btn btn-primary me-md-2"  type="button">Add Destination</button>
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
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" name="desc"  id="desc" cols="30" rows="10" placeholder="something about ..."><?php echo $desc ?? 'something about ...'; ?></textarea> 
        </div>
        <div class="mb-3">
            <label for="wiki" class="form-label">Wikipedia Link</label>
            <input type="url" class="form-control" value="<?php echo $link ?>"  name = 'wiki' id="wiki" placeholder="https://en.wikipedia.org/wiki/example">
        </div>
        <div class="mb-3">
            <labe class="form-label" for ="image">Home Image</labe>
            <input type="file" class="form-control" value="<?php echo $imagePath ?>" name = 'image' id="image">
        </div>
        <div class="mb-3">
            <labe class="form-label" for ="vid">Video</labe>
            <input type="url" class="form-control" value="<?php echo $vid ?>" name = 'vid' id="vid">
        </div>
        <div class="mb-3">
             <button class="btn btn-primary me-md-2"  type="submit">Add Destination</button>
        </div>
    </form>
    </body>
    </html>
