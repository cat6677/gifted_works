//スライド
let imgbox = ["01.jpg","02.jpg","03.jpg","04.jpg","05.jpg"];
let namebox =["日本の湖","ウトナイ湖","支笏湖","琵琶湖","諏訪湖"]


let leftBtn = document.getElementById("v_left");
let rightBtn = document.getElementById("v_right");
let mainImg  = document.getElementById("main_img");
let showName =  document.getElementById("show_name");
let overlay = document.getElementById("overlay");
let pop = document.getElementById("pop");
let counter = 0;




rightBtn.addEventListener("click",()=>{
    if(counter==4){
        counter=0;
    }else{
        counter++;
    }
    mainImg.src = "img/"+imgbox[counter];
    showName.textContent = namebox[counter];
    pop.src ="img/"+imgbox[counter];
  
});

leftBtn.addEventListener("click",()=>{
    if(counter==0){
        counter=4;
    }else{
        counter--;
    }
    mainImg.src = "img/"+imgbox[counter];
    showName.textContent = namebox[counter];
    pop.src ="img/"+imgbox[counter];
  });

  mainImg.addEventListener("click",()=>{
    overlay.style.display = "block";
  });

 overlay.addEventListener("click",()=>{
    overlay.style.display = "none";
  });


// アコーディオン
$(function () {
    $('.ac-parent').on('click', function () {
    $(this).next().slideToggle();
    $(this).toggleClass('selected');
  });
});

//モーダル
let open = document.getElementById("open_btn");
let modal = document.getElementById("modal");
let close = document.getElementById("close_btn");
let modalbg= document.getElementById("modal_bg");

open.addEventListener("click",()=>{
   

    modal.style.display ="block";
    modalbg.style.display = "block";
    
});

close.addEventListener("click",()=>{
    modal.style.display ="none";
    modalbg.style.display ="none";
});

// modalbg.addEventListener("click",()=>{
//     modal.style.display ="none";
//     modalbg.style.display ="none";
// });

lightbox.option({
    'resizeDuration': 400,
    'wrapAround': true
  })
