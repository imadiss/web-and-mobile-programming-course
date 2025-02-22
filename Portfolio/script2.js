function get_user() {
    let username = document.getElementById("username").value;
    let password= document.getElementById("password").value;
    if(username==="" || password==="") return;
    window.location.href = `welcome.html?name=${encodeURIComponent(username)}`;
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