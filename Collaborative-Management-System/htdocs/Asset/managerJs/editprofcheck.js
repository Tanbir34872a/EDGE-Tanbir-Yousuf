function edit() {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let gender = document.getElementById('gender').value;
        let dob = document.getElementById('dob').value;

        if (name === '' || email === '' || gender === '' || dob === '') {
            alert('Please fill in all fields.');
            return false;
        }
        else if (name.split(' ').length !== 2) {
            alert("Name should contain two words separated by a space");
            return false;
        }else if (!validemail(email)) {
            alert("Please enter a valid email address.");
            return false;
        }else{
            return true;
        }
    }

function validemail(email) {
        if (email.indexOf('@') === -1 || email.indexOf('.') === -1) {
            return false;
        }
        return true;
    }


