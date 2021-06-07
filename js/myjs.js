var windowWidth = window.innerWidth;
var screenHeight = window.innerHeight;
// Strictly for index.html page 
function forIndex() {
    var messages = document.querySelectorAll(".message");
    var items = document.querySelectorAll(".item");
    var sliders = document.querySelector("#imageslider");
    var slideImages = ["studi", "make", "happy", "no", "gradi", ];
    console.log(windowWidth);
    console.log(screenHeight);
    sliders.style.width = windowWidth;
    sliders.style.height = screenHeight;
    if (windowWidth <= 768) {
        slideImages[1] = "makeph";
    }



    for (sly = 0; sly < items.length; sly++) {
        items[sly].style.backgroundImage = "url('images/" + slideImages[sly] + ".jpg')";
        items[sly].style.height = screenHeight + 'px';
        messages[sly].style.width = windowWidth + 'px';
        messages[sly].style.height = screenHeight + 'px';
        if (windowWidth > 768) {
            messages[sly].style.width = windowWidth * 0.3 + 'px';
        }

    }
    items[1].style.backgroundPosition = "top";

}

function setDat() {
    var time = new Date();
    var yy = time.getFullYear();

    var foot = document.querySelector('#date');
    foot.textContent = yy;
}

function setStartBg() {
    var windowWidth = window.innerWidth;
    var screenHeight = window.innerHeight;
    var inStart = document.querySelector(".instart");
    //inStart.style.width = windowWidth + 'px';
    inStart.style.height = screenHeight + 'px';
    console.log(windowWidth);
    console.log(screenHeight);

}