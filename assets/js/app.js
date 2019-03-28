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
  let place1 = Places({
    container: inputAddress
  });
  place1.on('change', e => {
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
  let place2 = Places({
    container: searchAddress
  });
  place2.on('change', e => {
    document.querySelector('#Ville').value = e.suggestion.city;
    document.querySelector('#lat').value = e.suggestion.latlng.lat;
    document.querySelector('#lng').value = e.suggestion.latlng.lng;
    });
}

let centreAddress = document.querySelector('#interets_adresse');
if (centreAddress !== null) {
  let place3 = Places({
    container: centreAddress
  });
  place3.on('change', e => {
    document.querySelector('#interets_ville').value = e.suggestion.city;
    document.querySelector('#interets_region').value = e.suggestion.county;
    document.querySelector('#interets_pays').value = e.suggestion.country;
    document.querySelector('#interets_code_postal').value = e.suggestion.postcode;
    document.querySelector('#interets_lat').value = e.suggestion.latlng.lat;
    document.querySelector('#interets_lng').value = e.suggestion.latlng.lng;
  });
}


let chercheAddress = document.querySelector('#cherche_centre');
if (chercheAddress !== null) {
  let place = Places({
    container: chercheAddress
  });
  place.on('change', e => {
    document.querySelector('#lat').value = e.suggestion.latlng.lat;
    document.querySelector('#lng').value = e.suggestion.latlng.lng;
    });
}

console.log('bonjour Webpack Encore! Editez moi encore dans assets/js/app.js');
