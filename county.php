<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenyan Counties</title>
    <link rel="stylesheet" href="county.css">
</head>

<body>
    <header>
        <h1>Registered Counties</h1>
        <p>Apply for a job opportunity at your current place of residence</p>
    </header>
    <section id="counties-list">
        <?php
        // Array of counties with descriptions and corresponding job roles
        $counties = [
            ["name" => "Nairobi County", "description" => "Below are the shortlisted enterprices whis has given opportunity. For the meantime,
            <br> our team is working on other areas in this county. We are sorry for the inconvinience: <br>
            Quickmatt super, Tuskeys, Moi avenue super market, Easmatt supper market, Maathai supermarket, Karrymart downtown super
",
             "jobs" => ["Software Developer", 
             "Accountant", 
             "Marketing Officer"]],
            
            
            ["name" => "Nakuru County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            ["name" => "Kisumu County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            ["name" => "Kisii County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Kiambu County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            ["name" => "Kericho County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            ["name" => "Homabay County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            ["name" => "Migori County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            ["name" => "Bomet County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            ["name" => "Narok County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Makueni County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            ["name" => "Kakamega County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Bungoma County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Busia County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Uasin Gishu County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            ["name" => "Migori County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Kilifi County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Kwale County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // // ["name" => "Tana River County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Lamu County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Wajir County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Mandera County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Marsabit County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Embu County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Tharaka-Nithi", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Machakos County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Nyeri County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Muranga County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Turkana County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Trans Nzoia County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Nandi County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Baringo County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Laikipia County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Kajiado County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Vihiga County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // ["name" => "Nyamira County", "description" => "Known for agriculture and farming.", "jobs" => ["Farm Manager", "Agricultural Officer", "Sales Agent"]],
            // // Add more counties as needed
        ];

        // Loop through counties and display each with a link to apply.php
        foreach ($counties as $county) {
            echo "
            <div class='county'>
                <h2>{$county['name']}</h2>
                <p>{$county['description']}</p>
                <a href='apply.php?county=" . urlencode($county['name']) . "&jobs=" . urlencode(implode(",", $county['jobs'])) . "'>Apply Here</a>
            </div>";
        }
        ?>
    </section>
    <a href="index.html">Home</a>
    <footer>
        <p>&copy; 2024 Inua Jamii Kenya</p>
    </footer>
</body>

</html>