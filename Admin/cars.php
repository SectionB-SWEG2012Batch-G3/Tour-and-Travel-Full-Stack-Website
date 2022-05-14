<?php
    include_once 'includes/header.php';
    include_once '../dbconfig/connection.php';

    $sql = 'SELECT * FROM tourguide';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
?>

    <li>
                    <a class="active" href="#">Cars</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="d-grid gap-2">
    <button class="btn btn-primary" type="button"><h1>Cars</h1></button>
    
    <table class="table">
    <tdead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Brand/Model</th>
        <th scope="col">Descrition</th>
        <th scope="col">Rating</th>
        <th scope="col">Cost/Day</th>
        <th scope="col">Image</th>
        <th scope="col">Experience</th>
        <th scope="col">Lang</th>
        <th scope="col">Salary</th>
        <th scope="col">Action</th>
        </tr>
    </tdead>
    <tbody>
      <?php foreach ($res as $i => $tourguide):?>
        <tr>
        <td scope="row"><?php echo $i + 1 ?></td>
        <td scope="row"><?php echo $tourguide['name']?></td>
        <td scope="row"></td>
        <td scope="row"><?php echo $tourguide['email']?></td>
        <td scope="row"><?php echo $tourguide['age']?></td>    
        <td scope="row"><?php echo $tourguide['qualification']?></td>      
        <td scope="row"><?php echo $tourguide['experience']?></td>      
        <td scope="row"><?php echo $tourguide['lang']?></td>      
        <td scope="row"><?php echo $tourguide['salaryPerHour']?></td>      
        <td scope="row">
          <a class="btn btn-sm btn-outline-primary">Edit</a>
          <a class="btn btn-sm btn-outline-danger">Delete</a>
        </td>      
        </tr>
        <tr>
      <?php endforeach;?>
    </tbody>
    </table> 

    <div class="d-grid gap-2 col-6 mx-auto">
      <button class="btn btn-primary" type="button">Add</button>
    </div>
 

<?php
    include_once 'includes/footer.php';
?>