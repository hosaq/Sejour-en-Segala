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
let mesoptions=[];
mesoptions=[['Mucisical','littéraire','Artistique','Autres'],
       ['Musée','Exposition','Historique','Vie quotidienne','Médiatheque','Autres'],
       ['Boutiques','Marchés','Producteurs','Autres'],
       ['Grandes','Moyenne','Bourg','Villages'],
       ['A pied','A velo','Aquatiques','Tournois','Autres'],
       ['En voiture', 'A pied','Autres'],
       ['Autres']
];
      
console.log(mesoptions[6][0]);
let nombre;
let index1;
let menu1=document.getElementById("interets_type1");
let menu2=document.getElementById("interets_type2");
menu1.onchange=function () {
    
    suppr();
    let index=this.selectedIndex-1;
    let len=mesoptions[index].length;
    ajoute(index,len);
    };
 
function ajoute(index1,nombre){
  
 console.log(index1+"nombre"+menu2.length); 
for (let i = 0; i < nombre; i++) {
    menu2[i] = new Option(mesoptions[index1][i],"\'"+mesoptions[index1][i]+"\'");
    }
}
function suppr(){
  
 console.log("nombremenu2"+menu2.length); 
for (let i = 0; i < menu2.length; i++) {
    menu2[i] = new Option();
    }
}