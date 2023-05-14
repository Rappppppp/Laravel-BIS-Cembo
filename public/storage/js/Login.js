function register() {
    var x = document.getElementById("login-form-container");
    x.style.display = "none";
    x = document.getElementById("register-form-container-0");
    x.style.display = "block";
}

function back(i) {
    if (i === -1) {
        var x = document.getElementById("login-form-container");
        x.style.display = "block";
        x = document.getElementById("register-form-container-0");
        x.style.display = "none";
    }
    else {
        var x = document.getElementById("register-form-container-" + (i + 1));
        x.style.display = "none";
        x = document.getElementById("register-form-container-" + i);
        x.style.display = "block";
    }
}

function next(i) {
    var x = document.getElementById("register-form-container-" + (i - 1));
    x.style.display = "none";
    x = document.getElementById("register-form-container-" + i);
    x.style.display = "block";
}