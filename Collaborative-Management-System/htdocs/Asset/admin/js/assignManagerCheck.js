function asssignManagerVal() {
  let managerUsername = document.getElementById("username").value;
  let projectName = document.getElementById("projectName").value;
  let projectType = document.getElementById("projectType").value;

  let assignMan = {
    "username": managerUsername,
    "projectName": projectName,
    "projectType": projectType,
  };

  //check empty fields
  if (managerUsername == "" && projectName == "" && projectType == "") {
    alert("Empty fileds! Please provide all the value");
    return false;
  }
  if(managerUsername == "")
  {
    document.getElementById("resultUsername").innerHTML = "Provide Manager Username";
    return false;
  }
  else if(projectName == "")
  {
    document.getElementById("resultProjectName").innerHTML = "Provide Project Name";
    return false;
  }
  else if(projectType == "")
  {
    document.getElementById("resultProjectType").innerHTML = "Provide Project Type";
    return false;
  }
  else
  {
    let data = JSON.stringify(assignMan);
    console.log(data);
        let xhttp = new XMLHttpRequest();
        xhttp.open("post", "../../controller/admin/assignManagerCheck.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("assignManData=" + data);
        xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let assignManRR = JSON.parse(this.responseText);
            if (assignManRR.success === true) {
            //document.getElementById("removeAccountInfo").innerHTML = accounts;
            alert("Manager Assigned");
            }
            else{
                alert(assignManRR.error||"Unexpected error");
                return false;
            }
        }
        };
  }
  return false;
}


