<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battery Efficiency Classifier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="number"], input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .results {
            margin-top: 20px;
        }
        .results div {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .efficient {
            background-color: #d4edda;
            color: #155724;
        }
        .good {
            background-color: #fff3cd;
            color: #856404;
        }
        .bad {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Battery Efficiency Classifier</h1>
    <form action="index.php" method="POST">
        <div class="form-group">
            <label for="numBatteries">Enter the number of batteries:</label>
            <input type="number" id="numBatteries" name="numBatteries" required min="1">
        </div>
        <div class="form-group">
            <label for="calcEfficiency">Would you like to calculate battery efficiency?</label>
            <input type="radio" name="calcEfficiency" value="yes" checked> Yes
            <input type="radio" name="calcEfficiency" value="no"> No
        </div>
        <div class="form-group">
            <label for="calcCost">Would you like to calculate the cost to replace bad batteries (less than 40%)?</label>
            <input type="radio" name="calcCost" value="yes" checked> Yes
            <input type="radio" name="calcCost" value="no"> No
        </div>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numBatteries = intval($_POST['numBatteries']);
        $calcEfficiency = $_POST['calcEfficiency'];
        $calcCost = $_POST['calcCost'];
        $badBatteryCost = 2; // Cost of replacing one bad battery
        $totalCost = 0;
        $badBatteryCount = 0;

        // Only calculate efficiencies if user chooses "yes"
        if ($calcEfficiency == "yes") {
            echo '<div class="results">';
            
            // Generate and classify random efficiencies
            for ($i = 0; $i < $numBatteries; $i++) {
                $batteryEfficiency = rand(0, 100); // Random efficiency between 0 and 100
                
                // Classify efficiency
                if ($batteryEfficiency >= 80) {
                    echo '<div class="efficient">Battery ' . ($i + 1) . ': ' . $batteryEfficiency . '% - Efficient</div>';
                } elseif ($batteryEfficiency >= 40 && $batteryEfficiency < 80) {
                    echo '<div class="good">Battery ' . ($i + 1) . ': ' . $batteryEfficiency . '% - Good</div>';
                } else {
                    echo '<div class="bad">Battery ' . ($i + 1) . ': ' . $batteryEfficiency . '% - Bad</div>';
                    $badBatteryCount++; // Increment bad battery count
                }
            }

            echo '</div>';
        }

        // If the user wants to calculate the cost
        if ($calcCost == "yes") {
            $totalCost = $badBatteryCount * $badBatteryCost; // Total cost to replace bad batteries

            echo '<div class="results">';
            echo '<div>Total bad batteries (efficiency less than 40%): ' . $badBatteryCount . '</div>';
            echo '<div>Total cost to replace bad batteries: $' . $totalCost . '</div>';
            echo '</div>';
        }
    }
    ?>
</div>

</body>
</html>