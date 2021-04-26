const lines = [{ place: 'place1', label: 'Lugar 1'}, { place: 'place2', label: 'Lugar 2'}, 
{ place: 'place3', label: 'Lugar 3'}, { place: 'place4', label: 'Lugar 4'}, 
{ place: 'place5', label: 'Lugar 5'}, { place: 'place6', label: 'Lugar 6'}]

function handleClick(e){
    const idx = lines.findIndex(line => line.place === e.target.id)
    window.location.href = `index.html?place=${idx+1}`
}

$(document).ready(() => {
    $('#img-splash-screen').css('width', '100%')
    for(let i = 0; i < lines.length; i++){
        const element = document.getElementById(lines[i].place)
        if(element){
            element.addEventListener('click', handleClick)
            if(window.innerWidth <= 768){
                element.innerHTML = lines[i].label
                console.log('a')
            }
        }
    }
})