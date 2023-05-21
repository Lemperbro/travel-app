let defaultTransform = 0;
function goNext() {
    defaultTransform = defaultTransform - 398;
    var slider = document.getElementById("slider");
    if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
next.addEventListener("click", goNext);
function goPrev() {
    var slider = document.getElementById("slider");
    if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
    else defaultTransform = defaultTransform + 398;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
prev.addEventListener("click", goPrev);


let defaultTransform2 = 0;
function goNext() {
    defaultTransform2 = defaultTransform2 - 398;
    var slider = document.getElementById("slider2");
    if (Math.abs(defaultTransform2) >= slider.scrollWidth / 1.7) defaultTransform2 = 0;
    slider.style.transform = "translateX(" + defaultTransform2 + "px)";
}
next2.addEventListener("click", goNext);
function goPrev() {
    var slider = document.getElementById("slider2");
    if (Math.abs(defaultTransform2) === 0) defaultTransform2 = 0;
    else defaultTransform2 = defaultTransform2 + 398;
    slider.style.transform = "translateX(" + defaultTransform2 + "px)";
}
prev2.addEventListener("click", goPrev);



