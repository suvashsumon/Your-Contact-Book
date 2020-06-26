<?php

    session_start();

    if (!isset($_SESSION['name'])) {
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contacts, View Contacts</title>
    <link rel="stylesheet" href="bootsrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="bootsrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="bootsrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <!--    header section start              -->
    <div class="nev-back">
        <div class="row heading">

            <div class="title col-lg-11 col-md-10">
                <h1>Your Contact Book</h1>
            </div>
            <div class="col-lg-1 col-md-2 user">
                <button class="menu-button" data-toggle="modal" data-target="#myModal">Menu</button>
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo $_SESSION['name']; ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <ul>
                                    <li><a href="#">Get CVF</a></li>
                                    <li><a href="pdfcreator/">Get PDF</a></li>
                                    <li><a href="setting.php">Account Setting</a></li>
                                    <li><a href="includes/logout.php">Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    header is done  -->

    <div>
    <?php
        if (isset($_GET['verdict'])) {
            if ($_GET['verdict']=='success') {
                echo '<h4 style="background: green; text-align: center; padding: 10px; color: #fff;">Contact Added</h4>';
            }
            else if ($_GET['verdict']=='tryagain') {
                echo '<h4 style="background: red; text-align: center; padding: 10px; color: #fff;">Something going wrong. Please try again.</h4>';
            }
            else if ($_GET['verdict']=='settingchanged') {
                echo '<h4 style="background: lightblue; text-align: center; padding: 10px; color: #fff;">Account Setting Changed.</h4>';
            }
        }
    ?>
    </div>
    <!--    add contact section is started here         -->
    <div class="container">
        <h2 style="margin-top:  10px;">Add Contact</h2>
        <hr />
        <form class="row"  action="includes/addContact.php" method="post">
            <input name="name" id="name" class="form-control" type="text" placeholder="Name" required>
            <input name="address" id="address" class="form-control" type="text" placeholder="Address">
            <input name="email" id="email" class="form-control" type="email" placeholder="Email">
            <input name="phone" id="phone" class="form-control" type="text" placeholder="Phone No">
            <input name="tags" id="tags" class="form-control" type="text" placeholder="Add tags separated by comma">
            <button class="btn btn-success" type="submit">Add to Contacts</button>
        </form>
    </div>
    <!--    add contacts end here       -->

    <!--    view contact start here         -->
    <div class="container">
        <div class="row">
            <h2 class="col-lg-8 col-md-8">View Contacts</h2>
            <form class="col-lg-4 col-md-8">
                <input class="form-control" type="text" placeholder="search">
            </form>
            <hr />
        </div>
        <table class="table" id="contactTable">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Tags</th>
            </tr>
            <?php
                $conn = mysqli_connect('localhost','root','','your_contact_book');
                $query = "SELECT * FROM ".$_SESSION['tablename'];
                $getContacts = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($getContacts)) {
                    echo "<tr>";
                    echo "<td>".$row['Contact_Name']."</td>";
                    echo "<td>".$row['Address_info']."</td>";
                    echo "<td>".$row['Email']."</td>";
                    echo "<td>".$row['Phone']."</td>";
                    echo "<td>".$row['Tags']."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
    <!--    view contact form is done       -->

    <!--footer is start from here-->
    <footer>
        <div>
            <p>Made By : <a href="http://suvashkumar.xyz">Suvash Kumar</a></p>
            <p><a href="#">Get Source in Github</a></p>
        </div>
    </footer>



    <script src="JQuery/jquery-3.5.1.min.js"></script>
    <script src="bootsrap/js/bootstrap.bundle.js"></script>
    <script src="bootsrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootsrap/js/bootstrap.js"></script>
    <script src="bootsrap/js/bootstrap.min.js"></script>
    <script src="javascript/app.js"></script>
</body>

</html>
