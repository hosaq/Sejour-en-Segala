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

    
        static interval(cellulev,celluleinv){
            if (opacite >= 0 ) {
                console.log(opacite);
                const intervall=setInterval(function(){Animation.fade(cellulev,celluleinv);}, 1000);
                


            }
            else{
                console.log(opacite+"iffff");
                cellulev.style.display = "none";
                gauche.style = "grid-area:photo; justify-self: center;align-self: center;";
                celluleinv.style.display = "block";
                
                clearInterval(intervall);
                
                opacite = opacite - 0.02;
            
           
            }
        }
        static fade(cellulv, cellulinv) {  
                //console.log(opacite);
                opacite = opacite - 0.02;
                let opacit = "opacity:" + opacite;
                cellulev.style = opacit;
                this.interval(cellulev,celluleinv);

            
        }
        }
 let opacite=1;
 let gauche= document.querySelector(".gauche") ;
 let cellulev=document.querySelector(".cellule1"); 
 let celluleinv=document.querySelector(".cellule2"); 
 let pres= document.querySelector(".presentation");
 let des= document.querySelector(".description");
 
 pres.addEventListener("mouseover",function(){Animation.fade(cellulev,celluleinv);},false);