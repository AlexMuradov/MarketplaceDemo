


// $(function () {
//     var curLocation = [0, 0];

//     if (curLocation[0] == 0 && curLocation[1] == 0) {
//         curLocation = [40.377481, 49.850581];
//     }

//     var map = L.map('mapid').setView(curLocation, 15);

//     L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
//         attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
//     }).addTo(map);
//     map.pm.setLang('en');
//     map.pm.addControls({
//         position: 'topleft',
//         dragLayers: false,
//         drawPolygon: false,
//         drawMarker: false,
//         drawCircle: false,
//         drawCircleMarker: false,
//         drawPolyline: false,
//         cutPolygon: false,
//         drawRectangle: false
//     });

//     map.attributionControl.setPrefix(false);

//     var marker = new L.marker(curLocation, {
//         draggable: 'true'
//     });

//     marker.on('dragend', function (event) {
//         var position = marker.getLatLng();
//         marker.setLatLng(position, {
//             draggable: 'true'
//         }).bindPopup(position).update();
//         $("#latitude").val(position.lat);
//         $("#longitude").val(position.lng).keyup();
//     });

//     $("#latitude, #longitude").change(function () {
//         var position = [parseInt($("#latitude").val()), parseInt($("#longitude").val())];
//         marker.setLatLng(position, {
//             draggable: 'true'
//         }).bindPopup(position).update();
//         map.panTo(position);
//     });

//     map.addLayer(marker);
// })