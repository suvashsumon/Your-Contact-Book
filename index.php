<?php
    session_start();
    if (isset($_SESSION['name'])) {
        header("location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Contact Book | Save your contact safely</title>
    <link rel="stylesheet" href="bootsrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootsrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="bootsrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="bootsrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!--    header section start              -->
    <header>
        <h1>Your Contact Book</h1>
    </header>
<!--    header section end              -->
 <div>
    <?php
        if (isset($_GET['verdict'])) {
            if ($_GET['verdict']=='noaccount') {
                echo '<h4 style="background: red; text-align: center; padding: 10px; color: #fff;">No Record Found. Please Register.</h4>';
            }
            else if ($_GET['verdict']=='passnotmatch') {
                echo '<h4 style="background: red; text-align: center; padding: 10px; color: #fff;">Password does not match. Please correct it.</h4>';
            }
            else if ($_GET['verdict']=='hasaccount') {
                echo '<h4 style="background: red; text-align: center; padding: 10px; color: #fff;">You already have an account. Please log in.</h4>';
            }
        }
    ?>
</div>
<!--    end : body section          -->
    <section>
        <div class="row">
<!--        this div is for log in        -->
        <div class="log-in col-lg-6">
            <form action="includes/login.php" method="post">
                <legend class="col-lg-12">Log In</legend>
                <input name="email" class="col-lg-12 form-control" type="email" placeholder="Email" required>
                <input  name="pass" class="col-lg-12  form-control" type="password" placeholder="Password" required>
                <button class="col-lg-12 btn btn-success">Log In</button>
                <p class="col-lg-12">Not registerd yet? Create Account First.</p>
                <p class="col-lg-12">Lost password? <a href="#">Click here to get password via email.</a></p>
            </form>
        </div>
<!--        this div is for sign up       -->
        <div class="sign-up  col-lg-6">
            <form action="includes/register.php" method="post">
                <legend class="col-lg-12">Register</legend>
                <input name="name" class="col-lg-12  form-control" type="text" placeholder="Name" required>
                <input name="email" class="col-lg-12  form-control" type="email" placeholder="Email" required>
                <input name="phone" class="col-lg-12  form-control" type="text" placeholder="Phone No">
                <input name="pass" class="col-lg-12  form-control" type="password" placeholder="Password" required>
                <input name="repass" class="col-lg-12  form-control" type="password" placeholder="Confirm Password" required>
                <button class="col-lg-12 btn btn-info">Register</button>
            </form>
        </div>
            </div>
    </section>
<!--    end body section                -->
    
    <footer>
        <div>
            <p>Made By : <a href="http://suvashkumar.xyz">Suvash Kumar</a></p>
            <p>Get Source in Github</p>
        </div>
    </footer>
    <script src=""></script>
</body>
</html>
