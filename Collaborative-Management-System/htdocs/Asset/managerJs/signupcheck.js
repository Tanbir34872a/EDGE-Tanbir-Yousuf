function getname(){
    let username = document.getElementById('username').value;
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirmPassword').value;
    let gender = document.getElementById('gender').value;
    let dob = document.getElementById('dob').value;
    let userType = document.getElementById('userType').value;

    let userCheck = 'abcdefghijkhmlopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let passwordCheck = '@#$&!0123456789abcdefghijkhmlopqrstuvwxyz';

    if (username === '' || name === '' || email === '' || password === '' || confirmPassword === '' || gender === '' || dob === '' || userType === '') {
        alert("Null value! Fill all the fields");
        return false;
    }

    else if (!alph(username, userCheck)) {
        alert("Username should contain only alphabetic characters with a mix of upper and lower case");
        return false;
    } else if (username.length < 4) {
        alert("Username should be at least 4 characters");
        return false;
    }

    else if (password !== confirmPassword) {
        alert("Confirm password does not match");
        return false;
    } else if (password.length < 4) {
        alert("Password should be at least 4 characters");
        return false;
    } else if (!validpass(password, passwordCheck)) {
        alert("Password should have alphabets, special characters, and numbers");
        return false;
    }

    else if (!validName(name)) {
        alert('Name must contain least two words');
        }
    return true;
}

  
function alph(input, checkString) {
    for (let i = 0; i < input.length; i++) {
        if (checkString.indexOf(input[i]) === -1) {
            return false;
        }
    }
    return true;
}

function validpass(input, checkString) {
    for (let i = 0; i < input.length; i++) {
        if (checkString.indexOf(input[i]) === -1) {
            return false;
        }
    }
    return true;
}

function validName(name) {
    let words = name.split(' ');
    return words.length >= 2;
}