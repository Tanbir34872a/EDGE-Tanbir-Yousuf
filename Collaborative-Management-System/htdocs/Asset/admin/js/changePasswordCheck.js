//password validation
function changePasswordCheck() {

    let curPassword = document.getElementById('password').value;
    let newPassword = document.getElementById('nPassword').value;
    let reTypePassword = document.getElementById('rPassword').value;

    let passCharCheck= '!@#$%^&*()+=-[]{}|:;"\'<>,.?/~`';
    let passNumCheck="0123456789";

    let hasSpecialChar = false;
    let hasNumber = false;

    //json obj
    let userData = {
        "password": curPassword,
        "nPassword": newPassword,
        "rPassword": reTypePassword,
      };

    for(let i =0; i<newPassword.length;i++) // check wheather pass have special char or not
    {
        if(passCharCheck.includes(newPassword[i]))
        {
            hasSpecialChar=true;
        }
        else if(passNumCheck.includes(newPassword[i])){
            hasNumber=true;
        }
    }

    if (curPassword==''||newPassword==''||reTypePassword=='')
    {
        alert("Null value! Have to provide all the value!" );
        return false;
    }
    else if(newPassword!=reTypePassword)
    {
        alert("confim password does not match");
        return false;
    }
    else if(newPassword.length<5)
    {
        alert("password  should be atleast 5 character");
        return false;
    }
    else if(hasSpecialChar==false||hasNumber==false)
    {
        alert("password should have special character and number");
            console.log(newPassword);
            return false;
    }
    else{
        let data = JSON.stringify(userData);
        let xhttp = new XMLHttpRequest();
        xhttp.open("post", "../../controller/admin/changePasswordCheck.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("userPass=" + data);
        xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let userPassRR = JSON.parse(this.responseText);

            if (userPassRR.success === true) {
                document.getElementById("passChangeRR").innerHTML = "Successfully Password Changed! ";
            }
            else{
                //alert(userPassRR.error||"Unexpected error");
                document.getElementById("passChangeRR").innerHTML=userPassRR.error;
                return false;
            }
        }
        };
    }
    return false;
}