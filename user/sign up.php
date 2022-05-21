<?php
session_start();
include_once '../dbconfig/connection.php';
include_once '../Admin/validation/test_input.php';
include_once '../Admin/validation/randomFileCreate.php';
$email = '';
$password = '';
$cpassword = '';
$emailErr = [];
$passwordErr = [];
$cpasswordErr = [];

$errors = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = test_input($_POST['email'] ?? '');
    $password = test_input($_POST['Password'] ?? '');
    $cpassword = test_input($_POST['confirm'] ?? '');

    // echo '<br/>' . $email . '<br/>' . $password . '<br/>' . $cpassword;

    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = ($stmt->fetch());
    // echo '<br/>' . $emailExist;

    var_dump($user);
    if ($user) {
        $emailErr[] = 'Email is already registered, please login';
    }
    filter_var($email, FILTER_SANITIZE_EMAIL);
    filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
    filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
    filter_var($cpassword, FILTER_SANITIZE_SPECIAL_CHARS);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr[] = 'Email is not valid';
    }
    if (strlen($email) > 30) {
        $emailErr[] = 'Password is too long, make it less than 30';
        $errors = true;
    }
    if (strlen($email) < 10) {
        $emailErr[] = 'Email is too short, make it more than 10';
        $errors = true;
    }
    if (strlen($password) > 30) {
        $passwordErr[] = 'Password is too long, make it less than 30';
        $errors = true;
    }
    if (strlen($password) < 8) {
        $passwordErr[] = 'password is too short, make it at least 8';
        $errors = true;
    }
    if ($password !== $cpassword || $cpassword === '') {
        $cpasswordErr[] = 'Confirm your password';
        $errors = true;
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    echo $hashedPassword;

    if (!$errors) {
        $stmt = $pdo->prepare("INSERT INTO user(email,password) VALUES(:email,:pass)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $hashedPassword);
        $stmt->execute();
        // header("Location: log in.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="tour guides, interpreter">
    <meta name="author" content="4HF tour and travel agency">
    <meta name="viewport" content="width = device-width,initial-scale = 1.0">
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="../css/footerCSS.css">
    <script defer src="js/signup.js"></script>
    <script defer src="js/createAcountStorage.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Sign in</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        footer {
            position: absolute;
            bottom: 10px;
        }

        body {
            background-image: url('../user/Tisabay.jpg');
            background-size: cover;
            background-position: center center;
            color: black;
        }

        a {
            color: rgb(18, 80, 214);
            text-decoration: none;
        }

        .logo-container {
            width: 100%;
            padding: 20px;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container .logo {
            float: left;
        }

        .logo-container button {
            float: right;
            margin-right: 50px;
            background-color: #00ff00;
            height: 30px;
            border: 1px solid blue;
            border-radius: 20px;
            font-size: 15px;
        }

        .address-container {
            width: 100%;
            margin: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            align-self: center;
            flex-wrap: nowrap;
            clear: both;
            position: absolute;
            bottom: 0%;
            padding-top: 10px;
            padding-bottom: 30px;
        }

        .copyright {
            position: absolute;
            bottom: 0%;
        }

        .form-container {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 340px;
            background-color: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.8));
            transform: translate(-50%, -50%);
            color: white;
            border-radius: 20px;
        }

        .form-container fieldset {
            height: 360px;
            border: none;
            padding: 0px 30px;
            border-radius: 20px;
            box-shadow: 7px 7px 60px black;
        }

        .form-container label {
            line-height: 30px;
            font-size: 1.4rem;
        }

        .form-container input {
            height: 25px;
            width: 100%;
            padding-left: 10px;
            border: none;
            outline: none;
            border-bottom: 2px solid rgb(0, 204, 255);
            background-color: white;
            border-radius: 5px;
        }

        input:focus {
            transition: 0.1s;
            border: 3px solid rgb(19, 230, 19);
        }

        input[type="submit"] {
            width: 50%;
            margin-left: 50px;
            margin-top: 10px;
            background-color: blueviolet;
            border: 2px solid rgb(0, 204, 255);
            color: white;
            cursor: pointer;
        }

        .form-container .input-container {
            position: relative;
        }

        .input-container i {
            position: absolute;
            top: 35px;
            right: 3px;
            color: black;
            visibility: hidden;
        }

        .input-container small {
            background-color: cornsilk;
            position: relative;
            width: fit-content;
            margin-top: 3px;
            padding-left: 5px;
            border-radius: 3px;
            display: block;
            visibility: hidden;
        }

        .input-container.success input {
            border: 2px solid #3ecc71;
        }

        .input-container.success i.fa-check-circle {
            visibility: visible;
            color: #3ecc71;
        }

        .input-container.error input {
            border: 2px solid #e74c3c;
        }

        .input-container.error small {
            visibility: visible;
            color: red;
        }

        .input-container.error i.fa-exclamation-circle {
            visibility: visible;
            color: #e74c3c;
        }

        .input-container i#on {
            visibility: visible;
            right: 20px;
            cursor: auto;
        }

        .input-container i#off {
            visibility: hidden;
            right: 20px;
        }

        @media only screen and (max-width:910px) {
            .form-container fieldset {
                height: 460px;
            }

            .form-container label {
                line-height: 30px;
                font-size: 1.rem;
            }
        }

        @media only screen and (max-width:560px) {
            .form-container label {
                line-height: 25px;
                font-size: 1.4rem;
            }

            .address-container {
                display: none;
            }
        }

        @media only screen and (max-width:400px) {
            .form-container fieldset.signup {
                height: 420px;
            }
        }

        @media only screen and (max-width:360px) {
            .input-container input {
                width: 100%;
            }

            .form-container {
                width: 100%;
            }

            fieldset.signup {
                width: 100%;
            }

            form {
                width: 100%;
            }
        }

        @media only screen and (max-width:290px) {
            fieldset.signup {
                height: 460px;
            }
        }

        @media only screen and (max-width:290px) {
            fieldset.signup {
                height: 480px;
            }
        }
    </style>

