<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qrcodedb";

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $studentID = $_POST['studentID'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $sport = $_POST['sport']; // Added SPORT field
    $gender = $_POST['gender'];
    $role = $_POST['role']; // Added ROLE field

    // Handle image upload
    $imagePath = ''; // Initialize variable to store image path
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tempName = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imagePath = 'images/' . $imageName; // Update with your desired path to store images
        move_uploaded_file($tempName, $imagePath);
    }

    // Prepare insert statement
    $sql = "INSERT INTO student (STUDENTID, FIRSTNAME, MNAME, LASTNAME, AGE, SPORT, GENDER, ROLE, IMAGE_PATH) 
            VALUES ('$studentID', '$firstName', '$middleName', '$lastName', '$age', '$sport', '$gender', '$role', '$imagePath')";

    // Execute insert statement
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Student added successfully';
        header("Location: addstudent.php"); // Redirect to add_student.html on success
        exit;
    } else {
        $_SESSION['error'] = 'Error adding student: ' . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>