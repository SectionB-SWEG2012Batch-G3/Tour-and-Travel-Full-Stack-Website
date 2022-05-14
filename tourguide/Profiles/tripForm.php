<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4HF Tour and Travel|Create Trip Form</title>
    <link rel="stylesheet" href="../../fontawesome-free-5.15.4-web/css/all.css">
    <script defer src = "CreatTripScript.js"></script>
    <script defer src = "tripDataValidation.js"></script>
    <link rel="stylesheet" href="tripCSS.css">
</head>
<style>
.trip-form-container{
    display: grid;
    grid-template-columns: auto;   
}

    .trip-form-container fieldset{
        width: 300px;
        background-color: rgba(0,0,0,0.5);
    }

    .trip-form-container label{
        width: 100%;
        margin: 5px;
    }

    .trip-form-container input:focus{
        border:1px solid blue;
        line-height: 25px;
        transform: scaleX(1.2);
    }

    #reset,#submit-btn{
        display: inline;
        margin-inline: 10px;
        transform: scaleX(1.4);
    }
</style>
<body style="background-image: url('bahirdar.jpg');">
    <section class = "trip-form-container">		
        <fieldset>
            <legend>Create trip form</legend>
            <form id = "form1">
                <div class="input-container">
                    <label for = "name">Full name</label>
                    <input type = "text" name = "Fname" class = "no-outline" id= "name" placeholder = "Full Name" maxlength = "20" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>
                <div class="input-container">
                    <label for = "place">Where you are going to go?</label>
                    <input type = "Search" class = "no-outline" id = "place" name = "place" value = "Addis Ababa, Ethiopia"  required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>
                <div class="input-container">
                    <label for="tele">Phone </label>
                    <input type="tel" id = "tele" name = "mobile">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>
                <div class="input-container">
                    <label for = "mail">Email</label><br>
                    <input type = "email" id = "mail" name = "E-mail" placeholder = "Username@gmail.com" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>
                <div class="input-container">
                    <label for="guides">Tour Guide Name</label><br>
                    <select name="guides" id="guides">
                        <option value="Haymanot Demis">Haymanot Demis</option>
                        <option value="Fuad Miftah">Fuad Miftah</option>
                        <option value="Hana Chane">Hana Chane</option>
                        <option value="Hamere Endale">Hamere Endale</option>
                        <option value="Haileamlak Desalegn">Haileamlak Desalegn</option>
                        <option value="Henok Kefale">Henok Kefale</option>
                        <option value="Hiwot Birhanu">Hiwot Birhanu</option>
                        <option value="Natnael Girma">Natnael Girma</option>
                    </select>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>  
                <div class="input-container">
                    <label for = "Date">From date</label>
                    <input type = "date" id = "St-Date" name = "Date-st" required>
                    <i style = "position: absolute;right: 80px;top:38px" class="fas fa-check-circle"></i>
                    <i style = "position: absolute;right: 80px;top:38px" class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>
                <div class="input-container">
                    <label for = "Date">To date</label> 
                    <input type = "date" id = "En-Date" name = "Date-en" required>
                    <i style = "position: absolute;right: 80px;top:38px" class="fas fa-check-circle"></i>
                    <i style = "position: absolute;right: 80px;top:38px" class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>
                <div class="input-container">
                    <label for="credit-card">Credit card number</label>
                    <input type="password" name  = "credit-card" id = "credit-card">
                    <i class="fas fa-eye" id = "on" ></i>
				    <i class="fas fa-eye-slash" id = "off"></i>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>
                <div class="input-container">
                    <label for="perhour">Price/Hr.</label>
                    <input type="text" id= "perhour" disabled>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>
                <div class="input-container">
                    <label for="price">Total price</label>
                    <input type="text" name="price" id="price" disabled>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>
            
                <input type = "submit" id = "submit-btn" name = "submit" value = "Create">
                <input style = "transform: translateX(10px);" type = "reset" id = "reset" name = "clear" value = "clear">
            </form>
            </fieldset>
</section>

</body>
</html>