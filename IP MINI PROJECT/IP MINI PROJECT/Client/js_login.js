
function validate() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    console.log(username);
    console.log(password);
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(username)) {

    }
    else {
        const usererror = document.getElementById("usererror")
        usererror.innerHTML = "Please enter a valid email id"

    }


}

