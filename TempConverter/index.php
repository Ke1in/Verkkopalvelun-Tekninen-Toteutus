<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Temperature Converter</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Temperature Converter</h1>
    <form method="POST">
        <input type="number" name="temperature" step="any" required placeholder="Enter temperature">
        <select name="from">
            <option value="Celsius">Celsius</option>
            <option value="Fahrenheit">Fahrenheit</option>
            <option value="Kelvin">Kelvin</option>
            <option value="Rankine">Rankine</option>
        </select>
        <select name="to">
            <option value="Celsius">Celsius</option>
            <option value="Fahrenheit">Fahrenheit</option>
            <option value="Kelvin">Kelvin</option>
            <option value="Rankine">Rankine</option>
        </select>
        <button type="submit">Convert</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temperature = $_POST['temperature'];
        $from = $_POST['from'];
        $to = $_POST['to'];

        if (!is_numeric($temperature)) {
            echo "<h2>Please enter a valid numeric temperature.</h2>";
            exit;
        }

        function convertTemperature($temp, $from, $to) {
            switch ($from) {
                case "Celsius":
                    if ($to == "Fahrenheit") return ($temp * 9/5) + 32;
                    if ($to == "Kelvin") return $temp + 273.15;
                    if ($to == "Rankine") return ($temp + 273.15) * 9/5;
                    break;
                case "Fahrenheit":
                    if ($to == "Celsius") return ($temp - 32) * 5/9;
                    if ($to == "Kelvin") return ($temp - 32) * 5/9 + 273.15;
                    if ($to == "Rankine") return $temp + 459.67;
                    break;
                case "Kelvin":
                    if ($to == "Celsius") return $temp - 273.15;
                    if ($to == "Fahrenheit") return ($temp - 273.15) * 9/5 + 32;
                    if ($to == "Rankine") return $temp * 9/5;
                    break;
                case "Rankine":
                    if ($to == "Celsius") return ($temp - 491.67) * 5/9;
                    if ($to == "Fahrenheit") return $temp - 459.67;
                    if ($to == "Kelvin") return $temp * 5/9;
                    break;
            }
            return "Conversion not possible.";
        }

        $convertedTemperature = convertTemperature($temperature, $from, $to);
        echo "<h2>$temperature °$from is equal to $convertedTemperature °$to</h2>";
    }
    ?>
</body>
</html>