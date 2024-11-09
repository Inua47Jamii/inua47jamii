<?php
// Include your database connection
include('db_connection.php');

// Fetch applications from the database
$sql = "SELECT * FROM applications";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['fullName']}</td>
                <td>{$row['phoneNumber']}</td>
                <td>{$row['email']}</td>
                <td>{$row['idNumber']}</td>
                <td>{$row['physicalLocation']}</td>
                <td>{$row['county']}</td>
                <td>{$row['jobLocation']}</td>
                <td>{$row['job']}</td>
                <td>{$row['transactionCode']}</td>
                <td><a href='{$row['idPhoto']}' target='_blank'>View Photo</a></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='10'>No applications found.</td></tr>";
}

mysqli_close($conn);
?>
