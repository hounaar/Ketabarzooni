const form = document.querySelector(".editdata"),
    continueBtn = form.querySelector(".form-btn");
errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/others/dashboard/editdata/php/updator.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;

                if (data === "موفق") {
                    swal({
                        title: "انجام شد",
                        text: "اطلاعات شما با موفقیت تغییر یافت",
                        icon: "success",
                        button: "باشه",
                    });
                } else if (data === "مشکلی در ارتباط با ویرایش اطلاعات وجود دارد") {
                    errorText.style.display = "block";
                    errorText.textContent = data;

                } else if (data === "‌ایمیل معتبر نمیباشد") {
                    errorText.style.display = "block";
                    errorText.textContent = data;

                } else if (data === "پر کردن فیلد ها ضروریست") {
                    errorText.style.display = "block";
                    errorText.textContent = data;

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