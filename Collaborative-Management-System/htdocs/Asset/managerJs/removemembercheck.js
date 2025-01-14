function remove() {
    let password = document.getElementById("password").value;
    let addMemberId = document.getElementById("addMemberId").value;
    let xhttp = new XMLHttpRequest();
  
    xhttp.open("POST", "../../controller/managerController/removeMemberCheck.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                alert(this.responseText);
                //window.location.href = '../views/removemember.php';
            } else {
                alert("Error removing member");
            }
        }
    };
    xhttp.send("password=" + password + "&addMemberId=" + addMemberId);
  }
  
//   function showMembers() {
//       let xhttp = new XMLHttpRequest();
      
//       xhttp.open("GET", "../controller/showaddedmembers.php", true);
  
//       xhttp.onreadystatechange = function () {
//           if (this.readyState == 4 && this.status == 200) {
//               document.getElementById("members").innerHTML = this.responseText;
//           }
//       };
  
//       xhttp.send();
//   }

  function searchToRemove(){
    let username = document.getElementById('username').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../../controller/managerController/searchToRemove.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('h1').innerHTML = this.responseText;
        }
    }

    xhttp.send("username=" + username);
  }

  function showAddedMembers() {
    let userInfo = {
        username: "",
        role: "",
    };
    let data = "userInfo=" + JSON.stringify(userInfo);

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../../controller/managerController/showaddedmembers.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let userInfos = JSON.parse(this.responseText);
            let tableHTML = "<table border=1>";
            tableHTML += "<tr><th>Username</th><th>Role</th></tr>";

            for (let i = 0; i < userInfos.length; i++) {
                tableHTML += `<tr>
                    <td>${userInfos[i].username}</td>
                    <td>${userInfos[i].role}</td>
                </tr>`;
            }

            tableHTML += "</table>";
            console.log(userInfos);
            document.getElementById("membersToShow").innerHTML = tableHTML;
        }
    };
}
