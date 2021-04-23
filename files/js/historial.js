$('#btn-historial').on('click', () => {
    const from = $('#from').val()
    const to = $('#to').val()

    if(from !== "" && to !== ""){
        $.ajax({
            url: `historial.php?from=${from}&to=${to}&apiKey=tPmAT5Ab3j7F9`,
            cache: false,
            success: function(data) {
                console.log(data)
                const dataParsed = JSON.parse(data)

                const newTiempo = JSON.parse(dataParsed.tiempo)
                const newDatosTemperature = JSON.parse(dataParsed.datosTemperature)
                const newDatosHumedad = JSON.parse(dataParsed.datosHumedad)
                const newDatosPresion = JSON.parse(dataParsed.datosPresion)

                if(newDatosTemperature[0]){ datosTemperature.unshift(newDatosTemperature[0]) }
                if(newDatosHumedad[0]){ datosHumedad.unshift(newDatosHumedad[0]) }
                if(newDatosPresion[0]){ datosPresion.unshift(newDatosPresion[0]) }
                if(newTiempo[0]){ tiempo.unshift(newTiempo[0]) }

                createChart('graficaLinealTemp', tiempo, datosTemperature, `Grados ${String.fromCharCode(176)}C`)
                createChart('graficaLinealPres', tiempo, datosPresion, 'hPa')
                createChart('graficaLinealHum', tiempo, datosHumedad, '%')
            }
        });
    }
})