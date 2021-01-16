import React from 'react';
import ReactDOM from 'react-dom';
import L from 'leaflet';

class MapComponent extends React.Component {
    leafLet() {
        var map = L.map('mapid').setView([51.505, -0.09], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([51.5, -0.09]).addTo(map)
            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
            .openPopup();
    }

    componentDidMount() {
        this.leafLet()
    }

    render() {
        return <div id="mapid" style={{ height: "280px" }}></div>
    }
}

ReactDOM.render(
    <MapComponent/>,
    document.getElementById("map-component")
);
