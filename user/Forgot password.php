<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="keywords" content="tour guides, interpreter" />
    <meta name="author" content="4HF tour and travel agency" />
    <meta name="viewport" content="width = device-width,initial-scale = 1.0" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css" />
    <link rel="stylesheet" href="../css/footerCSS.css" />
    <script defer src="js/forgotPasswordFormValidation.js"></script>
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
            background-color: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.8));
        }
        
        .form-container fieldset {
            border-radius: 15px;
            box-shadow: 10px 10px 50px black;
            transform: scaleY(1.3);
        }
        
        .form-container input {
            display: block;
            line-height: 25px;
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
        
        .form-container button {
            width: 50px;
            color: white;
            margin-top: 5px;
            background-color: rgb(13, 83, 214);
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
            top: 43px;
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
        
        #submit {
            width: 70px;
            border: none;
            outline: none;
            background-color: crimson;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <a href="../../homepage.html"><img src="../../Logo3.jpg" alt="LOGO" width="130px" height="90px" /></a>
            <button><a href="Tips.html" width="100px;">Travel Blogs</a></button>
        </div>
    </header>
    <main>
        <div class="form-container">
            <fieldset style="width: 270px">
                <form>
                    <h3>Forgot password</h3>
                    <div class="input-container">
                        <label for="username">Enter email</label>
                        <input type="email" id="username" name="email" placeholder="Email" />
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small></small>
                    </div>
                    <input type="submit" id="submit" value="Next" />
                    <span>Have no acount?<a
                href="sign up.html"
                style="
                  background-color: white;
                  color: rgb(10, 10, 10);
                  font-weight: bold;
                "
                >Create acount</a
              ></span
            >
          </form>
        </fieldset>
      </div>
    </main>
    <footer style="width: 100%">
      <div
        class="copyright"
        style="width: 100%; text-align: center; color: white"
      >
        <i>Copyright 2022 by Refsnes Data. All Rights Reserved.</i>
      </div>
    </footer>
  </body>
</html>