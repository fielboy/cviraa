<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- DOWNLOADED CSS -->
    <link rel="stylesheet" href="bootstrap/style.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.1/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="toaster/toastr.min.css">
    <link rel="icon" type="image/x-icon" href="">

    <title>Admin Dashboard | Page</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <!-- Start Side bar -->
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box p-1">
                <h1 class="text-center fw-bold mt-2">DAILY TIME RECORD</h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                        class="bi bi-justify"></i></button>
            </div>
            <hr class="h-color mx-1">
            <div class="py-1">
                <ul class="list-unstyled px-3">
                    <li class="text-white mb-2">
                        <i class="bi bi-bar-chart-fill"></i><a href="dashboard.php" class="a text-decoration-none px-2">
                            Dashboard</a>
                    </li>

                    <li class="text-white mb-2">
                        <i class="bi bi-people-fill"></i><a href="addstudent.php" class="a text-decoration-none px-2">
                            Add Student</a>
                    </li>
                    <li class="text-white mb-2">
                    <i class="bi bi-card-list"></i><a href="students.php"
                            class="a text-decoration-none px-2">
                            Student List</a>
                    </li>
                    <li class="text-white mb-2">
                        <i class="bi bi-building-fill-check"></i><a href="records.php"
                            class="a text-decoration-none px-2">
                            Check In</a>
                    </li>

                    <hr class="h-color mx-1">
                    <ul class="list-unstyled px-3">
                        <button type="button" class="dropdown-item text-uppercase text-danger fw-bold" id="btn-logout">Logout<i
                                class="bi bi-box-arrow-right mx-2"></i></button>
                    </ul>
            </div>
        </div>
        <!-- End Side Bar -->
        <div class="content">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <div class="d-flex justify-content-space-between">
                        <img class="logo" src="images/logo.png">
                    </div>
                </div>
            </nav>
            <section class="list p-3">
    <?php
    // Establish a database connection
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qrcodedb"; // Replace "your_database_name" with your actual database name

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Initialize variables to store student data
    $id = $studentID = $firstName = $middleName = $lastName = $age = $sport = $role = $gender = "";

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data and update the student record
        $id = $_POST['id']; // Include ID in the form as a hidden field
        $studentID = $_POST['studentID'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $sport = $_POST['sport'];
        $role = $_POST['role']; // Added role field
        $gender = $_POST['gender'];


        // Prepare update query
        $sql = "UPDATE student SET STUDENTID=?, FIRSTNAME=?, MNAME=?, LASTNAME=?, AGE=?, SPORT=?, ROLE=?, GENDER=? WHERE ID=?";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssi", $studentID, $firstName, $middleName, $lastName, $age, $sport, $role, $gender, $id);

        // Execute the update query
        if ($stmt->execute()) {
            echo "Record updated successfully";
            // Redirect to studentlist.php after successful update
            echo "<script>window.location = 'students.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        

        // Close statement
        $stmt->close();
    }

    // Fetch student data from the database
    if (isset($_GET['id'])) {
        $student_id = $_GET['id'];
        $sql = "SELECT ID, STUDENTID, FIRSTNAME, MNAME, LASTNAME, AGE, SPORT, ROLE, GENDER FROM student WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch student data
            $row = $result->fetch_assoc();
            $id = $row['ID'];
            $studentID = $row['STUDENTID'];
            $firstName = $row['FIRSTNAME'];
            $middleName = $row['MNAME'];
            $lastName = $row['LASTNAME'];
            $age = $row['AGE'];
            $sport = $row['SPORT'];
            $role = $row['ROLE']; // Fetch role data
            $gender = $row['GENDER'];
        } else {
            echo "No student found";
        }

        // Close statement
        $stmt->close();
    }
    ?>


    <!-- Update Form -->
    <form id="student-form" class="bg-white p-3 rounded"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        enctype="multipart/form-data" onsubmit="return validateForm()">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <h3 class="text-center mb-4">Update User</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-card-list"></i></span>
                    <input type="text" id="studentID" name="studentID" class="form-control"
                        placeholder="Student ID" value="<?php echo $studentID; ?>">

                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" id="firstName" class="form-control" placeholder="First Name"
                        name="firstName" value="<?php echo $firstName; ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" id="middleName" class="form-control" placeholder="Middle Name"
                        name="middleName" value="<?php echo $middleName; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" id="lastName" class="form-control" placeholder="Last Name"
                        name="lastName" value="<?php echo $lastName; ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input type="text" id="age" class="form-control" placeholder="Age" name="age"
                        value="<?php echo $age; ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-trophy"></i></span>
                    <input type="text" id="sport" class="form-control" placeholder="Sport" name="sport"
                        value="<?php echo $sport; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" id="role" class="form-control" placeholder="Role" name="role"
                        value="<?php echo $role; ?>"> <!-- Add role field -->
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-gender"></i></span>
                    <select id="gender" name="gender" class="form-select">
                        <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female
                        </option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-image"></i></span>
                    <input type="file" id="image" name="image" class="form-control p-2">
                </div>
                <div class="input-group mb-3">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
</section>
        </div>
    </div>


    <!-- DOWNLOADED JS -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="js/chartdata.js"></script>
    <script src="js/chart.js"></script>
    <script src="toaster/toastr.min.js"></script>
    <script src="sweetalert/alert.js"></script>
    <script src="bootstrap/style.js"></script>

    <script>
        $(document).ready(function () {
            $('.open-btn').on('click', function () {
                $('.sidebar').addClass('active');
            });

            $('.close-btn').on('click', function () {
                $('.sidebar').removeClass('active');
            });

            $(document).on('click', function (event) {

                if (!$(event.target).closest('.sidebar, .open-btn').length) {

                    $('.sidebar').removeClass('active');
                }
            });


            // Logout functionality
            $('#btn-logout').on('click', function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be logged out!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, logout'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform logout action using AJAX
                        $.ajax({
                            url: 'logout.php',
                            method: 'POST',
                            success: function () {
                                // Redirect to the login page after logout
                                window.location.replace('login.php');
                            },
                            error: function (xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>
