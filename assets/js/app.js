/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
//require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

import Places from 'places.js'
import Map from './modules/map.js'

let map=document.querySelector('#map');
if(map !== null){
    Map.init(map);
}


let inputAddress = document.querySelector('#propriete_adresse');
if (inputAddress !== null) {
  let place = Places({
    container: inputAddress
  });
  place.on('change', e => {
    document.querySelector('#propriete_ville').value = e.suggestion.city;
    document.querySelector('#propriete_region').value = e.suggestion.county;
    document.querySelector('#propriete_pays').value = e.suggestion.country;
    document.querySelector('#propriete_code_postal').value = e.suggestion.postcode;
    document.querySelector('#propriete_lat').value = e.suggestion.latlng.lat;
    document.querySelector('#propriete_lng').value = e.suggestion.latlng.lng;
  });
}

let searchAddress = document.querySelector('#search_address');
if (searchAddress !== null) {
  let place = Places({
    container: searchAddress
  });
  place.on('change', e => {
    document.querySelector('#lat').value = e.suggestion.latlng.lat;
    document.querySelector('#lng').value = e.suggestion.latlng.lng;
    });
}
console.log('bonjour Webpack Encore! Editez moi encore dans assets/js/app.js');
