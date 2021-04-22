<!DOCTYPE html>
<html>
<title>Monitor</title>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="MW.ico">

    <!-- BOOSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="{{url_for('static', filename='css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="dist/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="estilos/Dashboard.css">
    <!-- footer -->
    <!-- scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{url_for('static', filename='js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="classes/plotly-latest.min.js"></script>
    <script src="dist/apexcharts.min.js"></script>

</head>

</body>
    <div class="cont"></div>
    <div class=""><div>
</body>

<script>
    $(document).ready(function() {

        setInterval(Temp, 10000);

    });

    function Temp() {
        $.ajax({

            url: 'dashTemp-2.php',
            cache: false,
            success: function(data) {
                $('.cont').html(data);
            }

        });
        
    }
</script>

</html>