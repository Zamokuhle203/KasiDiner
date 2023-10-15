function closeForm() {

    window.location.href = "signin.php";

}

function closeContact(){
    window.location.href = "home.php";
}
/*
function formValCreate() {
    var name = document.forms["orderform"]["name"].value;
    var email = document.forms["orderform"]["email"].value;
    var cellno = document.forms["orderform"]["cellno"].value;
    var address = document.forms["orderform"]["address"].value;
    var password = document.forms["orderform"]["password"].value;

    var nameErr = document.getElementById("nameErr");
    var emailErr = document.getElementById("emailErr");
    var cellnoErr = document.getElementById("cellnoErr");
    var addressErr = document.getElementById("addressErr");
    var passwordErr = document.getElementById("passwordErr");

    // Perform client-side validation and sanitization
    var valid = true;

    if (name === "") {
        nameErr.textContent = "Name is required";
        valid = false;
    } else {
        nameErr.textContent = "";
    }

    if (email === "") {
        emailErr.textContent = "Email is required";
        valid = false;
    } else if (!validateEmail(email)) {
        emailErr.textContent = "Invalid email format";
        valid = false;
    } else {
        emailErr.textContent = "";
    }

    if (cellno === "") {
        cellnoErr.textContent = "Cellphone number required";
        valid = false;
    } else if (cellno.length !== 10 || !/^\d+$/.test(cellno)) {
        cellnoErr.textContent = "Invalid cellphone number";
        valid = false;
    } else {
        cellnoErr.textContent = "";
    }

    if (address === "") {
        addressErr.textContent = "Address is required";
        valid = false;
    } else {
        addressErr.textContent = "";
    }

    if (password === "") {
        passwordErr.textContent = "Password is required";
        valid = false;
    } else {
        passwordErr.textContent = "";
    }

    return valid;
}

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
*/