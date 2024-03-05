function validateForm() {
    var password = document.forms["registrationForm"]["password"].value;
    var cpassword = document.forms["registrationForm"]["cpassword"].value;

    if (password !== cpassword) {
        alert("Passwords do not match!");
        return false;
    }

    // If passwords match, reset the form
    document.getElementById("registrationForm").reset();

    return true;
}
