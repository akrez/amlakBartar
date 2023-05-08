let map leafletMap;
let lat = document.querySelector("latitude").value;
let lng = document.querySelector("lngitude").value;
const request = new XMLHttpRequest();
request.open("GET", '/sortMelk?lat=${lat}&lng=${lng}');
request.addEventListener(readystatechange(), function () {
    if (request.readyState == 4 && request.status == 200) {
        map.innerHTML = request.responseText;
    } else {
        map.innerHTML = "Eror:" + request.status;
    }
});
request.send();

