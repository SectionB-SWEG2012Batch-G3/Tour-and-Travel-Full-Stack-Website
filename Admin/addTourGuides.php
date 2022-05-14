<?php
try{
    include_once '../dbconfig/connection.php';
    echo 'DB connected successfully';
}catch(PDOException $e) {
    echo 'connection exception '.$e->getMessage();
}
    include_once 'validation/test_input.php';
    include_once 'validation/randomFileCreate.php';
    $fname = '';
    $lname = '';
    $email = '';
    $password = '';
    $age = '';
    $gender = '';
    $qualification = '';
    $Experience = '';
    $lang = '';
    $services = '';
    $salary = '';
    $target_file = '';
    $resume = '';
    $errors = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fname = test_input($_POST['fname']);
        $lname = test_input($_POST['lname']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $age = test_input($_POST['age']);
        $gender = test_input($_POST['gender']);
        $qualification = test_input($_POST['qualification']);
        $Experience = test_input($_POST['Experience']);
        $lang = test_input($_POST['lang']);
        $services = test_input($_POST['services']);
        $salary = test_input($_POST['salary']);
        $target_file = '';
        $resume = test_input($_POST['resume']);

        
        if($fname === ''){
           array_push($errors,'First name can\'t be empty');
        }
        if($lname === ''){
           array_push($errors,'Last name can\'t be empty');
        }
        if($email === ''){
           array_push($errors,'Email can\'t be empty');
        }
        if($password === ''){
           array_push($errors,'first name can\'t be empty');
        }
        if($gender === ''){
           array_push($errors,'Gender can\'t be empty');
        }
        if($qualification === ''){
           array_push($errors,'Qualification can\'t be empty');
        }
        if($Experience === ''){
           array_push($errors,'Experience can\'t be empty');
        }
        if($lang === ''){
           array_push($errors,'Language skills can\'t be empty');
        }
        if($services === ''){
           array_push($errors,'Services can\'t be empty');
        }
        if($salary === ''){
           array_push($errors,'Salary can\'t be empty');
        }
    
        if($resume === ''){
           array_push($errors,'Resume can\'t be empty');
        }

        if(!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/",$email)){
            array_push($errors,'Email is not correct');
        }

        if(!is_numeric($age) || !is_numeric($salary) || !is_numeric($Experience)){
            array_push($errors,'Age,Salary,Experience must be numeric values');
        }
        
        if(!empty($_FILES['photo']['name'])){
            $target_file = 'images/'.$fname.'_'.$lname.randomString(8).'/'.$_FILES['photo']['name'];
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
           if(getimagesize($_FILES['photo']['tmp_name']) !== false){
                if($_FILES['photo']['size'] <= 2000000 ){
                    if($imageFileType === 'jpg' || $imageFileType === 'png' || $imageFileType === "jpeg"
                    || $imageFileType === "gif"){
                      
                    }else{
                        array_push($errors,'Image file extension name must be in [png,jpg,jpeg,gif]');
                    }
                }else{
                    array_push($errors,'image file size is to large');
                }
           }else{
               array_push($errors,'file is not an image');
           }
        }else{
            array_push($errors,'photo is not choosen');
        }

        if(empty($errors)){
          $sql = 'INSERT INTO tourguide (name,lname,email,password,age,gender,qualification,experience,lang,services,salaryPerHour,photo,resume) VALUES(:fname,:lname,:email,:password,:age,:gender,:qualification,:Experience,:lang,:services,:salary,:photo,:resume)';
          if(!is_dir('images')){
            mkdir('images');
          }
          mkdir(dirname($target_file));
          move_uploaded_file($_FILES['photo']['tmp_name'],$target_file);
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(':fname',$fname);
           $stmt->bindParam(':lname',$lname);
           $stmt->bindParam(':email',$email);
           $stmt->bindParam(':password',$password);
           $stmt->bindParam(':age',$age);
           $stmt->bindParam(':gender',$gender);
           $stmt->bindParam(':qualification',$qualification);
           $stmt->bindParam(':Experience',$Experience);
           $stmt->bindParam(':lang',$lang);
           $stmt->bindParam(':services',$services);
           $stmt->bindParam(':salary',$salary);
           $stmt->bindParam(':photo',$target_file);
           $stmt->bindParam(':resume',$resume);
           $stmt->execute();
            $saved = "saved";
            //echo "<script>alert($saved)</script>";
           header('Location: tourguides.php?active=tourguide');
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add Tour Guide</title>
    <style>
        form.form{
            max-width: 500px;
            margin: 100px 0 0 100px;
        }
    </style>
</head>
<body>
    <button class="btn btn-primary me-md-2" type="submit">Add Tour Guide</button>
    <form method="POST" class="form" enctype="multipart/form-data">
        <?php if(!empty($errors)):?>
            <?php foreach($errors as $i => $error):?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $error;?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="mb-3">
            <label for="fname" class="form-label">Tour Guide First Name</label>
            <input type="text" class="form-control" value="<?php echo $fname; ?>" name="fname" id="fname" placeholder="Tour Guide Name">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Tour Guide Last Name</label>
            <input type="text" class="form-control" value="<?php echo $lname; ?>" name="lname" id="lname" placeholder="Tour Guide Name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $email; ?>" name = 'email' id="email" placeholder="Email address">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" checked = "<?php $gender === 'male' ?>" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" checked = "<?php $gender === 'female' ?>" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" value="<?php echo $password; ?>" name = 'password' id="password" placeholder="password">
        </div>
        <div class="mb-3">
            <label for="Age" class="form-label">Age</label>
            <input type="number" class="form-control" value="<?php echo $age; ?>" name = 'age' id="age" placeholder="age">
        </div>
        <div class="mb-3">
            <label for="qualification" class="form-label">Qualifications</label>
            <input type="text" class="form-control" value="<?php echo $qualification; ?>" name = 'qualification' id="qualification" placeholder="Qualifications">
        </div>
        <div class="mb-3">
            <label for="Experience" class="form-label">Experience</label>
            <input type="number" class="form-control" value="<?php echo $Experience; ?>" name = 'Experience' id="Experience" placeholder="Experience">
        </div>
        <div class="mb-3">
            <label for="lang" class="form-label">Language Skills</label>
            <input type="text" class="form-control" value="<?php echo $lang; ?>" name = 'lang' id="lang" placeholder="Tigirigna, Amharic ...">
        </div>
        <div class="mb-3">
            <label for="services" class="form-label">Services</label>
            <input type="text" class="form-control" name = 'services' value="<?php echo $services; ?>" id="services" placeholder="Reflection, Driving ...">
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" step="0.01" value="<?php echo $salary; ?>" name = 'salary' id="salary" placeholder="salary per hour">
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" name = 'photo' id="photo">
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Resume</label>
            <textarea class="form-control" name = "resume" id="resume" rows="3"><?php echo $resume; ?></textarea>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-2" type="submit">Save</button>
        </div>
    </form>
</body>
</html>