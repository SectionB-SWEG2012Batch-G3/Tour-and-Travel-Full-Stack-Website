<?php
session_start();
include_once '../dbconfig/connection.php';
include_once '../Admin/validation/test_input.php';
include_once '../Admin/validation/randomFileCreate.php';
include_once '../partials/if_loggedin.php';
include_once '../partials/find_by_username.php';
include_once '../partials/session_flash.php';

$email = '';
$password = '';

$emailErr = [];
$passwordErr = [];
$errors = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = test_input($_POST['email'] ?? '');
    $password = test_input($_POST['Password'] ?? '');

    filter_var($email, FILTER_SANITIZE_EMAIL);
    filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
    filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);

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

    $user = find_by_username($email);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id();
        $_SESSION['username'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];
        if (isset($_SESSION['from'])) {
            $to = session_flash('from');
            header(("Location: http://$to[0]"));
        }
        if_loggedin();
    } else {
        $errors = 'Invalid Email or Password';
    }
} else {
    if_loggedin();
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
    <link rel="stylesheet" href="css/Registration.css">
    <script defer src="js/form-validation.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Log in</title>
    <style>
        a {
            color: rgb(18, 80, 214);
            text-decoration: none;
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
        <div class="login-form">
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errors ?>
                </div>
            <?php endif ?>
            <fieldset class="login" style="height: 430px;">
                <form id="form" method="POST">
                    <h1>Login</h1>
                    <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    echo $emailErr ? 'error' : 'success';
                                                } ?>">
                        <label for=" username">Username or Email</label><br>
                        <input type="text" id="username" name="email" value="<?php echo $email ?? ''; ?>" placeholder="Username,Email">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small></small>
                    </div>
                    <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    echo $emailErr ? 'error' : 'success';
                                                } ?>">
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="Password" value="<?php echo $password ?? ''; ?>" placeholder="password" min="8" max="20">
                        <i class="fas fa-eye" id="on"></i>
                        <i class="fas fa-eye-slash" id="off" s></i>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small></small>
                    </div>
                    <div class="submit">
                        <input type="submit" name="submit" value="Signin" id="submit">
                    </div>
                    <div>
                        <a class="forgot-psw" href="Forgot password.html">Forgot password?</a><br><br>
                        <span>Have no acount?</span>
                        <button><a href="sign up.php">Create acount</a></button>
                    </div>
                </form>
            </fieldset>
        </div>
    </main>
</body>

</html>