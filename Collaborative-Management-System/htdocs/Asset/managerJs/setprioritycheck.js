function showProjectsForUser() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../../controller/managerController/showProjectsForUser.php", true);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("projects").innerHTML = this.responseText;
        }
    };
    xhttp.send();
}
// Call the show function on page load
window.onload = function () {
    showProjectsForUser();
};

//check if the priority is valid
function getPriority() {
    console.log("getPriority function called");
    let project_name = document.getElementById('project_name').value;
    let project_type = document.getElementById('project_type').value;
    let priority_task = document.getElementById('priority_task').value;
    let deadline = document.getElementById('deadline').value;

    let alph = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    let setPriority = {
        "project_name": project_name,
        "project_type": project_type,
        "priority_task": priority_task,
        "deadline": deadline,
    };

    if (project_name === '' || project_type === '' || priority_task === '' || deadline === '') {
        alert('Fill up the fields');
        return false;
    } else {
        // Additional checks can be added here using if statements
        for (let i = 0; i < priority_task.length; i++) {
            if (alph.indexOf(priority_task[i]) === -1) {
                alert('Task priority must be a valid letter');
                return false;
            }
        }

        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../../controller/managerController/setTaskPrioritycheck.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    if (this.responseText.trim() !== '') {
                        let response = JSON.parse(this.responseText);
                        if (response.success === true) {
                            alert("Priority added successfully!");
                        } else {
                            alert(response.error || "Unexpected error");
                        }
                    } else {
                        alert("Empty response received");
                    }
                } else {
                    alert("Error in AJAX request");
                }
            }
        };

        console.log("Sending AJAX request");

        // Converting setPriority object to URL-encoded format
        let formData = Object.keys(setPriority).map(key => encodeURIComponent(key) + '=' + encodeURIComponent(setPriority[key])).join('&');
        xhttp.send(formData);
        //xhttp.send(JSON.stringify(setPriority));
    }
    return false;
}




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


