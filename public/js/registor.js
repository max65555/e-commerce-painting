function registor() {
    let fullname = document.getElementById("fullname");
    let email = document.getElementById("email");
    let mobile = document.getElementById("mobile");
    let password = document.getElementById("password");
    let repassword = document.getElementById("repassword");
    let ResgistorForm = document.getElementById("resgistorForm");

    if (
        fullname.value == "" ||
        email.value == "" ||
        mobile.value == "" ||
        password.value == "" ||
        repassword.value == ""
    ) {
        alert("Hay nhap day du thong tin");
    } else if (password.value != repassword.value) {
        alert("Mat khau khong trung khop");
    } else {
        ResgistorForm.submit();
    }
}

function login() {
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let loginForm = document.getElementById("login__form");
    if (email.value == "" || password.value == "") {
        alert("fill your email and password pls :)))");
    } else {
        loginForm.submit();
    }
    console.log(password);
}
