
var map = L.map('map').setView([35.69, 51.38], 10);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

map.on('dblclick', function (e) {
    var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
    document.getElementById("location").value = [e.latlng.lat, e.latlng.lng];
});
