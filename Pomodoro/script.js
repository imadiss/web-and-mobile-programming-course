let work_m=document.getElementById("work_m");
let work_sec=document.getElementById("work_s");

let short_sec=document.getElementById("short_s");
let short_m=document.getElementById("short_m");

let long_m=document.getElementById("long_m");
let long_sec=document.getElementById("long_s");

let c=document.getElementById("cycle");

let start=document.getElementById("start");
let reset=document.getElementById("reset");
let pause=document.getElementById("pause");
let checkbox=document.getElementById("checkbox")


start.addEventListener('click',execution);

let interval=undefined;
let msg_start=document.getElementById("msg_start");



checkbox.addEventListener('change',long_break);

let msg_long=document.getElementById("msg_long");



reset.addEventListener('click',reset_click);

let msg_reset=document.getElementById("msg_reset");



pause.addEventListener('click',pause_click);

let msg_pause=document.getElementById("msg_pause");



function reset_click(){
    if(interval!==undefined){
        work_m.textContent=25;
        work_sec.textContent="00";
        short_m.textContent=5;
        short_sec.textContent="00";
        long_m.textContent=5;
        long_sec.textContent="00";
        c=0;
        clearInterval(interval);
        interval=undefined;
    }
    else{
        msg_reset.textContent="The Timer Has Already Been Reset!";
        msg_reset.style.color="red";
        msg_reset.style.fontFamily="poppins";
        setTimeout(function (){
            msg_reset.textContent="";
        },2000);
    }
}




function pause_click(){
    if(interval!==undefined){
        clearInterval(interval);
        interval=undefined;
    }
    else{
        msg_pause.textContent="Timer Has Already Been Paused!";
        msg_pause.style.color="red";
        msg_pause.style.fontFamily="poppins";
        setTimeout(function(){
            msg_pause.textContent="";
        },2000);
    }
}



function long_break(){
    if(checkbox.checked){
        msg_long.textContent="Your Next Break Will Be Long.";
        msg_long.style.color="Green";
        msg_long.style.fontFamily="poppins";
        setTimeout(function (){
            msg_long.textContent="";
        },2000);
    }
    else{
        msg_long.textContent="Your Next Break Will Be Short.";
        msg_long.style.color="Green";
        msg_long.style.fontFamily="poppins";
        setTimeout(function (){
            msg_long.textContent="";
        },2000);
    }
}

function execution(){
    if(interval===undefined){
        interval=setInterval(Timing,1000);
    }
    else{
        msg_start.textContent="Timer Has Already Been Started!";
        msg_start.style.color="red";
        msg_start.style.fontFamily="poppins";
        setTimeout(function (){
            msg_start.textContent="";
        },2000);
    }
}


function Timing(){

    if(work_s.textContent==0 && work_m.textContent!=0){
        if(work_m.textContent<=10) work_m.textContent="0"+String(work_m.textContent-1);
        else work_m.textContent--;
        work_sec.textContent=59;
    }
    else if(work_sec.textContent!=0){
        if(work_sec.textContent<=10) work_sec.textContent="0"+String(work_sec.textContent-1);
        else work_sec.textContent--;
    }

    else if(work_sec.textContent==0 && work_m.textContent==0){
            if (short_m.textContent==0 && short_sec.textContent==5 && (checkbox.checked || long_sec.textContent!=15)){
                
                if(long_m.textContent!=0 && long_sec.textContent==0){
                    if(long_m.textContent<=10) long_m.textContent="0"+String(long_m.textContent-1);
                    else long_m.textContent--;
                    long_sec.textContent=59;
                }
                else if(long_sec.textContent!=0 ){
                    if(long_sec.textContent<=10) long_sec.textContent="0"+String(long_sec.textContent-1);
                    else long_sec.textContent--;
                }
                else if(long_m.textContent==0 && long_sec.textContent==0){
                    c.textContent++;
                    work_m.textContent=25;
                    work_sec.textContent="00";
                    long_m.textContent=15;
                    long_sec.textContent="00";
                }
            }
                    
            else{
                if(short_m.textContent!=0 && short_sec.textContent==0){
                    if(short_m.textContent<=10) short_m.textContent="0"+String(short_m.textContent-1);
                    else short_m.textContent--;
                    short_sec.textContent=59;
                }
                else if(short_sec.textContent!=0 ){
                    if(short_sec.textContent<=10) short_sec.textContent="0"+String(short_sec.textContent-1);
                    else short_sec.textContent--;
                }
                else if(short_m.textContent==0 && short_sec.textContent==0){
                    c.textContent++;
                    work_m.textContent=25;
                    work_sec.textContent="00";
                    short_m.textContent=5;
                    short_sec.textContent="00";
                }
            }
    }
}