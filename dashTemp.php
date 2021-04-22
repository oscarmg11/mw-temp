

<table style="width:100%">
  <tr>
    <th><div id="gTemp"></div></th>
    <th><div id="gPre"></div></th>
    <th><div id="gHum"></div></th>
  </tr>

</table> 
<div id="graficaLinealTemp"></div>
    <div id="graficaLinealPres"></div>
    <div id="graficaLinealHum"></div>
 





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
 $sql = "SELECT timeStamp, temperature FROM monitor WHERE timeStamp LIKE '%$td%'ORDER BY id DESC";
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
    Plotly.newPlot('graficaLinealTemp', data, layout);
    
</script>





<?php

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
//2019-11-26 12:22:06
$td = date("Y-m-d");

 require_once "conexion.php";
 $conexion=conexion();

 
 //$sql = "SELECT timeStamp, value1, value2, value3 FROM datalogger WHERE timeStamp BETWEEN '2020-06-12' AND '2020-07-16' ";
 //WHERE timeStamp LIKE '%$td%'ORDER BY id DESC
 $sql = "SELECT timeStamp, humidity FROM monitor WHERE timeStamp LIKE '%$td%'ORDER BY id DESC";
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
      title:'Humedad',
      xaxis: {
        title: 'Tiempo'
      },
      yaxis: {
        title: ' %'
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
    Plotly.newPlot('graficaLinealHum', data, layout);
    
</script>






<?php

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
//2019-11-26 12:22:06
$td = date("Y-m-d");

 require_once "conexion.php";
 $conexion=conexion();

 
 //$sql = "SELECT timeStamp, value1, value2, value3 FROM datalogger WHERE timeStamp BETWEEN '2020-06-12' AND '2020-07-16' ";
 //WHERE timeStamp LIKE '%$td%'ORDER BY id DESC
 $sql = "SELECT timeStamp, pressure FROM monitor WHERE timeStamp LIKE '%$td%'ORDER BY id DESC";
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
      title:'Presion',
      xaxis: {
        title: 'Tiempo'
      },
      yaxis: {
        title: ' hPa'
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
    Plotly.newPlot('graficaLinealPres', data, layout);
    
</script>



<?php

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
//2019-11-26 12:22:06
$td = date("Y-m-d");

 require_once "conexion.php";
 $conexion=conexion();

 
 //$sql = "SELECT timeStamp, value1, value2, value3 FROM datalogger WHERE timeStamp BETWEEN '2020-06-12' AND '2020-07-16' ";
 //WHERE timeStamp LIKE '%$td%'ORDER BY id DESC
 $sql ="SELECT temperature FROM monitor WHERE id=(SELECT max(id) FROM monitor)";
 $result= mysqli_query($conexion,$sql);
 $valoresX=array();
 while ($ver=mysqli_fetch_row($result)){
     $valoresX[]=$ver[0];
 }

 $datosX=json_encode($valoresX);
 echo($datosX)
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



<script>

datosX=crearCadenaLineal('<?php echo $datosX ?>');
datoX = parseFloat(datosX);
var data = [
  {
    type: "indicator",
    mode: "gauge+number",
    value: datoX,
    title: { text: "Temperatura", font: { size: 24 } },
    gauge: {
      axis: { range: [null, 40], tickwidth: 1, tickcolor: "darkblue" },
      bar: { color: "white" },
      bgcolor: "black",
      borderwidth: 2,
      bordercolor: "white",
      threshold: {
        line: { color: "red", width: 4 },
        thickness: 0.75,
        value: 40
      }
    }
  }
];

var layout = {
  width: 500,
  height: 400,
  margin: { t: 25, r: 25, l: 25, b: 25 },
  paper_bgcolor: "black",
  font: { color: "white", family: "Arial" }
};

Plotly.newPlot('gTemp', data, layout);
</script>


<?php

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
//2019-11-26 12:22:06
$td = date("Y-m-d");

 require_once "conexion.php";
 $conexion=conexion();

 
 //$sql = "SELECT timeStamp, value1, value2, value3 FROM datalogger WHERE timeStamp BETWEEN '2020-06-12' AND '2020-07-16' ";
 //WHERE timeStamp LIKE '%$td%'ORDER BY id DESC
 $sql ="SELECT pressure FROM monitor WHERE id=(SELECT max(id) FROM monitor)";
 $result= mysqli_query($conexion,$sql);
 $valoresX=array();
 while ($ver=mysqli_fetch_row($result)){
     $valoresX[]=$ver[0];
 }

 $datosX=json_encode($valoresX);
 echo($datosX)
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



<script>

datosX=crearCadenaLineal('<?php echo $datosX ?>');
datoX = parseFloat(datosX);
var data = [
  {
    type: "indicator",
    mode: "gauge+number",
    value: datoX,
    title: { text: "Presion", font: { size: 24 } },
    gauge: {
      axis: { range: [null, 1000], tickwidth: 1, tickcolor: "darkblue" },
      bar: { color: "white" },
      bgcolor: "black",
      borderwidth: 2,
      bordercolor: "white",
      threshold: {
        line: { color: "red", width: 4 },
        thickness: 0.75,
        value: 1000
      }
    }
  }
];

var layout = {
  width: 500,
  height: 400,
  margin: { t: 25, r: 25, l: 25, b: 25 },
  paper_bgcolor: "black",
  font: { color: "white", family: "Arial" }
};

Plotly.newPlot('gPre', data, layout);
</script>



<?php

date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
//2019-11-26 12:22:06
$td = date("Y-m-d");

 require_once "conexion.php";
 $conexion=conexion();

 
 //$sql = "SELECT timeStamp, value1, value2, value3 FROM datalogger WHERE timeStamp BETWEEN '2020-06-12' AND '2020-07-16' ";
 //WHERE timeStamp LIKE '%$td%'ORDER BY id DESC
 $sql ="SELECT humidity FROM monitor WHERE id=(SELECT max(id) FROM monitor)";
 $result= mysqli_query($conexion,$sql);
 $valoresX=array();
 while ($ver=mysqli_fetch_row($result)){
     $valoresX[]=$ver[0];
 }

 $datosX=json_encode($valoresX);
 echo($datosX)
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



<script>

datosX=crearCadenaLineal('<?php echo $datosX ?>');
datoX = parseFloat(datosX);
var data = [
  {
    type: "indicator",
    mode: "gauge+number",
    value: datoX,
    title: { text: "Humedad", font: { size: 24 } },
    gauge: {
      axis: { range: [null, 100], tickwidth: 1, tickcolor: "darkblue" },
      bar: { color: "white" },
      bgcolor: "black",
      borderwidth: 2,
      bordercolor: "white",
      threshold: {
        line: { color: "red", width: 4 },
        thickness: 0.75,
        value: 100
      }
    }
  }
];

var layout = {
  width: 500,
  height: 400,
  margin: { t: 25, r: 25, l: 25, b: 25 },
  paper_bgcolor: "black",
  font: { color: "white", family: "Arial" }
};

Plotly.newPlot('gHum', data, layout);
</script>