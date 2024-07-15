function signIn() {
    var un = document.getElementById("un");
    var pw = document.getElementById("pw");

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t === "success") {
                window.location = "home.php";
            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(f);
}

function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            }
        }
    };

    r.open("GET", "signOutProcess.php", true);
    r.send();

}

function addNewPatient() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var contact = document.getElementById("contact");
    var age = document.getElementById("age");
    var nic = document.getElementById("nic");
    var gender = document.getElementById("gender");

    var f = new FormData();
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("contact", contact.value);
    f.append("age", age.value);
    f.append("nic", nic.value);
    f.append("gender", gender.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);

            if (response == "success") {
                window.location = "newPatient.php";
            } else {
                alert(response);
            }

        }
    }

    request.open("POST", "addNewPatientProcess.php", true);
    request.send(f);
}