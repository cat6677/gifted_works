let imgbox = ["01.jpg","02.jpg","03.jpg","04.jpg","05.jpg"];

let leftBtn = document.getElementById("v_left");
let rightBtn = document.getElementById("v_right");
let mainImg  = document.getElementById("main_img");
let counter = 0;


rightBtn.addEventListener("click",()=>{
    if(counter==4){
        counter=0;
    }else{
        counter++;
    }
    mainImg.src = "img/"+imgbox[counter];
   
});

leftBtn.addEventListener("click",()=>{
    if(counter==0){
        counter=4;
    }else{
        counter--;
    }
    mainImg.src = "img/"+imgbox[counter];
});