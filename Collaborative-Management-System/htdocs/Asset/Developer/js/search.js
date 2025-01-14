function searchEmp() {
  let NAME = document.getElementById("search").value;

  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../../controller/Developer/search.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("search-results").innerHTML = this.responseText;
      }
  };
  xhttp.send("name=" + NAME);
}

