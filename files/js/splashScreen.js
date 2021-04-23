var interval = null
var ctrl = false

function openCharts(){
    $('#navbar').css('top', '0')
    setTimeout(() => {
        $('#content-container').css('opacity', '1')
        $('.navbar-option').css('opacity', '1')
        $('#navbar-btn').css('opacity', '1')
    }, 500);
}

function removeSplashScreen(){
    $('#img-splash-screen').css('width', '100%')
    $('#img-splash-screen').css('opacity', '1')
    clearInterval(Number(window.localStorage.getItem('interval')))
    setTimeout(openCharts, 1500);
}

function animation(){
    if(ctrl){
        $('#img-splash-screen').css('width', '50%')
        $('#img-splash-screen').css('opacity', '0.2')
    }else{
        $('#img-splash-screen').css('width', '100%')
        $('#img-splash-screen').css('opacity', '1')
    }
    ctrl = !ctrl
}

function startSplashScreen(){
    $('#img-splash-screen').css('width', '100%')
    $('#img-splash-screen').css('opacity', '0.2')
    interval = setInterval(animation, 1000);
    window.localStorage.setItem('interval', interval)
    //setTimeout(removeSplashScreen, 3000);
}