function editProfile() {
  let name = document.getElementById("name").value;
  let email = document.getElementById("email").value;
  let gender = document.querySelector('input[name="gender"]:checked');
  let dob = document.getElementById("dob").value;

  let fAlph = name.charCodeAt(0); //first alphabet username

  if (name == "" || email == "" || gender == null || dob == "") {
    alert("Null value! Have to provide all the value");
    return false;
  }
  //username validation
  else if (name.length < 4) {
    document.getElementById("resultName").innerHTML = "Name should be atleast 4 character";
    return false;
  } 
  else if (!(fAlph >= 65 && fAlph <= 90) && !(fAlph <= 122 && fAlph >= 97)) {
    document.getElementById("resultName").innerHTML = "Name must start with latter";
    return false;
  } 
  else if (!email.includes("@") || !email.includes(".com")) {
    document.getElementById("resultValidEmail").innerHTML = "Email address must be valid";
    return false;
  }
}
