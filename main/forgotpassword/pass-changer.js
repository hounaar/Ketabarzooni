const form = document.querySelector(".changepassform"),
    continueBtn = form.querySelector(".form-btn"),
    confirmText = form.querySelector(".confirmText"),
    errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/others/portal/forgotpass/php/changer.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;

                if (data === "رمز عبور با موفقیت تغییر یافت") {
                    confirmText.style.display = "block";
                    confirmText.textContent = data;
                } else {
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}