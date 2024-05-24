<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap V5.2 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

</head>

<body>
    <!-- navbar -->
    <nav class="navbar bg-body-tertiary p-3" style="background-color:#404040">
        <a class="navbar-brand" href="#">
            <img src="assets/images/university-of-bradford-white-logo.png" width="200" height="50">
        </a>
    </nav>

    <!-- a form for admin login -->
    <div class="container">
        <div id="email-box">
            <h1>Admin Login</h1>
            <form id="form" action="controller/login-validate.php" method="post">
                <div class="input-group">

                    <div class="input-field" style="width:100%;">

                        <input required type="text" name="email" style="width:100%;" placeholder="Email (Eg. jrblogg2@bradford.ac.uk)" id="index-input" pattern="[a-z0-9._%+-]+@bradford.ac.uk$" title="Copy same format as example">


                    </div>



                    <div class="input-field" style="width:100%;">

                        <input type="password" style="width:100%;" placeholder="Password" id="index-input" name="password">
                    </div>

                    <div class="btn-field">
                        <button type="submit">Proceed</button>
                    </div>

                </div>
                <?php
                session_start();
                //display login errors if there is any
                if (isset($_SESSION['invalid_login'])) { ?>
                    <div style="color:red;"><?= $_SESSION['invalid_login'] ?></div>
                <?php
                    unset($_SESSION['invalid_login']);
                }
                ?>

                <a href="includes/forgotPassword.php">Forgot your password?<br>We'll send a new one to your email.</a>
            </form>
        </div>
    </div>

</body>

</html>