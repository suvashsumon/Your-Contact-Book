<?php
    session_start();
    if (!isset($_SESSION['name'])) {
        header("location: index.php");
    }

?>

<!Doctype html>
<html>
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
            if ($_GET['verdict']=='wronginfo') {
                echo '<h4 style="background: red; text-align: center; padding: 10px; color: #fff;">Password does not match.</h4>';
            }
            else if ($_GET['verdict']=='noinput') {
                echo '<h4 style="background: lightblue; text-align: center; padding: 10px; color: #fff;">No input provided.</h4>';
            }
        }
    ?>
    </div>
<!--    end : body section          -->
    <section>
        <div class="row">

        
<!--        this div is for form       -->
        <div class="sign-up  col-lg-6">
            <form action="includes/accSetting.php" method="post">
                <legend class="col-lg-12">Settings</legend>
                <input name="name" class="col-lg-12  form-control" type="text" placeholder="<?php echo $_SESSION['name']; ?>" disabled>
                <input name="email" class="col-lg-12  form-control" type="email" placeholder="<?php echo $_SESSION['email']; ?>" disabled>
                <input name="phone" class="col-lg-12  form-control" type="text" placeholder="<?php echo $_SESSION['phone']; ?>" disabled>
                <input name="pass" class="col-lg-12  form-control" type="password" placeholder="New Password">
                <input name="repass" class="col-lg-12  form-control" type="password" placeholder="Confirm New Password">
                <button type="submit" class="col-lg-12 btn btn-info">Change Settings</button>
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