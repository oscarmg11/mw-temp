
<?php
    require_once "conexion.php";

    $connection=conexion();

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $td = date("Y-m-d");
    $api_key_value = "tPmAT5Ab3j7F9";
    //$td = '2021-03-28';

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        
    
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
    
        if($queries['last'] == 'true'){
            $sql = "SELECT timeStamp, temperature, humidity, pressure FROM monitor WHERE lugar = " . $queries['place'] . " AND timeStamp BETWEEN '" . $td . " 00:00:00' AND '" . $td . " 23:59:59' ORDER BY id DESC LIMIT 1";
        }else{
            $sql = "SELECT timeStamp, temperature, humidity, pressure FROM monitor WHERE lugar = " . $queries['place'] . " AND timeStamp BETWEEN '" . $td . " 00:00:00' AND '" . $td . " 23:59:59' ORDER BY id DESC";
        }
        
        $result= mysqli_query($connection, $sql);

        $connection->close();
    
        $valoresX=array();
        $valoresTemperature=array();
        $valoresHumidity=array();
        $valoresPressure=array();
    
        while ($ver=mysqli_fetch_row($result)){
            $valoresX[]=$ver[0];
            $valoresTemperature[]=$ver[1];
            $valoresHumidity[]=$ver[2];
            $valoresPressure[]=$ver[3];
        }
    
        $res = array(
            'tiempo' => json_encode($valoresX),
            'datosTemperature' => json_encode($valoresTemperature),
            'datosHumedad' => json_encode($valoresHumidity),
            'datosPresion' => json_encode($valoresPressure)
        );
       
        echo json_encode( $res);
    }else if($_SERVER['REQUEST_METHOD'] == "POST"){
        if($api_key_value == test_input($_POST["api_key"])){
            $temperature = test_input($_POST["temperature"]); 
            $pressure = test_input($_POST["pressure"]);
            $humidity = test_input($_POST["humidity"]);
            $place = test_input($_POST["place"]);
    
            $sql = "INSERT INTO monitor (temperature, pressure, humidity, lugar) VALUES ('" . $temperature . "', '" . $pressure. "','" . $humidity . "','" . $place . "')";
            $connection->close();

            $result= mysqli_query($connection, $sql);
    
            if($result) { echo "New record updatedd successfully"; }
            else{ echo "Error: " . $sql . "<br>" . $conn->error; }
        }
        else{ echo "Wrong API Key provided."; }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
?>