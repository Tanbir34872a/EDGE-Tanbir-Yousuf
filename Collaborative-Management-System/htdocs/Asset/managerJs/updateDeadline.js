function updateDeadline() {
    let project_name = document.getElementById("project_name").value;
    let deadline = document.getElementById("deadline").value;

    if (!project_name.trim() || !deadline.trim()) {
        //alert("Fields cannot be empty");
        document.getElementById("h1").innerHTML = "Fields cannot be empty";
        return false;
    }

    let deadlineArray = deadline.split(" ");
    let year = parseInt(deadlineArray[0], 10);
    let day = parseInt(deadlineArray[1], 10);
    let month = parseInt(deadlineArray[2], 10);

    if (day < 1 || day > 31 || month < 1 || month > 12 || year < 1900 || year < 2023) {
        document.getElementById("h1").innerHTML = "Must be in the valid range";
        return false;
    } else {
        let jsonData = {
            'project_name': project_name,
            'deadline': deadline
        };
        
        // Create a URL-encoded string from the JSON data
        let formData = new URLSearchParams(jsonData);
        
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../controller/managerController/updateDeadlinecheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    let response = JSON.parse(this.responseText);
        
                    if (response.success) {
                        alert("Deadline updated successfully");
                    } else {
                        alert("Failed to update deadline: " + response.message);
                    }
                } else {
                    alert("Error updating deadline. HTTP status: " + this.status);
                }
            }
        };
        
        xhttp.onerror = function () {
            alert("Network error occurred while updating deadline.");
        };
        
        // Send the URL-encoded form data
        xhttp.send(formData);
    }
}        