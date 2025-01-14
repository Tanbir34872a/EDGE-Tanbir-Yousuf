//function search user 
function searchUser()
{
    let username= document.getElementById("searchUsername").value
    searchData= {
        "username":username,
        "name":"",
        "email":"",
        "gender":"",
        "dob":"",
        "userType":"",  
    }
    console.log(searchData);
    if(username=="")
    {
        alert("nothing to search. Please provide value");
        return false;
    }
    else{
        let data = JSON.stringify(searchData);
        let xhttp = new XMLHttpRequest();
        xhttp.open("post", "../../controller/admin/searchInfoCheck.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("searchUsername=" + data);

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
            let searchData = JSON.parse(this.responseText);

            if (!searchData) {
                document.getElementById("searchResult").innerHTML = "No data found";
                return false;
            }
            console.log(searchData);
            let userInfo="<table border=1>";
            userInfo+=
            "<tr><th>Username</th><th>Name</th><th>email</th><th>Gender</th><th>Date of Birth</th><th>UserType</th><th>Option</th></tr>";
            userInfo += `<tr>
            <td>${searchData.username}</td>
            <td>${searchData.name}</td>
            <td>${searchData.email}</td>
            <td>${searchData.gender}</td>
            <td>${searchData.dob}</td>
            <td>${searchData.userType}</td>
            <td><a href='../../view/admin/modifyAccount.php?username=${searchData.username}&name=${searchData.name}&userType=${searchData.userType}'>Modify |</a>
            <a href='../../view/admin/removeAccount.php?username=${searchData.username}'> Remove </a>
            </td>
            </tr>`;
            document.getElementById("searchResult").innerHTML = userInfo;
            }
        };
        return false;
    }
}
// func for search project
function searchProject()
{
    let projectName= document.getElementById("searchProjectName").value
    searchData= {
        "projectName":projectName,
        "projectType":"",
        "projectDetails":"",
        "username":"",  
    }
    console.log(searchData);
    if(projectName=="")
    {
        alert("nothing to search. Please provide value");
        return false;
    }
    else{

        let data = JSON.stringify(searchData);
        let xhttp = new XMLHttpRequest();
        xhttp.open("post", "../../controller/admin/searchInfoCheck.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("searchProject=" + data);

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
            let searchData = JSON.parse(this.responseText);

            if (!searchData) {
                document.getElementById("searchResult").innerHTML = "No data found";
                return false;
            }
            console.log(searchData);
            let projectInfo="<table border=1>";
            projectInfo+=
            "<tr><th>Project Name</th><th>Project Type</th><th>Project Details</th><th>Assigned Manager</th></tr>";
            projectInfo += `<tr>
            <td>${searchData.projectName}</td>
            <td>${searchData.projectType}</td>
            <td>${searchData.projectDetails}</td>
            <td>${searchData.username}</td>
            </tr>`;
            document.getElementById("searchResult").innerHTML = projectInfo;
            }
        };
        return false;
    }
}
//search any data
function searchInfo()
{
    let searchValue= document.getElementById("searchValue").value
    searchData= {
        "searchValue":searchValue, //any search value usernam or project type
    }
    console.log(searchData);
    if(searchValue=="")
    {
        return false;
    }
    else{

        let data = JSON.stringify(searchData);
        let xhttp = new XMLHttpRequest();
        xhttp.open("post", "../../controller/admin/searchInfoCheck.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("searchData=" + data);

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
            let searchData = JSON.parse(this.responseText);

            if (!searchData) {
                document.getElementById("searchResult").innerHTML = "No data found";
                return false;
            }
            console.log(searchData);

            //check if the object has project name property
            if (searchData.hasOwnProperty('projectName'))
            {
                let projectInfo="<table border=1>";
                projectInfo+=
                "<tr><th>Project Name</th><th>Project Type</th><th>Project Details</th><th>Assigned Manager</th></tr>";
                projectInfo += `<tr>
                <td>${searchData.projectName}</td>
                <td>${searchData.projectType}</td>
                <td>${searchData.projectDetails}</td>
                <td>${searchData.username}</td>
                </tr>`;
                document.getElementById("searchResult").innerHTML = projectInfo;
            }
            else
            {
                let userInfo="<table border=1>";
                userInfo+=
                "<tr><th>Username</th><th>Name</th><th>email</th><th>Gender</th><th>Date of Birth</th><th>UserType</th><th>Option</th></tr>";
                userInfo += `<tr>
                <td>${searchData.username}</td>
                <td>${searchData.name}</td>
                <td>${searchData.email}</td>
                <td>${searchData.gender}</td>
                <td>${searchData.dob}</td>
                <td>${searchData.userType}</td>
                <td><a href='../../view/admin/modifyAccount.php?username=${searchData.username}&name=${searchData.name}&userType=${searchData.userType}'>Modify |</a>
                <a href='../../view/admin/removeAccount.php?username=${searchData.username}'> Remove </a>
                </td>
                </tr>`;            
                document.getElementById("searchResult").innerHTML = userInfo;    
            }
            }
        };
        return false;
    }
}

