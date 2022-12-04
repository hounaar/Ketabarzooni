const orderconfirm = document.querySelector(".order-confirm");

orderconfirm.onsubmit = (e) => {
    e.preventDefault();
}

orderconfirm.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/others/dashboard/php/order.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "موفق") {
                    swal({
                        title: "",
                        text: "کاربر گرامی سفارش شما با موفقیت ثبت شد",
                        icon: "success",
                        button: "باشه",
                    });
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