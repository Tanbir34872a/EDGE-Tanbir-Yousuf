function removeAccount() {
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;

  let account = {
    "username": username,
    "password": password,
  };
  console.log(account);
  if (username == "") 
  {
    document.getElementById("removeAccountUsername").innerHTML = "Username Required";
    return false;
  } 
  else if (password == "")
  {
    //alert("please provide password to remove account");
    document.getElementById("removeAdminPassword").innerHTML = "please provide password to remove account";
    return false;
  } 
  else 
  {
    let data = JSON.stringify(account);
    let xhttp = new XMLHttpRequest();
    xhttp.open("post", "../../controller/admin/removeAccountCheck.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("account=" + data);

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let accounts = JSON.parse(this.responseText);
        console.log(accounts);

        if (accounts.success === true) {
          //document.getElementById("removeAccountInfo").innerHTML = accounts;
          alert("account removed");
        }
        else{
            alert(accounts.error||"Unexpected error");
            return false;
        }
      }
    };
  }
  return false;
}
