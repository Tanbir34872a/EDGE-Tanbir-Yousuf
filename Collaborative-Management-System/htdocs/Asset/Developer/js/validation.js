const emailError = document.getElementById("email-error")
function validateEmail() {
    const email = document.getElementById("email").value
    var emailcheck = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (!emailcheck.test(email)) {
        emailError.innerHTML = "Please provide a valid email address"
    }
    else {
        emailError.innerHTML= 'correct email'
        emailError.style.color ="green"
    }

}


const nameError = document.getElementById("name-error")
function validateName() {
    const name = document.getElementById("name").value
    
    if (name.length < 2) {
        nameError.innerHTML = "Please provide a valid name"
    }
    else {
        nameError.innerHTML= 'correct name'
        nameError.style.color ="green"
    }
  
}

const passError = document.getElementById("pass-error")
function validatePass() {
    const pass = document.getElementById("password").value
    var letter = /[a-zA-Z]/;
    var number = /[0-9]/;
    var specialChar = /[#$@!%&*?]/
    
    
    if (pass.length < 8) {
        passError.innerHTML = "Please provide 8 charrecter"
    }
    else if (!specialChar.test(pass)) {
        passError.innerHTML = "Must have spacial charrecter"
    }
    else if (!letter.test(pass)){
        passError.innerHTML = "Must have Upper case letter"
    }
    else if (!number.test(pass)){
        passError.innerHTML = "Must have number"
    }
    else {
        passError.innerHTML= 'correct password'
        passError.style.color ="green"
    }
  
}


const cpassError = document.getElementById("cpass-error")
function validateCPass() {
    const cpass = document.getElementById("confirmPassword").value
    const pass = document.getElementById("password").value

    if (pass !== cpass) {
        cpassError.innerHTML = "Password and Confirm Password dont match"
    }
    else if (pass == cpass) {
        cpassError.innerHTML = "Password match"
        cpassError.style.color ="green"
    }
    
}

const genderError = document.getElementById("gender-error")
function validateGender() {
    
    const gender = document.getElementById("gender").value
    if (gender) {
        genderError.innerHTML = "gender selected"
        genderError.style.color = "green"
    }
    else {
        genderError.innerHTML = "Please select a gender"
    }
    

}

// const typerror = document.getElementById("type-error")
// function validateType() {
    
//     const type = document.getElementById("type").value
//     if (type) {
//         typeError.innerHTML = "User Type selected"
//         typeError.style.color = "green"
//     }
//     else {
//         typeError.innerHTML = "Please select a User Type"
//     }
    

// }

const dobError = document.getElementById("dob-error")
function validateDOB() {
    const dob = document.getElementById("dob").value
    if (dob) {
        dobError.innerHTML = "Date of Birth selected"
        dobError.style.color = "green"
    }
    else {
        dobError.innerHTML = "Please select a Date of Birth"
    }
    

}

const usernameError = document.getElementById("username-error")
function validateUName() {
    const username = document.getElementById("username").value
    var number = /[0-9]/;
    if (username.length < 3) {
        usernameError.innerHTML = "Username must have 3 charrecter"
    }
    else if (!number.test(username)){
        usernameError.innerHTML = "Username must have a number"
    }

    else {
        usernameError.innerHTML= 'correct username'
        usernameError.style.color ="green"
    }

}


const typeError = document.getElementById("type-error");

function validateType() {
    const adminRadio = document.getElementById("admin");
    const devRadio = document.getElementById("dev");
    const managerRadio = document.getElementById("manager");
    const clientRadio = document.getElementById("client");

    if (!adminRadio.checked && !devRadio.checked && !managerRadio.checked && !clientRadio.checked) {
        typeError.innerHTML = "Please select a User Type";
    } else {
        typeError.innerHTML = "User Type selected";
        typeError.style.color = "green";
    }
}

// Add an event listener to each radio input to trigger the validation on change
document.getElementById("admin").addEventListener('change', validateType);
document.getElementById("dev").addEventListener('change', validateType);
document.getElementById("manager").addEventListener('change', validateType);
document.getElementById("clinte").addEventListener('change', validateType);




