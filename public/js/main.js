var isCheck = false;
function copy() {
    let input = document.querySelector(".ip-input");
    let text = input.value;
    navigator.clipboard.writeText(text).then(function() {
        if (isCheck) return
        input.value = "✅";
        isCheck = true;
        window.setTimeout ( function() { input.value = text; isCheck = false}, 500);
    }, function() {
        window.alert("Impossible de copier l'ip");
    });
}

document.querySelector(".ip-input").addEventListener("click", copy);

/*updateSize()
window.addEventListener('resize', updateSize);
window.addEventListener('scroll', updateSize);

function updateSize() {
    console.log("aa")
    var mapElement = document.querySelector(".youtube-frame");
    mapElement.style.height = (mapElement.offsetWidth / 1.77) + "px";
}
window.addEventListener('DOMContentLoaded', updateSize)
*/
