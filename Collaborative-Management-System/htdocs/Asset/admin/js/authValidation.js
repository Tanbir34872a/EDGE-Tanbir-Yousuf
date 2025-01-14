//signUp validation
function signValidation()
{
    let name = document.getElementById('name').value;
    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let gender = document.getElementById('gender').value;
    let dob = document.getElementById('dob').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirmPassword').value;
    let userType = document.getElementById('userType').value;

    let fAlph= username.charCodeAt(0); //first alphabet username
    let passCharCheck= '!@#$%^&*()+=-[]{}|:;"\'<>,.?/~`';
    let passNumCheck="0123456789";
    let hasSpecialChar = false;
    let hasNumber = false;

    if (name==''||username==''||email==''||gender==''||dob==''||password==''||confirmPassword==''||userType=='')
    {
        alert("Null value! Have to provide all the value for create an account" );
        return false;
    }
    else if (password!=confirmPassword)
    {
        document.getElementById('errorCPass').innerHTML = "Password does not match";
        return false;
    }
    //username validation
    else if (username.length<5)
    {
        document.getElementById('errorUsername').innerHTML = "username should be atleast 5 character";
        return false;
    }
    else if(!(fAlph>=65&&fAlph<=90)&&!(fAlph<=122 &&fAlph>=97))
    {
        document.getElementById('errorUsername').innerHTML = " Username must start with latter";
        return false;
    }
    else if (!email.includes("@") || !email.includes(".com"))
    {
        document.getElementById('errorEmail').innerHTML = "Email address must be valid";
        return false;
    }
    //password validation
    else if (password.length<5)
    {
        document.getElementById('errorPass').innerHTML = "password should be atleast 5 character";
        return false;
    }
    for(let i =0; i<password.length;i++) // check wheather pass have special char or not
    {
        if(passCharCheck.includes(password[i]))
        {
            hasSpecialChar=true;
        }
        else if(passNumCheck.includes(password[i])){
            hasNumber=true;
        }
    }
    if(hasSpecialChar==false||hasNumber==false)
    {
        document.getElementById('errorPass').innerHTML = "password should have special character and number";
            console.log(password);
            return false;
    } 
   
    return true;
}
//login validation
function loginValidation() {
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    let loginData = {
        "username": username,
        "password": password,
    };

    if (username === '') {
        document.getElementById('errorLogUsername').innerHTML = "Username Empty";
        return false;
    } else if (password === '') {
        document.getElementById('errorLogPass').innerHTML = "Password Empty";
        return false;
    } else {
        let data = JSON.stringify(loginData);
        let xhttp = new XMLHttpRequest();
        xhttp.open("post", "../controller/admin/loginCheck.php", true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.send("loginData="+data);
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let loginRR = JSON.parse(this.responseText);
                console.log(loginRR);
                if (loginRR.success===true) 
                {
                    //alert("success");
                    window.location.href = "../view/admin/loggedDashboard.php";
                } else if (loginRR.success1===true) 
                {
                    window.location.href = "../view/managerView/managerDashboard.php";
                }
                else if(loginRR.success2===true)
                {
                    window.location.href = "../view/Developer/loggedDashboard.php";
                }
                else if(loginRR.success3===true)
                {
                    window.location.href = "../view/client/client.php";
                }
                else {
                    alert(loginRR.error||"Unexpected error");
                    return false;
                }
            }
        };
        
    }

    return false;
}

//check username Availability
function checkUsername()
{
  let username = document.getElementById('username').value;

    let xhttp = new XMLHttpRequest();

    xhttp.open('post', '../controller/admin/userNameCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('errorUsername').innerHTML = this.responseText;
            return false;
        }
    };
    xhttp.send('username=' + username);
}
