<?php

$servername = "localhost";
$dbname = "clicklag_MW";
$username = "clicklag_MW";
$password = "Controler2017";

$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $temperature = $pressure = $humidity;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if ($api_key == $api_key_value) {
        $temperature = test_input($_POST["temperature"]); //
        $pressure = test_input($_POST["pressure"]); //
        $humidity = test_input($_POST["humidity"]); //
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO monitor (temperature, pressure, humidity)
        VALUES ('" . $temperature . "', '" . $pressure. "','" . $humidity . "')";

      
        if ($conn->query($sql) === TRUE) {
            echo "New record updatedd successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        echo "Wrong API Key provided.";
    }
} else {
    echo "No data posted with HTTP POST.";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
