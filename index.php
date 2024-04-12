<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVIRAA</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="bootstrap/style.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.1/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/style.css">
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
            </div>
            <button class="btn btn-sm fs-5"><a href="login.php"
                    class="text-decoration-none text-white">Login</a></button>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Header Start -->
    <header class="main-header section-padding">
        <div class="container">
            <div class="row">
                <i class="bi bi-clock text-center text-white fw-semibold mt-2 fs-1 "></i>
                <h1 class="text-center text-white fw-semibold mb-1 " id="current-time"></h1>
                <div class="col-lg-2 mx-2 col-md-12 rounded" id="video-container" style="background: rgba(0,0,0,0.0);">
                    <div class="text-center">
                        <p class="login-box-msg text-white"><i class="bi bi-qr-code-scan text-dark"></i> SCAN HERE</p>
                    </div>
                    <video id="preview" class="w-100 h-full rounded"></video>
                    <audio id="scan-sound" src="tone/qrcode.mp3" type="audio/mp3"></audio>
                </div>
                <div class="col-lg-9 col-md-12 mx-auto  rounded" style="background: rgba(0,0,0,0);">
                    <form action="checkin.php" method="post" class="form-horizontal text-white" id="form-container">
                        <label>YOUR CODE</label><i class="bi bi-arrow-down"></i>
                        <p id="time"></p>
                        <input type="text" name="studentID" id="qr-input" placeholder="Scan QR code"
                            class="form-control text-white" style="background: rgba(0,0,0,0.1);" autofocus>
                    </form>
                    <div class="rounded p-2" id="table-container">
                        <table id="attendance-table" style="background: rgba(0,0,0,0.1); color:white;">
                            <thead>
                                <tr>
                                    <th>IMAGE</th>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>SPORT</th>
                                    <th>ROLE</th>
                                    <th>Check In</th>
                                    <th>LOGDATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'attendance_rows.php'; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->


    <!-- JavaScript -->

    <!-- External Libraries -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Scripts -->
    <script src="js/scanner.js"></script>
    <script src="js/time.js"></script>
    <script src="js/main.js"></script>
</body>

</html>