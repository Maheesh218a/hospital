<?php
include "connection.php";
session_start();

if (isset($_SESSION["u"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Token</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="body">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-bold text-center">Your Appointment Successfully</h5>
                <br>
                <p class="card-text text-center">
                    Patient Name: <?php echo $_POST["pname"]; ?><br>
                    Doctor Name: <?php echo $_POST["dname"]; ?> <br>
                    Appointment Date: <?php echo $_POST["appointmentDate"]; ?>
                </p>
                <p class="card-text text-center">
                    <a href="newPatient.php" class="card-link">New Appointment</a>
                    <a href="home.php" class="card-link">Home Page</a>
                </p>

            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {

    header("Location:index.php");
    exit();
}

?>