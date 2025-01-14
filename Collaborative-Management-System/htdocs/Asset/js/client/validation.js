// Function to validate email format using a regular expression
function isEmail(email) {
    // Regular expression for validating email format
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

// Function to validate password format using a regular expression
function isPassword(password) {
    // Regular expression for validating password (at least 8 characters, including one non-alphanumeric character)
    return /^(?!.* )(?=.*[^a-zA-Z0-9]).{8,}$/m.test(password);
}

// Function to check if the username field is empty or if the username already exists (using AJAX)
function checkUsername() {
    // Check if the username input field is empty
    if (document.getElementById("username").value == "") {
          // Set error message for empty username
          document.getElementById("usernameErr").innerHTML = "Username can't be blank";
          document.getElementById("usernameErr").style.color = "red";
          document.getElementById("username").style.borderColor = "red";
    } else {
        // AJAX request to server to check if username exists
        var username = document.getElementById("username").value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../controller/chcekusername.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            // Process server response
            if (this.status == 200) {
                if (this.responseText == "exists") {
                    // Set error message if username exists
                    document.getElementById("usernameErr").innerHTML = "Username already exists";
                    document.getElementById("usernameErr").style.color = "red";
                    document.getElementById("username").style.borderColor = "red";
                } else {
                    // Clear error message if username does not exist
                    document.getElementById("usernameErr").innerHTML = "";
                    document.getElementById("username").style.borderColor = "green";
                }
            }
        };
        xhr.send('username=' + username);
    }
}
// Function to check if the email field is empty or invalid
function checkEmail() {
    // Check if the email input field is empty
    if (document.getElementById("email").value == "") {
          // Set error message for empty email
          document.getElementById("emailErr").innerHTML = "Email can't be blank";
          document.getElementById("emailErr").style.color = "red";
          document.getElementById("email").style.borderColor = "red";
    } else if(!isEmail(document.getElementById("email").value)) {
        // Set error message for invalid email format
        document.getElementById("emailErr").innerHTML = "Invalid email address. Please use the format: someone@example.com.";
        document.getElementById("emailErr").style.color = "red";
        document.getElementById("email").style.borderColor = "red";
    } else {
        // Clear error message if email is valid
        document.getElementById("emailErr").innerHTML = "";
        document.getElementById("email").style.borderColor = "green";
    }
}

// Function to check if the password field is empty or invalid
function checkPassword() {
    // Check if the password input field is empty
    if (document.getElementById("userpassword").value == "") {
          // Set error message for empty password
          document.getElementById("passwordErr").innerHTML = "Password can't be blank";
          document.getElementById("passwordErr").style.color = "red";
          document.getElementById("userpassword").style.borderColor = "red";
    } else if(!isPassword(document.getElementById("userpassword").value)) {
        // Set error message for invalid password format
        document.getElementById("passwordErr").innerHTML = "Password must contain at least one of the special character (@,#,$,%)";
        document.getElementById("passwordErr").style.color = "red";
        document.getElementById("userpassword").style.borderColor = "red";
    } else {
        // Clear error message if password is valid
        document.getElementById("passwordErr").innerHTML = "";
        document.getElementById("userpassword").style.borderColor = "green";
    }
}

// Function to check if the confirm password field matches the password field
function checkCpassword() {
    // Check if the confirm password field is empty
    if (document.getElementById("confirmpassword").value == "") {
          // Set error message for empty confirm password
          document.getElementById("cpasswordErr").innerHTML = "Password can't be blank";
          document.getElementById("cpasswordErr").style.color = "red";
          document.getElementById("confirmpassword").style.borderColor = "red";
    } else if(document.getElementById("confirmpassword").value != document.getElementById("userpassword").value) {
        // Set error message if passwords do not match
        document.getElementById("cpasswordErr").innerHTML = "Password does not match";
        document.getElementById("cpasswordErr").style.color = "red";
        document.getElementById("confirmpassword").style.borderColor = "red";
    } else {
        // Clear error message if passwords match
        document.getElementById("cpasswordErr").innerHTML = "";
        document.getElementById("confirmpassword").style.borderColor = "green";
    }
}

// Function to check if the phone field is empty or invalid
function checkPhone() {
    // Check if the phone field is empty
    if (document.getElementById('phone').value == "") {
          // Set error message for empty date of birth
          document.getElementById("phoneErr").innerHTML = "Phone can't be blank";
          document.getElementById("phoneErr").style.color = "red";
          document.getElementById("phone").style.borderColor = "red";
    } 
    else {
        // Clear error message if phone is valid
        document.getElementById("phoneErr").innerHTML = "";
        document.getElementById("phone").style.borderColor = "green";
    }
}

// Function to check if the date of birth field is empty or invalid
function checkDob() {
    // Get today's date
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0');
    let yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    // Check if the date of birth field is empty
    if (document.getElementById('dob').value == "") {
          // Set error message for empty date of birth
          document.getElementById("dobErr").innerHTML = "Date of Birth can't be blank";
          document.getElementById("dobErr").style.color = "red";
          document.getElementById("dob").style.borderColor = "red";
    } else if(document.getElementById("dob").value >  today) {
          // Set error message for invalid date of birth
          document.getElementById("dobErr").innerHTML = "You can't be born in the future";
          document.getElementById("dobErr").style.color = "red";
          document.getElementById("dob").style.borderColor = "red";
    } else {
        // Clear error message if date of birth is valid
        document.getElementById("dobErr").innerHTML = "";
        document.getElementById("dob").style.borderColor = "green";
    }
}

// Function to check if the address field is empty
function checkAddress() {
    // Check if the address field is empty
    if (document.getElementById('address').value == "") {
          // Set error message for empty address
          document.getElementById("addressErr").innerHTML = "Address can't be blank";
          document.getElementById("addressErr").style.color = "red";
          document.getElementById("address").style.borderColor = "red";
    } else {
        // Clear error message if address is valid
        document.getElementById("addressErr").innerHTML = "";
        document.getElementById("address").style.borderColor = "green";
    }
}

// Function to check if the user type is selected
function checkUsertype() {
    // Check if the user type is not selected
    if (document.getElementById('usertype').value == "NULL") {
          // Set error message for unselected user type
          document.getElementById("usertypeErr").innerHTML = "Select a usertype";
          document.getElementById("usertypeErr").style.color = "red";
          document.getElementById("usertype").style.borderColor = "red";
    } else {
        // Clear error message if user type is selected
        document.getElementById("usertypeErr").innerHTML = "";
        document.getElementById("usertype").style.borderColor = "green";
    }
}
