const date = new Date();
const year = date.getFullYear();
const month = date.getMonth()+1;

const firstDate = new Date(year,month-1,1);
const firstDay = firstDate.getDay();

const lastDate = new Date(year,month,0);
const lastDayCount= lastDate.getDate();


let dayCount =1;
let createHtml = "";

createHtml = "<h1>" + year + "/" + month + "</h1>";
createHtml +='<table>'+'<tr>';

const weeks=['日','月','火','水','木','金','土'];
for(let i=0;i<weeks.length;i++){
    createHtml += "<td>"+weeks[i]+"</td>";
}
createHtml+="</tr>";

//行が6行
for(let n=0;n<6;n++){
    createHtml+="<tr>";
    //カラム
        for(let d=0;d<7;d++){
            //1行目かつ最初の曜日以下の場合
            if(n==0 && d<firstDay){
                createHtml+="<td></td>";
            }else if(dayCount > lastDate){
                createHtml +="<td></td>";
            }else{
                createHtml += '<td>'+dayCount+"</td>";
                dayCount++;
            }
        }
        createHtml += '</tr>';
}

createHtml += '</table>';

document.querySelector("#calender").innerHTML = createHtml;




console.log(createHtml);

//console.log(firstDate);
// console.log(firstYoubi);
// console.log(lastDayNum);