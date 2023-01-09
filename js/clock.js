setInterval(displayClock, 1000);

function displayClock() {
    let time = new Date();
    let hours = time.getHours();
    let minutes = time.getMinutes();
    let seconds = time.getSeconds();

    if (hours > 12) {
        hours -= 12;
        am_pm = "PM";
    }
    else{
        am_pm = "AM";
    }
 
    hours = hours < 10 ? "0" + hours : hours;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;
 
    let currentTime = hours + ":" + minutes + ":" + seconds + " " + am_pm;
 
    document.getElementById("clock")
            .innerHTML = currentTime;
}

displayClock();