//chararcter check helper function
function hasCharCheck()
{
  pTypeCharCheck= '!@#$%^&*()+=-[]{}|:;"\'<>,.?/~`';
  let projectType = document.getElementById("projectType").value;

  for(let i =0; i<projectType.length;i++) // check wheather pass have special char or not
    {
        if(pTypeCharCheck.includes(projectType[i]))
        {
          return true;
        }
    }
    return false;
}
//creating project validation 
function createProjectVal() {
  let projectName = document.getElementById("projectName").value;
  let projectType = document.getElementById("projectType").value;
  let projectDetails = document.getElementById("projectDetails").value;

  let project = {
    "projectName": projectName,
    "projectType": projectType,
    "projectDetails": projectDetails,
  };
  if (projectName == "" || projectType == "" || projectDetails == "") {
     alert("Null value! Have to provide all the value");
    return false;
  }
  else if(projectName == "")
  {
    document.getElementById('resultPN').innerHTML = "Have to provide all the value";
    return false;
  }
  else if(projectType == "")
  {
    document.getElementById('resultPT').innerHTML = "Have to Provide Project Type";
    return false;
  }
  else if(projectDetails == "")
  {
    document.getElementById('resultPD').innerHTML = "Have to Provide Project Details";
    return false;
  }
  else if (hasCharCheck()) {
    //alert("Project Type cannot contain any special character");
    document.getElementById('resultPT').innerHTML = "Project Type cannot contain any special character";
    return false;
  } 
  else if(checkProjecName())
  {
    alert("cannot created");
    return false;
  }
  else 
  {
    let data = JSON.stringify(project);
    console.log(data);
        let xhttp = new XMLHttpRequest();
        xhttp.open("post", "../../controller/admin/createProjectCheck.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("projectData=" + data);
        xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let projectRR = JSON.parse(this.responseText);
            
            if (projectRR.success === true) {
            alert("project Created");
            }
            else{
                alert(projectRR.error||"Unexpected error");
                return false;
            }
        }
        };
  }
  return false;
}
//check create project existance in DB
function checkProjecName()
{
  let projectName = document.getElementById('projectName').value;

    let xhttp = new XMLHttpRequest();

    xhttp.open('post', '../../controller/admin/allPrimaryKeyCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('resultPN').innerHTML = this.responseText;
            return false;
        }
    };
    xhttp.send('projectName=' + projectName);

}