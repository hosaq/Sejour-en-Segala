/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import L from 'leaflet'
import 'leaflet/dist/leaflet.css'


export default class Map {
    static init(map) {
        let center=[map.dataset.lat, map.dataset.lng];
        map = L.map('map').setView(center, 13);
        let icon = L.icon({ iconUrl: '/images/marker-carte.png', });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker(center, {icon: icon}).addTo(map);
        
               
    }

}
