<?php
session_start();
require_once '../dbconfig/connection.php';
require_once '../partials/find_by_username.php';
require_once '../partials/is_loggedin.php';
if (!is_loggedin()) {
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        filter_var($email, FILTER_SANITIZE_EMAIL);
        var_dump($email);
        $user = find_by_username($email);
        var_dump($user);
        if ($user) {
            ini_set("SMTP", "smtp.gmail.com");
            ini_set("smtp_port", "587");
            ini_set("sendmail_from", "haymanotdemis1@gmail.com");
            $subject = "Password Reset";
            $link = "http://localhost/Tour-and-Travel-Full-Stack-Website/user/users/reset_password.php";
            $message = "
             Please click the link below to reset you passwor \n
             $link
            ";
            $header = "From: 4HF Tour and Travel Agency";
            $res = mail($email, $subject, wordwrap($message, 70), $header);
            if ($res) {
                echo "Email sent successfully ";
            } else {
                echo "Email not sent successfully ";
            }
        } else {
            echo "this email is not regitered";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="keywords" content="tour guides, interpreter" />
    <meta name="author" content="4HF tour and travel agency" />
    <meta name="viewport" content="width = device-width,initial-scale = 1.0" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css" />
    <link rel="stylesheet" href="../css/footerCSS.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script defer src="js/forgotPassword.js"></script>
    <title>Frogot password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url("Tisabay.jpg");
            background-size: cover;
            background-position: center center;
            color: white;
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

        .form-container {
            position: absolute;
            top: 33%;
            left: 40%;
            transform: translate(-50%, -50%);
            background-color: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.8));
        }

        .form-container fieldset {
            border-radius: 15px;
            box-shadow: 10px 10px 50px black;
            transform: scaleY(1.3);
        }

        .form-container input {
            display: block;
            line-height: 35px;
            padding: 0 5px;
            width: 100%;
            border: none;
            outline: none;
            border-bottom: #00ff00;
            border-radius: 5px;
        }

        input:focus {
            transition: 0.1s;
            border: 3px solid rgb(19, 230, 19);
        }

        a {
            text-decoration: none;
            font-size: 20px;
            font-weight: bolder;
            color: #ff0040;
        }

        .form-container button {
            width: 50px;
            color: black;
            margin-top: 5px;
            display: block;
            align-self: center;
        }

        label {
            line-height: 40px;
            font-size: 1.6rem;
        }

        .form-container fieldset {
            padding: 30px;
        }

        footer {
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        .input-container {
            position: relative;
        }

        .input-container i {
            position: absolute;
            top: 50px;
            right: 5px;
            color: black;
            visibility: hidden;
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
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <a href="../homepage">
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
            <button><a href="Tips.html" width="100px;">Travel Blogs</a></button>
        </div>
    </header>
    <main>
        <div class="form-container">
            <fieldset style="width: 400px">
                <form>
                    <h3>Forgot password</h3>
                    <div class="input-container">
                        <label for="username">Enter email</label>
                        <input type="email" id="username" name="email" placeholder="Email" />
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small></small>
                    </div>
                    <input type="submit" id="submit" value="Next" class="btn btn-dark my-3" />
                    <span>Have no acount?<a href="sign up.php">Create acount</a></span>
                </form>
            </fieldset>
        </div>
    </main>
    <footer style="width: 100%">
        <div class="copyright" style="width: 100%; text-align: center; color: white">
            <i>Copyright 2022 by Refsnes Data. All Rights Reserved.</i>
        </div>
    </footer>
</body>

</html>