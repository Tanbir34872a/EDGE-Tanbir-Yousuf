function modifyAccountInfo() {

    let name= document.getElementById("name").value;
    let username= document.getElementById("username").value;
    let userType = document.querySelector('input[name="userType"]:checked').value;
    let fAlph= username.charCodeAt(0); // first char of username
    let fAlphName= name.charCodeAt(0); //first char of username
    
    let userInfo = {
        "name": name,
        "username": username,
        "userType":userType,
      };
      
    if(name==''&&username=='')
    {
        alert("empty fields");
        return false;
    }
    else if (username.length<5)
    {
        document.getElementById("resultUserame").innerHTML = "Username should be atleast 4 character";
        return false;
    }
    else if (name.length<4)
    {
        document.getElementById("resultName").innerHTML = "Name should be atleast 4 character";
        return false;
    }
    else if(!(fAlphName>=65&&fAlphName<=90)&&!(fAlphName<=122 &&fAlphName>=97))
    {
        document.getElementById("resultName").innerHTML = "Name have to start with letter";
        return false;
    }
    else{
        let data = JSON.stringify(userInfo);
        let xhttp = new XMLHttpRequest();
        xhttp.open("post", "../../controller/admin/modifyAccountCheck.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("userInfo=" + data);
        xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let allUserInfo = JSON.parse(this.responseText);

            if (allUserInfo.success === true) {
                let showInfo= showUpdateDataTable(userInfo);
                //alert("Userinfo Modified");
                document.getElementById("resultModify").innerHTML = username+" Infomation has been Modified";
                document.getElementById("showUpdatedData").innerHTML = showInfo;
            }
            else{
                alert(allUserInfo.error||"Unexpected error");
                return false;
            }
        }
        };
    }
    return false;
    
}
//data table for modified info
function showUpdateDataTable(userInfo) {
    let userInformation ="Updated User Information <hr>"+
        "<table>" +
        "<tr><td>Username: </td>" +
        `<td>${userInfo.username}</td></tr>` +
        "<tr><td>Name: </td>" +
        `<td>${userInfo.name}</td></tr>` +
        "<tr><td>User Type: </td>" +
        `<td>${userInfo.userType}</td></tr>` +
        "</table>";

    return userInformation;
}
