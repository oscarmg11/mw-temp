$('#img-splash-screen').css('width', '100%')

$('#btn-historial').on('click', () => {
    const from = $('#from').val()
    const to = $('#to').val()
    const place = $('#select-place').val()

    if(from !== "" && to !== ""){
        $.ajax({
            url: `historial.php?from=${from}&to=${to}&place=${place}&apiKey=tPmAT5Ab3j7F9`,
            cache: false,
            success: function(data) {

                const dataParsed = JSON.parse(data)

                const tiempo = JSON.parse(dataParsed.tiempo)
                const datosTemperature = JSON.parse(dataParsed.datosTemperature)
                const datosHumedad = JSON.parse(dataParsed.datosHumedad)
                const datosPresion = JSON.parse(dataParsed.datosPresion)

                const maxTemperature = Math.max.apply(null, datosTemperature)
                const maxHumedad = Math.max.apply(null, datosHumedad)
                const maxPresion = Math.max.apply(null, datosPresion)

                $('#row-canvas').css('opacity', '1')

                clearCanvas('gTemp')
                clearCanvas('gPre')
                clearCanvas('gHum')

                if(isFinite(maxTemperature) && isFinite(maxHumedad) && isFinite(maxPresion)){
                    setInfoIndicator( maxTemperature, 'gTemp', 0, 40, `${String.fromCharCode(176)}C`)
                    setInfoIndicator( maxPresion, 'gPre', 0, 1000, 'hPa')
                    setInfoIndicator( maxHumedad, 'gHum', 0, 100, '%')

                    $('#text-time').text(`Ultimo valor registrado ${tiempo[tiempo.length - 1]}`)

                }else{
                    setInfoIndicator( 0, 'gTemp', 0, 40, `${String.fromCharCode(176)}C`)
                    setInfoIndicator( 0, 'gPre', 0, 1000, 'hPa')
                    setInfoIndicator( 0, 'gHum', 0, 100, '%')
                }

                createChart('graficaLinealTemp', tiempo, datosTemperature, `Grados ${String.fromCharCode(176)}C`)
                createChart('graficaLinealPres', tiempo, datosPresion, 'hPa')
                createChart('graficaLinealHum', tiempo, datosHumedad, '%')
            }
        });
    }
})
