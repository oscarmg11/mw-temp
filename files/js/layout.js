const lines = ['MXC001', 'MXC002', 'MXC003', 'MXC004', 'MXC005', 'MXC006', 'MXC007', 'MXC008', 'MXC009', 'MXC010',
                'MXC011', 'MXC012', 'MXC013', 'MXC015', 'MXC016', 'MXC017', 'MXC018', 'MXC019']

function handleClick(e){
    console.log(e.target.id)
    const idx = lines.findIndex(line => line === e.target.id)
    window.location.replace(`index.html?place=${idx+1}`)
}

$(document).ready(() => {
    for(let i = 0; i < lines.length; i++){
        const element = document.getElementById(lines[i])
        if(element){ element.addEventListener('click', handleClick) }
    }
})