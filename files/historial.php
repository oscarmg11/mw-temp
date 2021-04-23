
<?php
    require_once "conexion.php";

    $connection=conexion();

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');

    $td = date("Y-m-d");
    $api_key_value = "tPmAT5Ab3j7F9";

    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);

    if($queries['apiKey'] == $api_key_value){
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);

        $sql = "SELECT timeStamp, temperature, humidity, pressure FROM monitor WHERE lugar = " . $queries['place'] . " AND timeStamp BETWEEN '" . $queries['from'] . " 00:00:00' AND '" . $queries['to'] . " 23:59:59' ORDER BY id DESC LIMIT 1";
        
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
    }
    else{ echo "Wrong API Key provided."; }

?>