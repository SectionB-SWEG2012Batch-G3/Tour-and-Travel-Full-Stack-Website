<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="get" class="form" enctype="multipart/form-data">
    <button class="btn btn-primary me-md-2"  type="button">Add Hotel</button>
        <div class="mb-3">
            <label for="name" class="form-label">Region/City Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Region/City Name">
        </div>
        <div class="mb-3">
            <label for="hotel" class="form-label">Hotel Name</label>
            <input class="form-control" type="text" name="hotel"  id="hotel" placeholder="Hotel Name"/>
        </div>
      
         
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" class="form-control" step="1" min = "1" max = "5"  name = 'rating' id="rating" />
        </div>


          
        <div class="mb-3">
             <button class="btn btn-primary me-md-2"  type="submit">Add Hotel</button>
        </div>
    </form>
</body>
</html>