</head>

<body>

    <header>
        <div class="top2">
            <div class="logo" style="height: 100px;width: 125px;">
                <a href="../../Homepage.html">
                    <svg height="100" width="125">
                        <ellipse cx="62.5" cy="50" rx="55" ry="45" fill="url(#grad2)" />
                        <polygon points="62.5,5 85,50 62.5,95 40,50" style="stroke: rgb(255, 255, 255); fill: rgba(255, 255, 0, 1);" />
                        <text fill="#000000" font-size="25" font-family="Verdana" x="20" y="60">4</text>
                        <text fill="#000000" font-size="25" font-family="Verdana" x="52.5" y="60">H</text>
                        <text fill="#000000" font-size="25" font-family="Verdana" x="90" y="60">F</text>
                        <text fill="#000000" font-size="13" font-family="Verdana" x="20" y="80">Tour &amp; Travel</text>

                        <defs>
                            <linearGradient id="grad2" x1="0%" y1="0%" x2="50%" y2="0%" x3="51%" y3="0%" x4="100%" y4="100%">
                                <stop offset="0%" style="stop-color: rgb(0, 255, 0);stop-opacity: 1;" />
                                <stop offset="100%" style="stop-color: rgb(255, 255, 0);stop-opacity: 1;" />
                                <stop offset="100%" style="stop-color: rgb(255, 255, 0);stop-opacity: 1;" />
                                <stop offset="200%" style="stop-color: rgb(255, 0, 0); stop-opacity: 1;" />
                            </linearGradient>
                        </defs>

                    </svg>
                </a>
            </div>
    </header>

    <main>
        <div class="form-container">
            <fieldset class="signup">
                <form id="form" method="POST">
                    <h1>Signup</h1>
                    <div class="input-container 
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        echo $emailErr ? 'error' : 'success';
                    } ?>
                       ">
                        <label for="email">Email</label><br>
                        <input type="text" id="email" name="email" value="<?php echo $email ?? ''; ?>" placeholder="Email">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small><?php echo $emailErr[0] ?? '' ?></small>
                    </div>
                    <div class="input-container 
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        echo $passwordErr ? 'error' : 'success';
                    } ?>
                    ">
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="Password" value="<?php echo $password ?? ''; ?>" placeholder="password">
                        <i class="fas fa-eye" id="on"></i>
                        <i class="fas fa-eye-slash" id="off" s></i>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small><?php echo $passwordErr[0] ?? '' ?></small>
                    </div>
                    <div class="input-container 
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        echo $cpasswordErr ? 'error' : 'success';
                    } ?>
                    ">
                        <label for="confirm">Confirm password</label><br>
                        <input type="password" id="confirm" name="confirm" value="<?php echo $cpassword ?? ''; ?>" placeholder="confirm password">
                        <i class="eye3 fas fa-eye" id="on"></i>
                        <i class="eye4 fas fa-eye-slash" id="off"></i>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small><?php echo $cpasswordErr[0] ?? '' ?></small>
                    </div>
                    <input type="submit" id="submit" name="submit" value="Signup"><br>
                    <a href="log in.php" class="btn btn-primary m-2 py-2 px-4">Login</a>
                </form>

            </fieldset>
        </div>
    </main>
</body>

</html>