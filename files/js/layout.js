const lines = ['place1', 'place2', 'place3', 'place4', 'place5', 'place6']

function handleClick(e){
    console.log(e.target.id)
    const idx = lines.findIndex(line => line === e.target.id)
    window.location.replace(`index.html?place=${idx+1}`)
}

$(document).ready(() => {
    $('#img-splash-screen').css('width', '100%')
    for(let i = 0; i < lines.length; i++){
        const element = document.getElementById(lines[i])
        if(element){ element.addEventListener('click', handleClick) }
    }
})