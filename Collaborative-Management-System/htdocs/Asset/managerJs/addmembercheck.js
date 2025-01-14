function getmember() {
    let qa = document.getElementById('QA').checked;
    let sm = document.getElementById('SM').checked;
    let sa = document.getElementById('SA').checked;
    let usernameSelect = document.getElementById('username');
    let username = usernameSelect.options[usernameSelect.selectedIndex].value;
    let role;

    if (qa) {
        role = 'Quality Assurance';
    } else if (sm) {
        role = 'Software Manager';
    } else if (sa) {
        role = 'Software Architect';
    }
    
    if (username === "Select user") {
        document.getElementById('h1').innerText = "*Select a user";
        return false;
    } else if (!qa && !sm && !sa) {
        document.getElementById('h2').innerText = "*Select Role";
        return false;
    }

    let data = {
        username: username,
        role: role
    };

    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                let response = JSON.parse(this.responseText);
                document.getElementById('h1').innerHTML = response.message;
            } else if (this.status == 400) {
                let response = JSON.parse(this.responseText);
                alert(response.message); // Display an alert with the error message
            }
        }
    };


    xhttp.send(JSON.stringify(data));
    return true;
}

function getUser(){
    let username = document.getElementById('username').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../../controller/managerController/addMemberCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('h1').innerHTML = this.responseText;
        }
    };
    xhttp.send('username=' + username);
}


// Function to display developers on page load
// function show() {
//     let xhttp = new XMLHttpRequest();

//     xhttp.open("GET", "../controller/showDevelopers.php", true);

//     xhttp.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             document.getElementById("users").innerHTML = this.responseText;
//         }
//     };

//     xhttp.send();
// }

// // Call the show function on page load
// window.onload = function () {
//     show();
// };

