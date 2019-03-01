/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Animation {
    static slideUp(element) {
        let nombrePhotos = 0;
        let photos = element.querySelectorAll('.photocadre');
        nombrePhotos = photos.length;
        console.log(nombrePhotos);
        let n = nombrePhotos - 1;
        while (n > 0) {
            let m = photos[n].style.zIndex;         
            if (m === "10") {                             
                photos[n].style.zIndex = 1;
                break;
            }
             n = n - 1;
            if (n === 0) {
                for (let i = 0; i < nombrePhotos; i++) {
                    photos[i].style.zIndex = 10;
                }              
            }
        }
    }
    static slideDown(element) {
        let nombrePhotos = 0;
        let photos = element.querySelectorAll('.photocadre');
        nombrePhotos = photos.length;
        let n = 0;
        console.log(n);
        while (n <nombrePhotos) {
            
            let m = photos[n].style.zIndex;
            console.log(m);
            if (m === "1") {                             
                photos[n].style.zIndex = 10;
                break;
            }
             n = n + 1;
            if (n === nombrePhotos) {
                for (let i = 0; i < nombrePhotos; i++) {
                    photos[i].style.zIndex = 10;
                }              
            }
        }
    }
}

const carts = document.querySelectorAll(".carte");
carts.forEach(cart => {
    cart.querySelector(".chevrondroit").addEventListener("click", function () {
        Animation.slideUp(cart);
    });
    cart.querySelector(".chevrongauche").addEventListener("click", function () {
        Animation.slideDown(cart);
    });   
});