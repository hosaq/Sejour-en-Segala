/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*class Animation {
 
 static slideUp(element) {
 
 let cellule1=document.querySelector(".cellule1");
 element.style.display="block";
 cellule1.style.display="none";
 let gauche= document.querySelector(".gauche") ;
 gauche.style= "grid-area:photo; justify-self: center;align-self: center;";
 }
 static slideDown(element) {
 let cellule1=document.querySelector(".cellule1");
 element.style.display="none";
 cellule1.style.display="block";
 let gauche= document.querySelector(".gauche") ;
 gauche.style= "grid-area:photo; justify-self: center;";
 }
 }
 
 const cellule2=document.querySelector(".cellule2");
 const cellule3=document.querySelector(".cellule3");
 
 
 
 let des= document.querySelector(".description");
 des.addEventListener("mouseover", function (e) {
 Animation.slideUp(cellule3);
 });
 document.querySelector(".description").addEventListener("mouseout", function () {
 Animation.slideDown(cellule3);
 }); 
 document.querySelector(".presentation").addEventListener("mouseout", function () {
 Animation.slideDown(cellule2);
 }); 
 */
class Animation {

    constructor( opacite,cellulev, celluleinv,gauche) {
        this.opacite =opacite;
        this.gauche = gauche;
        this.cellulv = cellulev;
        this.cellulinv = celluleinv;
    }
    
     interval(){
         console.log(this.cellulev);
        setInterval(this.slideUp(this.opacite,this.cellulev, this.celluleinv,this.gauche), 50);
        
    }

     slideUp(opacite,cellulv, cellulinv,gauche) {
       
         
        if (opacite < 0.1) {
            console.log(opacite + "phase2");

            cellulv.style.display = "none";
            gauche.style = "grid-area:photo; justify-self: center;align-self: center;";
            cellulinv.style.display = "block";
            clearInterval();
          

        } else {
            console.log(opacite);
            opacite = opacite - 0.2;
            let opacit = "opacity:" + opacite;
            cellulev.style = opacit;
            console.log(opacite);
            return;

        }
    }
    

    static slideDown(element) {
        let cellule1 = document.querySelector(".cellule1");
        element.style.display = "none";
        cellule1.style.display = "block";
        let gauche = document.querySelector(".gauche");
        gauche.style = "grid-area:photo; justify-self: center;";
    }
}
console.log("nombrePhotos");

let pres = document.querySelector(".presentation");

let gauche=document.querySelector(".gauche");
let cellulev = document.querySelector(".cellule1");
let celluleinv = document.querySelector(".cellule2");
let opacite=1;
const anim12=new Animation(opacite,cellulev, celluleinv, gauche);
 
pres.addEventListener("mouseover",anim12. interval(),false);





