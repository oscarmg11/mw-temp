

$('#navbar-btn').click(() => {
    $('#navbar-mobile').css('width', '100vw')
    console.log('b')
})

$('#navbar-mobile').click(() => {
    $('#navbar-mobile').css('width', '0')
    console.log('a')
})

$('#navbar-mobile-content').click((e) => {
    e.stopPropagation()
})