function login() {
    var user = document.getElementById("user").value;
    var pass = document.getElementById("pass").value;

    // Tạo một tài khoản admin
    if (user == 'admin' && pass == '1') {
        swall({
            title: "",
            text: "Xin chào admin!",
            icon: "success",
            close: true,
            button: false,
        })
    }
    window.document("./index.html")
}