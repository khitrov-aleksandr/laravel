import React from 'react';
import ReactDOM from 'react-dom';
import L from 'leaflet';

class MapComponent extends React.Component {
    leafLet() {
        var zoom = 13;
        var center = [54.194946, 37.620137];
        var points = [
            ['Адрес 1', 'Подробный адрес 1', 54.209370, 37.628065],
            ['Адрес 2', 'Подробный адрес 2', 54.191863, 37.621390]
        ];

        var map = L.map('mapid').setView(center, zoom);

        var blueIcon = L.icon({
            iconUrl: 'images/vendor/leaflet/dist/marker-icon.png',
            shadowUrl: 'images/vendor/leaflet/dist/marker-shadow.png',
            //iconSize:     [38, 95], // size of the icon
            //shadowSize:   [50, 64], // size of the shadow
            iconAnchor: [20, 15], // point of the icon which will correspond to marker's location
            shadowAnchor: [20, 15],  // the same for the shadow
            popupAnchor: [-10, -10] // point from which the popup should open relative to the iconAnchor
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var markers = [];
        var clearPoints = [];
        for (var i = 0; i < points.length; i++) {

            var point = [points[i][2], points[i][3]];

            var marker = L.marker(point, {icon: blueIcon})
                .bindPopup('<b>' + points[i][0] + '</b><br>' + points[i][1], {autoClose:false})
                .addTo(map)
                .openPopup();

            clearPoints.push(point)
            markers.push(marker)
        }

        var group = new L.featureGroup(markers);

        //Auto zoom
        map.fitBounds(group.getBounds());

        //Auto center
        map.fitBounds(clearPoints);
    }

    componentDidMount() {
        this.leafLet()
    }

    render() {
        return <div id="mapid" style={{height: "600px"}}></div>
    }
}

ReactDOM.render(
    <MapComponent/>,
    document.getElementById("map-component")
);
