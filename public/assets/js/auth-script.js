// Fungsi untuk toggle visibility password dan icon
function setupPasswordToggle(buttonId, inputId, iconId) {
    const btn = document.getElementById(buttonId);
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    btn.addEventListener("click", () => {
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    });
}

setupPasswordToggle(
    "toggleLoginPasswordBtn",
    "password",
    "toggleLoginPasswordIcon"
);
setupPasswordToggle(
    "toggleRegisterPasswordBtn",
    "password_register",
    "toggleRegisterPasswordIcon"
);
setupPasswordToggle(
    "toggleConfirmPasswordBtn",
    "password_confirmation",
    "toggleConfirmPasswordIcon"
);

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const forgotForm = document.getElementById("forgot-form");

    const spinnerLogin = document.getElementById("spinner-overlay");
    const spinnerRegister = document.getElementById("regist-overlay");
    const spinnerForgot = document.getElementById("forgot-overlay");

    // === TOGGLE FORM ===
    document.getElementById("show-register").addEventListener("click", () => {
        loginForm.style.display = "none";
        forgotForm.style.display = "none";
        registerForm.style.display = "block";
    });

    document
        .getElementById("show-login-from-register")
        .addEventListener("click", () => {
            registerForm.style.display = "none";
            forgotForm.style.display = "none";
            loginForm.style.display = "block";
        });

    document
        .getElementById("show-forgot-password")
        .addEventListener("click", () => {
            loginForm.style.display = "none";
            registerForm.style.display = "none";
            forgotForm.style.display = "block";
        });

    document
        .getElementById("show-login-from-forgot")
        .addEventListener("click", () => {
            forgotForm.style.display = "none";
            registerForm.style.display = "none";
            loginForm.style.display = "block";
        });

    // === HELPER ===
    const showOverlay = (el) => {
        if (el) el.style.display = "flex";
    };
    const hideOverlay = (el) => {
        if (el) el.style.display = "none";
    };

    // === REGISTER ===
    if (registerForm) {
        registerForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            const url = registerForm.dataset.registerUrl;
            const data = {
                name: registerForm.name.value,
                email: registerForm.email.value,
                password: registerForm.password.value,
                password_confirmation: registerForm.password_confirmation.value,
                country: registerForm.country.value,
                phone: registerForm.phone.value,
            };

            showOverlay(spinnerRegister);

            try {
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify(data),
                });

                const result = await response.json();
                hideOverlay(spinnerRegister);

                if (response.ok) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: result.message || "Registrasi berhasil.",
                    });
                    registerForm.reset();
                    registerForm.style.display = "none";
                    loginForm.style.display = "block";
                } else {
                    let message = result.message || "Validasi gagal.";
                    if (result.errors) {
                        message = Object.values(result.errors)
                            .map((arr) => arr.join(", "))
                            .join("\n");
                    }
                    Swal.fire({ icon: "error", title: "Gagal", text: message });
                }
            } catch (err) {
                hideOverlay(spinnerRegister);
                Swal.fire({ icon: "error", title: "Error", text: err.message });
            }
        });
    }

    // === LOGIN ===
    if (loginForm) {
        loginForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            const url = loginForm.dataset.loginUrl;
            const formData = new FormData(loginForm);

            showOverlay(spinnerLogin);

            try {
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: formData,
                });

                const text = await response.text();
                let result = JSON.parse(text);
                hideOverlay(spinnerLogin);

                if (response.ok) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: result.message,
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false,
                    });
                    loginForm.reset();
                    if (result.redirect) {
                        setTimeout(
                            () => (window.location.href = result.redirect),
                            2000
                        );
                    }
                } else {
                    Swal.fire(
                        "Gagal",
                        result.message || "Login gagal.",
                        "error"
                    );
                }
            } catch (err) {
                hideOverlay(spinnerLogin);
                Swal.fire("Error", err.message, "error");
            }
        });
    }

    // === FORGOT PASSWORD ===
    if (forgotForm) {
        forgotForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            const url = forgotForm.dataset.forgotUrl;
            const formData = new FormData();
            formData.append("email", forgotForm.email.value);

            showOverlay(spinnerForgot);

            try {
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: formData,
                });

                const result = await response.json();
                hideOverlay(spinnerForgot);

                if (response.ok) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text:
                            result.message ||
                            "Link reset password telah dikirim ke email Anda.",
                    });
                    forgotForm.reset();
                    forgotForm.style.display = "none";
                    loginForm.style.display = "block";
                } else {
                    Swal.fire(
                        "Gagal",
                        result.message || "Email tidak ditemukan.",
                        "error"
                    );
                }
            } catch (error) {
                hideOverlay(spinnerForgot);
                Swal.fire(
                    "Error",
                    "Gagal mengirim data: " + error.message,
                    "error"
                );
            }
        });
    }
});
