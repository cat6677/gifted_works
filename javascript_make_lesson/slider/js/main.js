//要素の取得
const images = ['img/01.jpg','img/02.jpg','img/03.jpg','img/04.jpg','img/05.jpg'];
const slideImg = document.getElementById('slide_img');
const prev = document.getElementById('prev');
const page = document.getElementById('page');
const next = document.getElementById('next');
let current = 0;

page.textContent = `1/${images.length}`;

//nextボタンの処理
next.addEventListener('click',function(){
    if(current+1<images.length){
        current++;
        slideImg.src = images[current];
    }    
    page.textContent = `${current+1}/${images.length}`;
});



prev.addEventListener('click',function(){
    if(current > 0){
        current--;
        slideImg.src = images[current];
    } 
    page.textContent = `${current+1}/${images.length}`;   
});