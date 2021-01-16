import React from 'react';
import ReactDOM from 'react-dom';
import L from 'leaflet';

class MapComponent extends React.Component {
    leafLet() {

        var zoom = 13;
        var center = [54.194946, 37.620137];
        var point = [54.209370, 37.628065];

        var map = L.map('mapid').setView(center, zoom);

        var greenIcon = L.icon({
            iconUrl: 'images/vendor/leaflet/dist/marker-icon.png',
            shadowUrl: 'images/vendor/leaflet/dist/marker-shadow.png',
            //iconSize:     [38, 95], // size of the icon
            //shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [20, 15], // point of the icon which will correspond to marker's location
            shadowAnchor: [20, 15],  // the same for the shadow
            popupAnchor:  [-10, -10] // point from which the popup should open relative to the iconAnchor
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker(point, {icon: greenIcon}).addTo(map)
            .bindPopup('<b>RifeBank</b><br>Banking address')
            .openPopup();

        var group = new L.featureGroup([marker]);

        //Auto zoom
        map.fitBounds(group.getBounds());

        //Auto center
        map.fitBounds([point]);
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
