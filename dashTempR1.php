<div id="graficaLineal"></div>

<script src="classes/plotly-latest.min.js"></script>


<?php

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
//2019-11-26 12:22:06
$td = date("Y-m-d");

 require_once "conexion.php";
 $conexion=conexion();

 
 //$sql = "SELECT timeStamp, value1, value2, value3 FROM datalogger WHERE timeStamp BETWEEN '2020-06-12' AND '2020-07-16' ";
 //WHERE timeStamp LIKE '%$td%'ORDER BY id DESC
 $sql = "SELECT timeStamp, temperature FROM monitor";
 $result= mysqli_query($conexion,$sql);
 $valoresX=array();
 $valoresY=array();


 while ($ver=mysqli_fetch_row($result)){
     $valoresX[]=$ver[0];
     $valoresY[]=$ver[1];

 }

 $datosX=json_encode($valoresX);
 $datosY=json_encode($valoresY);



?>

<script type="text/javascript">
    function crearCadenaLineal(json){
        var parsed=JSON.parse(json);
        var arr = [];
        for (var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
	}
</script>

<script type="text/javascript">

    datosX=crearCadenaLineal('<?php echo $datosX ?>');
    datosY=crearCadenaLineal('<?php echo $datosY ?>');

    var trace= {
        x: datosX,
        y: datosY,
        type: 'scatter',
        line: {shape: 'spline'},
        connectgaps: true,
        fill: 'tonexty', //'tozeroy',
        
        line: {
        color: 'white',
        width: 3
        }
    };
    var layout = {
      title:'Temperatura',
      xaxis: {
        title: 'Tiempo'
      },
      yaxis: {
        title: 'Grados *C'
      },
      paper_bgcolor: "black",
      //paper_bgcolor='LightSteelBlue',
      plot_bgcolor: "rgba(0,0,0,0)",
      font: {
        family: 'Arial',
        size: 12,
        color: 'white'
      }
    };
    var data = [trace];
    Plotly.newPlot('graficaLineal', data, layout);
    
</script>