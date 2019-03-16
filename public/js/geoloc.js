/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import Places from 'places.js'

let inputAddress = document.querySelector('#propriete_adresse');
if (inputAddress !== null) {
  let place = Places({
    container: inputAddress
  });
}


