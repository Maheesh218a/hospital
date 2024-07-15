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
        <title>Add Patient</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="body">

        <div class="container my-5">
            <div class="card mt-6">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">Add New Patient</h5>
                </div>
                <div class="card-body">

                    <div class="row col-12">
                        <div class="col-md-6  mt-3">
                            <label class="form-label" for="fname">Patient First Name</label>
                            <input type="text" class="form-control" id="fname" placeholder="Enter Patient First Name">
                        </div>
                        <div class="col-md-6  mt-3">
                            <label class="form-label" for="lname">Patient Last Name</label>
                            <input type="text" class="form-control" id="lname" placeholder="Enter Patient Last Name">
                        </div>
                    </div>

                    <div class="row col-12">
                        <div class="col-md-6  mt-3">
                            <label class="form-label" for="contact">Patient Contact Number</label>
                            <input type="text" class="form-control" id="contact" placeholder="Enter Patient Contact Number">
                        </div>
                        <div class="col-md-6  mt-3">
                            <label class="form-label" for="age">Patient Age</label>
                            <input type="text" class="form-control" id="age" placeholder="Enter Patient Age">
                        </div>
                    </div>

                    <div class="row col-12">
                        <div class="col-md-6  mt-3">
                            <label class="form-label" for="nic">Patient NIC Number</label>
                            <input type="text" class="form-control" id="nic" placeholder="Enter Patient NIC Number">
                        </div>
                        <div class="col-md-6  mt-3">
                            <label class="form-label" for="gender">Patient Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="0">Select Gender</option>
                                <?php

                                $gender_rs = Database::search("SELECT * FROM `gender`");
                                $gender_num = $gender_rs->num_rows;

                                for ($i = 0; $i < $gender_num; $i++) {
                                    $gender_data = $gender_rs->fetch_assoc();

                                ?>
                                    <option value="<?php echo $gender_data["id"]; ?>"><?php echo $gender_data["gender_name"] ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>
                    </div>

                    <button class="btn btn-outline-info mb-3 mt-3" onclick="addNewPatient();">Save Patient</button>

                </div>
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