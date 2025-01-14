//search button feature
function search() {
    let project_name = document.getElementById('project_name').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../../controller/managerController/viewproject.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('showproject').innerHTML = this.responseText;
        }
    }

    xhttp.send("pname=" + project_name);
}

//show all projects under all current task
function showProjects() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../../controller/managerController/viewproject.php", true);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("projects").innerHTML = this.responseText;
        }
    };
    xhttp.send();
}
// Call the show function on page load
window.onload = function () {
    showProjects();
};

function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    }

    const xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const suggestions = JSON.parse(this.responseText);

            if (suggestions.length === 0) {
                document.getElementById("txtHint").innerHTML = "No matching suggestions found.";
                return false;
            } else {
                document.getElementById("txtHint").innerHTML = suggestions.join(', ');
            }
        }
    };

    xhttp.open("GET", "../../controller/managerController/setTaskPrioritycheck.php?q=" + str, true);
    xhttp.send();
}