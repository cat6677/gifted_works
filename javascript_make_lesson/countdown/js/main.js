const hour = document.getElementById('hour');
const min = document.getElementById('min');
const sec = document.getElementById('sec');

function countDown(){
    const now= new Date();
    

    const tomorrow = new Date(now.getFullYear(),now.getMonth(),now.getDate()+1);
    //ミリ秒単位で計算
    const timeDiff = tomorrow.getTime() - now.getTime();

    const calsHour = Math.floor(timeDiff/1000/60/60);
    const calsMin = Math.floor(timeDiff/1000/60)%60;
    const calsSec = Math.floor(timeDiff/1000)%60;

    hour.innerHTML = calsHour;
    min.innerHTML = calsMin;
    sec.innerHTML = calsSec;

}

countDown();

setInterval(countDown,1000);