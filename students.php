<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- DOWNLOADED CSS -->
    <link rel="stylesheet" href="bootstrap/style.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.1/bootstrap-icons.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="toaster/toastr.min.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">

    <title>Student List | Page</title>
    <style>
        table th,
        table td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
        }

        table img {
            max-width: 75px;
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
                        <button type="button" class="dropdown-item text-uppercase text-danger fw-bold"
                            id="btn-logout">Logout<i class="bi bi-box-arrow-right mx-2"></i></button>
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
            <section class="list p-2">
                <?php include 'studentinfo.php'; ?>
            </section>

        </div>
    </div>

    <!-- DOWNLOADED JS -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="sweetalert/alert.js"></script>
    <script src="bootstrap/style.js"></script>
    <script src="js/logout.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#student-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
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
        });
    </script>

</body>

</html>
