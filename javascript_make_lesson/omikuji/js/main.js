const btn = document.getElementById('omikuji');

btn.addEventListener('click',()=>{
    const result=['大吉','中吉','小吉','吉','凶','大凶'];
    // math.random * result.length => 0～5
    const number = Math.floor(Math.random()*result.length);
    btn.textContent = result[number];
});