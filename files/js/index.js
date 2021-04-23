
var tiempo = []
var datosTemperature = []
var datosHumedad = []
var datosPresion = []

var interval

function setChartInfo(tiempo, newDatosTemperature, newDatosPresion, newDatosHumedad){
    clearCanvas('gTemp')
    clearCanvas('gPre')
    clearCanvas('gHum')

    setInfoIndicator( newDatosTemperature[0], 'gTemp', 0, 40, `${String.fromCharCode(176)}C`)
    setInfoIndicator( newDatosPresion[0], 'gPre', 0, 1000, 'hPa')
    setInfoIndicator( newDatosHumedad[0], 'gHum', 0, 100, '%')

    createChart('graficaLinealTemp', tiempo, newDatosTemperature, `Grados ${String.fromCharCode(176)}C`)
    createChart('graficaLinealPres', tiempo, newDatosPresion, 'hPa')
    createChart('graficaLinealHum', tiempo, newDatosHumedad, '%')
}

function main(){
    const urlParams = new URLSearchParams(window.location.search);
    const place = urlParams.get('place')
    
    if(place){ $('#select-place').val(place) }

    interval = setInterval(() => {
        $.ajax({
            url: `index.php?last=true&place=${$('#select-place').val()}`,
            cache: false,
            success: function(data) {
                console.log('data fetched')
                removeSplashScreen()
                const dataParsed = JSON.parse(data)

                const newTiempo = JSON.parse(dataParsed.tiempo)
                const newDatosTemperature = JSON.parse(dataParsed.datosTemperature)
                const newDatosHumedad = JSON.parse(dataParsed.datosHumedad)
                const newDatosPresion = JSON.parse(dataParsed.datosPresion)

                if(newDatosTemperature[0]){ datosTemperature.unshift(newDatosTemperature[0]) }
                if(newDatosHumedad[0]){ datosHumedad.unshift(newDatosHumedad[0]) }
                if(newDatosPresion[0]){ datosPresion.unshift(newDatosPresion[0]) }
                if(newTiempo[0]){ tiempo.unshift(newTiempo[0]) }

                setChartInfo(tiempo, datosTemperature, datosPresion, datosHumedad)
            }
        });
    }, 10000);

    $.ajax({
        url: `index.php?last=false&place=${$('#select-place').val()}`,
        cache: false,
        success: function(data) {
            removeSplashScreen()

            const dataParsed = JSON.parse(data)

            tiempo = JSON.parse(dataParsed.tiempo)
            datosTemperature = JSON.parse(dataParsed.datosTemperature)
            datosHumedad = JSON.parse(dataParsed.datosHumedad)
            datosPresion = JSON.parse(dataParsed.datosPresion)
            
            setChartInfo(tiempo, datosTemperature, datosPresion, datosHumedad)
        }
    });
}

$(document).ready(() => {
    startSplashScreen()
    main()
})

$('#select-place').on('change', function(){
    if(interval){ window.clearInterval(interval) }
    main()
})