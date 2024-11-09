<?php
// Include your database connection
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $idNumber = $_POST['idNumber'];
    $physicalLocation = $_POST['physicalLocation'];
    $county = $_POST['county'];
    $jobLocation = $_POST['jobLocation'];
    $job = $_POST['jobLocation'];
    $transactionCode = $_POST['transactionCode'];
    
    // Handle file upload
    $target_dir = "uploads/";  // Folder to store the photo
    $target_file = $target_dir . basename($_FILES["idPhoto"]["name"]);
    
    if (move_uploaded_file($_FILES["idPhoto"]["tmp_name"], $target_file)) {
        // The file was uploaded successfully
        $idPhoto = $target_file;
    } else {
        $idPhoto = NULL;  // If no file was uploaded
    }

    // Check if the transaction code is exactly 10 characters
    if (strlen($transactionCode) === 10) {
        // Check if the transaction code already exists in the database
        $query = "SELECT * FROM job_applications WHERE transactionCode = '$transactionCode'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Transaction code already exists
            echo "<p>Error: This transaction code has already been used. Please try again with a different code or make the payment.</p>";
        } else {
            // Store the application in the database if the transaction code is unique
            $sql = "INSERT INTO job_applications (fullName, phoneNumber, email, idNumber, idPhoto, physicalLocation, county, jobLocation, job, transactionCode)
                    VALUES ('$fullName', '$phoneNumber', '$email', '$idNumber', '$idPhoto', '$physicalLocation', '$county', '$jobLocation', '$job', '$transactionCode')";

            if (mysqli_query($conn, $sql)) {
                echo "<p>Application submitted successfully! Please, check your email for further direction</p>";
            } else {
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
            }
        }
    } else {
        echo "<p>Invalid transaction code. Please enter the code from the MPESA message directly.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submission</title>
    <link rel="stylesheet" href="submitapp.css">
</head>
<body>
    
    <p>Please not that, a successful payment will be reviewed and you will receive an email within less than 2 hours.</p>
    <a href="index.html" target="_blank">Home</a>
    <a href="county.php">Apply Again</a>
</body>
</html>
