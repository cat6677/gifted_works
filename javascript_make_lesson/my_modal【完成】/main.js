let open = document.getElementById("open_btn");
let modal = document.getElementById("modal");
let close = document.getElementById("close_btn");
let modalbg= document.getElementById("modal_bg");
let showName =  document.getElementById("show_name");
open.addEventListener("click",()=>{
   

    modal.style.display ="block";
    modalbg.style.display = "block";
    
});

close.addEventListener("click",()=>{
    modal.style.display ="none";
    modalbg.style.display ="none";
});

modalbg.addEventListener("click",()=>{
    modal.style.display ="none";
    modalbg.style.display ="none";
});

console.log(modalbg);
