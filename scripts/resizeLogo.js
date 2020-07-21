
var title = document.getElementById('site-title');
var subtitle = document.getElementById('subtitle');
function setFont(text, font) {
    var size = document.getElementsByClassName("header-display")[0].offsetWidth,
    font_size = size * font;
    if (font_size > font * 1000)
    text.style.fontSize = font_size + '%';
    else text.style.fontSize = font * 1000 + '%';
    //console.log('fontsize: ' + text.id + ": " + text.style.fontSize);
    return this
}

setFont(title, 0.15);
setFont(subtitle, 0.08);
window.onresize = function () {
    setFont(title, 0.15),
    setFont(subtitle, 0.08)
}
