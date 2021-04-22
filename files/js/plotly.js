function createChart(element, datosX, datosY, title){
    var trace= {
        x: datosX,
        y: datosY,
        type: 'scatter',
        line: { shape: 'spline' },
        connectgaps: true,
        line: {
            color: 'white',
            width: 3
        }
    };

    var layout = {
        height: 400,
        xaxis: { title: 'Tiempo' },
        yaxis: { title: title },
        paper_bgcolor: "black",
        plot_bgcolor: "rgba(0,0,0,0)",
        font: {
            family: 'Arial',
            size: 12,
            color: 'white'
        }
    };

    if(window.innerWidth <= 768){ layout.width = 400 }
    else{ layout.width = 550 }

    var data = [trace];
    Plotly.newPlot(element, data, layout, {displayModeBar: false});
}