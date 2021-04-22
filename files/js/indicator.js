
function convertMaxToRadian(min, max, value){
    const dif = max - min

    if(value > max){
        return ((max * 1.5 * Math.PI) / dif) + 0.75 * Math.PI
    }else if(value < min){
        return ((min * 1.5 * Math.PI) / dif) + 0.75 * Math.PI
    }else{
        return (((value - min) * 1.5 * Math.PI) / dif) + 0.75 * Math.PI
    }
}

function degToRad(ang){
    return (Math.PI * ang) / 180
}

function createLines(ctx, halfCanvas, setStartLine){

    const startLine = setStartLine + 10
    const startLittleLine = setStartLine + 20
    const endLine = setStartLine + 25

    const angles = [0, 30, 60, 90, 120, 150, 180, 210, 240, 270, 300, 330]

    ctx.beginPath()
    for(let i = 0; i < angles.length; i++){
        ctx.moveTo( halfCanvas - startLine * Math.cos(degToRad(angles[i])), halfCanvas + startLine * Math.sin(degToRad(angles[i])) )
        ctx.lineTo(halfCanvas - endLine * Math.cos(degToRad(angles[i])), halfCanvas + endLine * Math.sin(degToRad(angles[i])))
    }
    ctx.lineWidth = 5
    ctx.strokeStyle = "white"
    ctx.stroke();

    ctx.beginPath()
    for(let i = 0; i < 72; i++){
        if(!angles.some(ang => ang === i *5)){
            ctx.moveTo( halfCanvas - startLittleLine * Math.cos(degToRad(i *5)), halfCanvas + startLittleLine * Math.sin(degToRad(i *5)) )
            ctx.lineTo(halfCanvas - endLine * Math.cos(degToRad(i *5)), halfCanvas + endLine * Math.sin(degToRad(i *5)))
        }
    }
    ctx.lineWidth = 1
    ctx.strokeStyle = "white"
    ctx.stroke();
}

function createIndicator(element, min, max, value, text){

    const halfCanvas = 350 / 2
    const startMark = 100
    const endMark = 155

    const ctx = document.getElementById(element).getContext("2d");

    if(window.innerWidth <= 768){ctx.font = "bold 7vw Arial";}
    else{ ctx.font = "bold 2vw Arial"; }
    ctx.fillStyle = "white";
    ctx.textAlign = "center";
    ctx.fillText(text, halfCanvas, halfCanvas + 15);

    ctx.beginPath();
    ctx.arc(halfCanvas, halfCanvas, endMark - 10, 0.75 * Math.PI, convertMaxToRadian(min, max, value) );
    ctx.lineWidth = 10
    ctx.strokeStyle = "white"
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo( halfCanvas - startMark * Math.cos(0.75 * Math.PI), halfCanvas + startMark * Math.sin(0.75 * Math.PI) )
    ctx.lineTo(halfCanvas - endMark * Math.cos(0.75 * Math.PI), halfCanvas + endMark * Math.sin(0.75 * Math.PI))
    ctx.moveTo( halfCanvas + startMark * Math.cos(0.75 * Math.PI), halfCanvas + startMark * Math.sin(0.75 * Math.PI) )
    ctx.lineTo(halfCanvas + endMark * Math.cos(0.75 * Math.PI), halfCanvas + endMark * Math.sin(0.75 * Math.PI))
    ctx.lineWidth = 5
    ctx.strokeStyle = "white"
    ctx.stroke();

    createLines(ctx, halfCanvas, startMark)
}

function clearCanvas(element){
    const canvas = document.getElementById(element)
    const ctx = canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

function setInfoIndicator( value, element, min, max, units){
    let val = 0
    if(value){ val = value }
    createIndicator(element, min, max, Number(val), `${val} ${units}`)
} 