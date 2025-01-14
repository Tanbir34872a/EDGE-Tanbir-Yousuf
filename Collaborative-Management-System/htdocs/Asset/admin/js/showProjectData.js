function getProjectInfo() {
  let projects = {
    projectName: "",
    projectType: "",
    projectDetails: "",
  };
  let data = JSON.stringify(projects);
  let xhttp = new XMLHttpRequest();
  xhttp.open("post", "../../controller/admin/projectDetailsCheck.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("projectInfo=" + data);

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let projects = JSON.parse(this.responseText);
      //herper function call
      let projectInfo = buildProjectInfoTable(projects); 
      document.getElementById("projectInfo").innerHTML = projectInfo;
    }
  };
}
//helper function to all show project data
function buildProjectInfoTable(projects) {
  let tableHTML = "<table border=1>";
  tableHTML +=
    "<tr><th>Project Name</th><th>Project Type</th><th>Project Details</th><th>Option</th></tr>";
  for (let i = 0; i < projects.length; i++) {
    tableHTML += `<tr>
          <td>${projects[i].projectName}</td>
          <td>${projects[i].projectType}</td>
          <td>${projects[i].projectDetails}</td>
          <td><a href="../../view/admin/AssignManager.php?projectType=${projects.projectType}">Assign Manager</a></td>

        </tr>`;
  }
  tableHTML += "</table>";
  
  return tableHTML;
}
//show all current project with assigned manager 
function getAssignManagerInfo()
{
  let projectInfo = {
    projectName: "",
    projectType: "",
    projectDetails: "",
    username:"",
  };
  let data = JSON.stringify(projectInfo);
  let xhttp = new XMLHttpRequest();
  xhttp.open("post", "../../controller/admin/projectDetailsCheck.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("proAssignManInfo=" + data);

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let projectInfo = JSON.parse(this.responseText);
      //herper function call
      let projectsInfo = buildProjectAssignManTable(projectInfo); 
      document.getElementById("projectInfo").innerHTML = projectsInfo;
    }
  };
}
//helper fucntion for show getAssignManagerInfo data 
function buildProjectAssignManTable(projectInfo) {
  let tableHTML = "<table border=1>";
  tableHTML +=
    "<tr><th>Project Name</th><th>Project Type</th><th>Project Details</th><th>Assigned Manager</th></tr>";
  for (let i = 0; i < projectInfo.length; i++) {
    tableHTML += `<tr>
          <td>${projectInfo[i].projectName}</td>
          <td>${projectInfo[i].projectType}</td>
          <td>${projectInfo[i].projectDetails}</td>
          <td>${projectInfo[i].username}</td>
        </tr>`;
  }
  tableHTML += "</table>";
  
  return tableHTML;
}
//for all user information
function getAllUserInfo()
{
  userData= {
    "username":"",
    "name":"",
    "email":"",
    "gender":"",
    "dob":"",
    "userType":"",  
}
  let data = JSON.stringify(userData);
  let xhttp = new XMLHttpRequest();
  xhttp.open("post", "../../controller/admin/projectDetailsCheck.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("usersData=" + data);

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let usersData = JSON.parse(this.responseText);
      //console.log(projects);
      //herper function call
      let allUserInfo = buildUserInfoTable(usersData); 
      document.getElementById("userInfo").innerHTML = allUserInfo;
    }
  };
}
//helper fucntion for show getAssignManagerInfo data 
function buildUserInfoTable(usersData) {
  let tableHTML = "<table border=1>";
  tableHTML +=
  "<tr><th>Username</th><th>Name</th><th>email</th><th>Gender</th><th>Date of Birth</th><th>UserType</th></tr>";
  for (let i = 0; i < usersData.length; i++) {
    tableHTML += `<tr>
          <td>${usersData[i].username}</td>
          <td>${usersData[i].name}</td>
          <td>${usersData[i].email}</td>
          <td>${usersData[i].gender}</td>
          <td>${usersData[i].dob}</td>
          <td>${usersData[i].userType}</td>
        </tr>`;
  }
  tableHTML += "</table>";
  
  return tableHTML;
}
