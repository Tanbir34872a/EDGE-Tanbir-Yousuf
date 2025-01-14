function getInfo() {
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    if (username === '' || password === '') {
        alert('Empty field!');
        return false; 
    } else {
        return true;
    }
}
