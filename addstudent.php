<?php session_start(); ?>
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
    <link rel="icon" type="image/x-icon" href="images/logo.png">

    <title>Add Student | Page</title>

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
                        Add User</a>
                    </li>
                    <li class="text-white mb-2">
                    <i class="bi bi-card-list"></i><a href="students.php"
                            class="a text-decoration-none px-2">
                            User List</a>
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
            <section class="addstudent">
                <div class="container mt-3">
                    <div class="register-wrap p-3">
                        <div class="row rounded">
                            <div class="col-lg-12 m-auto bg-white wrapper rounded">
                                <h3 class="text-center fw-semibold p-3">Add New User</h3>
                                <form id="student-form" method="post" action="studentdata.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-card-list"></i></span>
                                                <input type="text" id="studentID" name="studentID" class="form-control" placeholder="Student ID">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="text" id="firstName" class="form-control" placeholder="First Name" name="firstName">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="text" id="middleName" class="form-control" placeholder="Middle Name" name="middleName">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-gender"></i></span>
                                                <select id="gender" name="gender" class="form-select">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="text" id="lastName" class="form-control" placeholder="Last Name" name="lastName">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                                <input type="text" id="age" class="form-control" placeholder="Age" name="age">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-trophy"></i></span>
                                                <input type="text" id="sport" class="form-control" placeholder="Sport" name="sport">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-person-check"></i></span>
                                                <select id="role" name="role" class="form-select">
                                                    <option value="">Select Role</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Teacher">Coach</option>
                                                    <option value="Staff">Committee</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-image"></i></span>
                                                <input type="file" id="image" name="image" class="form-control p-2">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="submit" value="Submit" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>


    <!-- DOWNLOADED JS -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="toaster/toastr.min.js"></script>
    <script src="sweetalert/alert.js"></script>
    <script src="js/logout.js"></script>
    <script src="main.js"></script>
    <script src="bootstrap/style.js"></script>
    <script src="js/form.js"></script>
    <?php include 'success.php'; ?>
</body>

</html>