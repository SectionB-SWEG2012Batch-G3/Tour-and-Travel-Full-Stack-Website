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
    <title>Log in</title>
</head>

<body>
    <header>
        <div class="top2">
            <div class="logo" style="height: 100px;width: 125px;">
                <a href="../../Homepage.html">
                    <svg height="100" width="125">
						<ellipse cx="62.5" cy="50" rx="55" ry="45" fill="url(#grad2)"/>
						<polygon points="62.5,5 85,50 62.5,95 40,50" style="stroke: rgb(255, 255, 255); fill: rgba(255, 255, 0, 1);"/>
						<text fill ="#000000" font-size="25" font-family="Verdana"
							x="20" y="60">4</text>
							<text fill ="#000000" font-size="25" font-family="Verdana"
							x="52.5" y="60">H</text>
							<text fill ="#000000" font-size="25" font-family="Verdana"
							x="90" y="60">F</text>
							<text fill ="#000000" font-size="13" font-family="Verdana"
							x="20" y="80">Tour &amp; Travel</text>
							
						<defs>
							<linearGradient id="grad2" x1="0%" y1="0%" x2="50%" y2="0%" x3="51%" y3="0%" x4="100%" y4="100%">
								<stop offset="0%" style="stop-color: rgb(0, 255, 0);stop-opacity: 1;"/>
								<stop offset="100%" style="stop-color: rgb(255, 255, 0);stop-opacity: 1;"/>
								<stop offset="100%" style="stop-color: rgb(255, 255, 0);stop-opacity: 1;"/>
								<stop offset="200%" style="stop-color: rgb(255, 0, 0); stop-opacity: 1;"/>
							</linearGradient>
						</defs>
						
					</svg>
                </a>
            </div>
    </header>
    <main>
        <div class="login-form">
            <fieldset class="login" style="height: 430px;">
                <form id="form">
                    <h1>Login</h1>
                    <div class="input-container">
                        <label for="username">Username or Email</label><br>
                        <input type="text" id="username" name="Username" placeholder="Username,Email">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small></small>
                    </div>
                    <div class="input-container">
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="Password" placeholder="password" min="8" max="20">
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
                        <button><a href = "sign up.html" >Create acount</a></button>
                    </div>
                </form>
            </fieldset>
        </div>
    </main>
</body>

</html>