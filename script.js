
function set(){
var d=new Date();
if(d.getDay()===3){
   document.getElementById("m").innerHTML='WED <br> <small style="font-size:10px;margin:0px 10px;">DAY</small>';

}
else if(d.getDay()===0){
   document.getElementById("m").innerHTML='SUN <br> <small style="font-size:10px;margin:0px 10px;">DAY</small>';
}
 else if(d.getDay()===1){
   document.getElementById("m").innerHTML='MON <br> <small style="font-size:10px;margin:0px 10px;">DAY</small>';
}

 else if(d.getDay()===2){
   document.getElementById("m").innerHTML='TUE <br> <small style="font-size:10px;margin:0px 10px;">DAY</small>';
}

 else if(d.getDay()===4){
   document.getElementById("m").innerHTML='THU <br> <small style="font-size:10px;margin:0px 10px;">DAY</small>';
}

 else if(d.getDay()===5){
   document.getElementById("m").innerHTML='FRI <br> <small style="font-size:10px;margin:0px 10px;">DAY</small>';
}

 else if(d.getDay()===6){
   document.getElementById("m").innerHTML='SAT<br> <small style="font-size:10px;margin:0px 10px;">DAY</small>';
}


document.getElementById("p").innerHTML=d.getHours()+"<br> <small>HR</small>";

document.getElementById("k").innerHTML=d.getMinutes()+"<br> <small >MIN</small>";
document.getElementById("c").innerHTML=d.getSeconds()+"<br> <small >SEC</small>";
setInterval(set,1000);
}
set();

   
     