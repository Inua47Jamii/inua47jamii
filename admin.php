<?php
// Include your database connection
include('db_connection.php');

// Admin's email address
$adminEmail = "inua47jamii23@gmail.com";

// Check if the form is submitted (admin submitting the transaction code for verification)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['transactionCodeEntered'])) {
    $transactionCodeEntered = $_POST['transactionCodeEntered'];
    $applicationId = $_POST['applicationId']; // to identify which application this relates to

    // Fetch the application from the database using the applicationId
    $query = "SELECT * FROM job_applications WHERE id = '$applicationId'";
    $result = mysqli_query($conn, $query);

    // Check if the application is found
    if (mysqli_num_rows($result) > 0) {
        $application = mysqli_fetch_assoc($result);
        
        // Compare the entered transaction code with the one stored in the database
        if ($transactionCodeEntered === $application['transactionCode']) {
            // Send email to the user confirming the transaction code
            $userEmail = $application['email'];
            $fullName = $application['fullName'];
            $transactionCode = $application['transactionCode'];

            $subject = "Transaction Code Confirmation";
            $message = "Hello $fullName,\n\nYour transaction code for your job application is: $transactionCode.\n\nThank you for your application!";
            $headers = "From: $adminEmail";

            if (mail($userEmail, $subject, $message, $headers)) {
                echo "<p>Confirmation email sent to $userEmail.</p>";
            } else {
                echo "<p>Failed to send email. Please try again later.</p>";
            }
        } else {
            echo "<p>The transaction code entered does not match. Please try again.</p>";
        }
    } else {
        echo "<p>No application found for this ID. Please try again.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css"> <!-- Link to a separate CSS file for styling -->
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li> <!-- Add logout functionality -->
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Applications Overview</h2>
            <table id="applicationsTable">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>ID Number</th>
                      
                        <th>County</th>
                        <th>Job</th>
                        <th>Transaction Code</th>
                        <th>ID Photo</th>
                        <th>Confirm Transaction</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch applications from the database
                    $sql = "SELECT * FROM job_applications";
                    $result = mysqli_query($conn, $sql);

                    // Check if the query was successful
                    if ($result === false) {
                        // Query failed, output the error
                        echo "<tr><td colspan='10'>Error: " . mysqli_error($conn) . "</td></tr>";
                    } else {
                        // Check if there are any applications
                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$row['fullName']}</td>
                                        <td>{$row['phoneNumber']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['idNumber']}</td>
                                       
                                        <td>{$row['county']}</td>
                                        
                                        <td>{$row['job']}</td>
                                        <td>{$row['transactionCode']}</td>
                                        <td><a href='{$row['idPhoto']}' target='_blank'>View Photo</a></td>
                                        <td>
                                            <form method='POST' action=''>
                                                <input type='hidden' name='applicationId' value='{$row['id']}'>
                                                <input type='text' name='transactionCodeEntered' placeholder='Enter Transaction Code' required>
                                                <button type='submit'>Confirm</button>
                                            </form>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='11'>No applications found.</td></tr>";
                        }
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <!-- <footer>
        <p>All rights reserved. &copy; Copyright 2024</p>
    </footer> -->

    <script src="admin.js" defer></script> <!-- Link to a separate JS file for functionality -->
</body>
</html>
