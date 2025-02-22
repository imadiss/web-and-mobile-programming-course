function validation(){
    let number_case=document.getElementById("nbr");
    let number=number_case.value;
    let message_number=document.getElementById("msg_nbr");
    message_number.textContent="";
    number_case.style.borderColor="black";

    if(number==="") return;

    if((number[0]!=="6" && number[0]!=="7") || number.length!=9 || isNaN(Number(number))){
        message_number.textContent="Invalid number.";
        message_number.style.color= "red";
        number_case.style.borderColor="red";
        return;
    }


    let password_case=document.getElementById("pass");
    let password=password_case.value;
    let password_confirm_case=document.getElementById("pass_conf");
    let password_confirm=password_confirm_case.value;
    let message_conf=document.getElementById("msg_conf");
    let message_short=document.getElementById("msg_short");

    message_conf.textContent="";
    message_short.textContent="";
    password_confirm_case.style.borderColor="black";
    password_case.style.borderColor="black";

    if(password==="") return;

    if (password.length<8){
        message_short.textContent="Password must have at least 8 characters.";
        message_short.style.color= "red";
        password_case.style.borderColor="red";
        return;
    }
    if(password_confirm=="") return;
    if(password!==password_confirm){
        message_conf.textContent="Cannot confirm password.";
        message_conf.style.color= "red";
        password_confirm_case.style.borderColor="red";
        return;
    }

    window.location.href="login.html";
}

function toggle_password(pass_Id,icon){
    let password=document.getElementById(pass_Id);
    if(password.type==="password"){
        password.type="text";
        icon.src="opened_eye.png";
    }
    else{
        password.type="password";
        icon.src="closed_eye.png";
    }

}