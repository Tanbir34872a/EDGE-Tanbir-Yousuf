function roleAssign() {
  let devUsername = document.getElementById("username").value;
  let newRole = document.getElementById("newRole").value;

  if (devUsername == "" && newRole == "") {
    alert("please fill the all the fields");
    return false;
  }
  else if(devUsername == "")
  {
    document.getElementById("devUsername").innerHTML = "Have to select developer Username";
    return false;
  }
  else if(newRole == "")
  {
    document.getElementById("devNewRole").innerHTML = "New Role Fileds Empty ";
    return false;
  }
  else 
  {
    let xhttp = new XMLHttpRequest();
    xhttp.open("post", "../../controller/admin/roleAssignmentCheck.php", true);
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        alert("successfully assign new role");
        //document.getElementById("h1").innerHTML=this.responseText;
        window.location.href = "../../view/admin/roleAssignment.php";

        if (this.responseText.trim() === "success") {
          window.location.href = "../../view/admin/roleAssignment.php";
          document.getElementById("h1").innerHTML = this.responseText;
        }
      } else if (this.readyState == 4 && this.status == 404) {
        alert("unseccess");
      }
    };
    //sending data to backend
    let data = "username=" + devUsername + "&newRole=" + newRole;
    xhttp.send(data);
    return false;
  }
}
