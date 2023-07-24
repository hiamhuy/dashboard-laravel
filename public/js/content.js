const file = document.getElementById("avatar");
const image_preview = document.querySelector("#imgpreview");

if (file != null && file != undefined) {
    file.addEventListener("change", (e) => {
        if (e.target.files && e.target.files.length > 0) {
            const getSizeImage = e.target.files[0].size;
            if (getSizeImage > 1024 * 1024) {
                alert("Chỉ cho phép tải tệp tin nhỏ hơn 1MB");
            } else {
                var nameFile = e.target.files[0].name;
                const reader = new FileReader();
                reader.addEventListener("load", (e) => {
                    image_preview.src = e.target.result;
                });
                reader.readAsDataURL(e.target.files[0]);
            }
        }
    });
}
const image = document.getElementById("image");
const thumbpreview = document.querySelector("#thumbpreview");
if (image != null && thumbpreview != undefined) {
    image.addEventListener("change", (e) => {
        if (e.target.files && e.target.files.length > 0) {
            const getSizeImage = e.target.files[0].size;
            var nameFile = e.target.files[0].name;
            const reader = new FileReader();
            reader.addEventListener("load", (e) => {
                thumbpreview.src = e.target.result;
            });
            reader.readAsDataURL(e.target.files[0]);
        }
    });
}

//show pass
const input_pass = document.getElementById("password");
const iShowpass = document.getElementById("show_psw");
const icon = document.querySelector(".fa-eye-slash");

if (iShowpass != null && iShowpass != undefined) {
    iShowpass.addEventListener("click", (e) => {
        input_pass.type = input_pass.type == "password" ? "text" : "password";
        icon.classList.toggle("fa-eye");
    });
}

const btn_changepass = document.querySelector(".btn-changepass");
const hideForm = document.querySelectorAll(".fm-pass.d-none");

if (btn_changepass != null) {
    btn_changepass.addEventListener("click", () => {
        hideForm.forEach((form) => {
            form.classList.toggle("d-none");
        });
    });
}
