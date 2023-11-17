function regVal() {
    const fname = document.getElementById("name").value;
    const phno = document.getElementById("phno").value;
    const email = document.getElementById("email").value;
    const pass = document.getElementById("password").value;

    const nameErr = document.getElementById("nameErr");
    const phErr = document.getElementById("phErr");
    const emailErr = document.getElementById("emailErr");
    const passErr = document.getElementById("passErr");
    var count = 0;

    if (/^[a-zA-Z ]+$/.test(fname)) {
        nameErr.innerHTML = "<i class='bi bi-check-circle-fill' style='color:green;'></i>";
        count++
    }
    else {

        nameErr.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Please enter a valid name";

    }

    if (/^\+?[1-9][0-9]{9}$/.test(phno)) {
        phErr.innerHTML = "<i class='bi bi-check-circle-fill' style='color:green;'></i>"
        count++
    }
    else {

        phErr.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Please enter a valid phone number";

    }
    if (/^\S+@\S+\.\S+$/.test(email)) {
        emailErr.innerHTML = "<i class='bi bi-check-circle-fill' style='color:green;'></i>";
        count++
    }
    else {

        emailErr.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Please enter a valid email Id";

    }

    if (pass == "" || pass.length <= 10) {
        passErr.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Please enter a valid password";
        count--
    }
    else {
        passErr.innerHTML = "<i class='bi bi-check-circle-fill' style='color:green;'></i>";
        varcheck = rpassCheck(pass);
        if (varcheck) {
            count++
        }
    }
    if (count == 4) {

        console.log(hello);
    }
    else {
        return false
    }

}
function rpassCheck(pass) {
    const rpassword = document.getElementById("rpassword").value;
    const rpassErr = document.getElementById("rpassErr");
    if (rpassword == pass) {
        rpassErr.innerHTML = "<i class='bi bi-check-circle-fill' style='color:green;'></i>"
        return true
    }
    else {
        rpassErr.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> The passwords do not match"
        return false
    }
}