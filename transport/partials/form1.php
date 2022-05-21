<body style="background-image: url('http://localhost/Tour-and-Travel-Full-Stack-Website/transport/images/front.jpg');">
    <section class="trip-form-container">
        <?php if ($errors && $scheduleErr) : ?>
            <script>
                const Myalert = function() {
                    alert('<?php echo $scheduleErr ?>');
                }
                Myalert();
            </script>
        <?php endif ?>
        <fieldset>
            <legend>Create trip form</legend>
            <?php if (!$errors && isset($_GET['success'])) : ?>
                <div class="alert alert-primary" role="alert">
                    Data Saved Succesfully
                </div>
            <?php endif ?>
            <form id="form1" method="POST">
                <div class="input-container 
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo $nameErr ? 'error' : 'success';
                }
                ?>">
                    <label for="name">Full name</label>
                    <input type="text" name="Fname" class="no-outline" id="name" value="<?php echo trim($name) ? trim($name) : ''; ?>" placeholder="Full Name" maxlength="30" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $nameErr[0] ?? ''; ?></small>
                </div>
                <div class="input-container 
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        echo $placeErr ? 'error' : 'success';
                    } ?>">
                    <label for="place">Where you are going to go?</label>
                    <input type="Search" value="<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    echo !empty($place) ? trim($place) : "Addis Ababa, Ethiopia";
                                                } ?>" placeholder="Addis Ababa" class="no-outline" id="place" name="place" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $placeErr[0] ?? ''; ?></small>
                </div>
                <div class="input-container 
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        echo $teleErr ? 'error' : 'success';
                    } ?>">
                    <label for="tele">Phone </label>
                    <input type="tel" id="tele" name="mobile" placeholder="0911732375/+251911732375" value="<?php echo $tele ? $tele : '' ?>" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small> <?php echo $teleErr[0] ?? ''; ?>
                    </small>
                </div>
                <div class="input-container 
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        echo $emailErr ? 'error' : 'success';
                    } ?>">
                    <label for="mail">Email</label><br>
                    <input type="email" id="mail" name="E-mail" value="<?php echo $email ? $email : '' ?>" placeholder="Username@gmail.com" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $emailErr[0] ?? ''; ?></small>
                </div>