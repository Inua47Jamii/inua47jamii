<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link rel="stylesheet" href="apply12.css">
</head>
<body>
        <!-- Header -->
    <header>
        <h1>Application Form</h1>
        <p>Apply for a job opportunity at your residential county</p>
    </header>
    <main>
        <p>Dear Applicant, kindly ensure you pay the application and verification fee amount indicated below.
            <br>
            Failure to pay or pasting invalid code will not guarantee you a chance
            <br>Also note that everyone who apply will have job. incase of more employees in one station, they will work in a shift manner and payment will be done as
            indicated in the county terms and conditions.
        </p>
        <section id="application-form">
            <?php
            // Retrieve county name and jobs from URL parameters
            $county = isset($_GET['county']) ? $_GET['county'] : 'Select a County';
            $jobs = isset($_GET['jobs']) ? explode(",", $_GET['jobs']) : [];

            echo "<h2>Apply to {$county}</h2>";
            ?>

            <form action="submit_application.php" method="POST" enctype="multipart/form-data">
                <!-- Personal Information -->
                 <div>
                    <h4>FEE Ksh. 450</h4>
                    <h5>payment procedure</h5>
                    <p>
                            <li>
                                Go to Mpesa STK/ToolKit/Mpesa APP or Dial *334#
                            </li>
                            <li>
                                Send money to the Manager 
                                <br>
                            Number: <b>0796942286</b> 
                            <br>Name: <b>SIBORA KEBENEI</b>
                            </li>
                            <li>Wait for Mpesa meassage. Coppy the transaction code</li>
                            <li>Paste the code e.g. STHYUI67HA in the last field/ space in the form below</li>
                            <li>Submit your form. <em>Ensure you provide correct details</em></li>
                        
                    </p>
                    <hr>
                 </div>
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phoneNumber" pattern="[0-9]{10}" required placeholder="0712345678">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="abcde@gmail.com" required>

                <label for="idNumber">ID/Maisha Number:</label>
                <input type="text" id="idNumber" name="idNumber" placeholder="same as Card No." required>

                <label for="idPhoto">Front Side of ID Card Photo:</label>
                <input type="file" id="idPhoto" name="idPhoto" accept="image/*" required>

                <label for="location">Current Location:</label>
                <input type="text" id="location" name="physicalLocation" placeholder="palce of recident" required>

                <label for="county">County of Origin:</label>
                <select id="county" name="county" required>
                    <option value="">Select your county</option>
                    <option value="Mombasa">Mombasa</option>
                    <option value="Kwale">Kwale</option>
                    <option value="Kilifi">Kilifi</option>
                    <option value="Tana River">Tana River</option>
                    <option value="Lamu">Lamu</option>
                    <option value="Taita/ Taveta">Taita/ Taveta</option>
                    <option value="Garissa">Garissa</option>
                    <option value="Wajir">Wajir</option>
                    <option value="Mandera">Mandera</option>
                    <option value="Marsabit">Marsabit</option>
                    <option value="Isiolo">Isiolo</option>
                    <option value="Meru">Meru</option>
                    <option value="Tharaka-Nthi">Tharaka-Nthi</option>
                    <option value="Embu">Embu</option>
                    <option value="Kitui">Kitui</option>
                    <option value="Machakos">Mahackos</option>
                    <option value="Makueni">Makueni</option>
                    <option value="Nyandarua">Nyandarua</option>
                    <option value="Nyeri">Nyeri</option>
                    <option value="Kirinyaga">Kirinyaga</option>
                    <option value="Murang'a">Murang'a</option>
                    <option value="Kiambu">Kiambu</option>
                    <option value="Turkana">Turkana</option>
                    <option value="West Pokot">West Pokot</option>
                    <option value="Samburu">Samburu</option>
                    <option value="Trans-Nzoia">Trans-Nzoia</option>
                    <option value="Uasin Gishu">Uasin Gishu</option>
                    <option value="Egeyo/ Marakwet">Egeyo/ Marakwet</option>
                    <option value="Nandi">Nandi</option>
                    <option value="Baringo">Baringo</option>
                    <option value="Laikipia">Laikipia</option>
                    <option value="Narok">Narok</option>
                    <option value="Nakuru">Nakuru</option>
                    <option value="Kajiado">Kajiado</option>
                    <option value="Kericho">Kericho</option>
                    <option value="Bomet">Bomet</option>
                    <option value="Kakamega">Kakamega</option>
                    <option value="Vihiga">Vihiga</option>
                    <option value="Bungoma">Bungoma</option>
                    <option value="Busia">Busia</option>
                    <option value="Siaya">Siaya</option>
                    <option value="Kisumu">Kisumu</option>
                    <option value="Homabay">Homabay</option>
                    <option value="Migori">Migori</option>
                    <option value="Kisii">Kisii</option>
                    <option value="Nyamira">Nyamira</option>
                    <option value="Nairobi">Nairobi</option>

                </select>

                <!-- Job Selection -->
                <label for="job">Job Applying For:</label>
                <select id="job" name="jobLocation" required>
                    <option value="">Select a job role</option>
                    <?php
                    // Populate the job options dynamically
                    foreach ($jobs as $job) {
                        echo "<option value='{$job}'>{$job}</option>";
                    }
                    ?>
                </select>

                <!-- Submit -->
                <label for="transactionCode">Transaction Code (Payment Verification):</label>
            <input type="text" id="transactionCode" name="transactionCode" placeholder="e.g. STHYUI67HA" required>

            <button type="submit">Submit Application</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Inua Jamii Kenya</p>
    </footer>
</body>
</html>
