const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
const forgetBtn = document.querySelector("label.forget");
const forgetLink = document.querySelector("form .pass-link a");


signupBtn.onclick = (() => {
    loginForm.style.marginLeft = "-50%";
    loginText.style.marginLeft = "-58%";
});
loginBtn.onclick = (() => {
    loginForm.style.marginLeft = "0%";
    loginText.style.marginLeft = "0%";
});
forgetBtn.onclick = (() => {
    loginForm.style.marginLeft = "-100%"
    loginText.style.marginLeft = "-108%"
})
signupLink.onclick = (() => {
    signupBtn.click();
    return false;

});
forgetLink.onclick = (() => {
    forgetBtn.click();
    return false;
});


// validate cho login

function validate() {
    var user = document.getElementById("user").value;
    var pass = document.getElementById("pass").value;
    //Đặt 1 Admin ảo để đăng nhập quản trị
    if (username == "admin" && password == "123456") {
        swal({
            title: "",
            text: "Xin chào Võ Trường",
            icon: "success",
            close: true,
            button: false,
        });
        window.location = "index.html";
        return true;

    }
    //Nếu không nhập gì mà nhấn đăng nhập thì sẽ báo lỗi
    if (user == "" && pass == "") {
        swal({
            title: "",
            text: "Bạn chưa điền đầy đủ thông tin đăng nhập...",
            icon: "error",
            close: true,
            button: "Thử lại",
        });

        return false;

    }
}