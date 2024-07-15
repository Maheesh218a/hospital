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
        <title>Home</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="body">
        <a href="addNewPatient.php" class="add-patient-btn">
            <button class="btn btn-outline-info col-12 mb-2">Add New Patient</button> <br class="mb-2 mt-1">
        </a>

        <div class="form_box" id="form">
            <form action="token.php" method="POST" class="form">
                Patient Name:<input type="pname" class="form-control" name="pname" placeholder="Patient Name" required>

                </select><br>

                <?php
                $doctor_rs = Database::search("SELECT * FROM `doctor`");
                $doctor_num = $doctor_rs->num_rows;
                $doctor_data = $doctor_rs->fetch_assoc();
                ?>
                Doctor Name:<input type="dname" class="form-control" name="dname" placeholder="<?php echo $doctor_data ["f_name"] . " " . $doctor_data["l_name"];?>" readonly>

                </select>
                <br>
                Appointment Date: <input type="date" class="form-control" name="appointmentDate" required>
                <button type="submit" class="mt-4 btn btn-outline-info">Submit Appointment</button>
            </form>
        </div>

        <script src="script.js"></script>
        <script>
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('appointment-date').setAttribute('min', today);
        </script>
    </body>

    </html>

<?php
} else {

    header("Location:index.php");
    exit();
}

?>