<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Page </title>
    <!-- DOWNLOADED CSS -->
    <link rel="stylesheet" href="bootstrap/style.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.1/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="toaster/toastr.min.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">

</head>

<body style="background-image: url('images/matatags.jpg'); background-repeat: no-repeat; background-size:cover;">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top" style="background: rgba(0,0,0,0.1);">
        <div class="container">
        <div>
            <img src="images/lapu.png" alt="" style="width: 7%">
            <img src="images/deped.png" alt="" style="width: 7%">
            <img src="images/matatag.jpg" alt="" style="width: 9%" class="rounded">
        </div>            <button class="btn btn-sm fs-5"><a href="index.php"
                    class="text-decoration-none text-white"><i class="bi bi-arrow-right-square text-white fs-3"></i></a></button>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Login Start -->
    <section class="register section-padding">
        <div class="container mt-5">
            <div class="register-wrap p-5">
                <div class="row mt-5">
                    <div class="col-lg-4 m-auto wrapper rounded" style="background: rgba(0,0,0,0.2);">
                        <h2 class="text-center fw-semibold mt-2 text-white  mb-4">Sign in</h2>
                        <form action="logindata.php" method="post" >
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-key"></i></span>
                                <input type="text" id="studentID" name="studentID" class="form-control" placeholder="ID NUMBER" required>
                            </div>
                            <input class="btn btn-sm btn-primary mb-3" type="submit" value="Login">
                        </form>
                    </div>
                    <?php
                    session_start();
                    if (isset($_SESSION['error'])) {
                        echo '<div class="text-center text-warning">' . $_SESSION['error'] . '</div>';
                        unset($_SESSION['error']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Login End -->

     <!-- External Libraries -->
     <script src="plugins/jquery/jquery.min.js"></script>
     <script src="bootstrap/style.js"></script>
</body>

</html>