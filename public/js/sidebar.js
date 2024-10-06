document.addEventListener('DOMContentLoaded', function () {
    var sidebar = document.getElementById('sidebar');
    var content = document.getElementById('content');
    var toggleBtn = document.getElementById('toggle-btn');
    var changePicBtn = document.getElementById('change-pic-btn');
    var profilePictureInput = document.getElementById('profile-picture-input');
    var profilePicture = document.getElementById('profile-picture');
    var profileForm = document.getElementById('profile-form');


    toggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('open');
        content.classList.toggle('open');
    });

    changePicBtn.addEventListener('click', function () {
        profilePictureInput.click();
    });

    profilePictureInput.addEventListener('change', function () {
        var file = profilePictureInput.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            profilePicture.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            profilePicture.src = "path/to/default/profile.jpg";
        }
    });

    profileForm.addEventListener('submit', function (event) {
        event.preventDefault();
        alert("Profile updated!");
    });
});

document
    .querySelector("input[inputmode='numeric']")
    .addEventListener("input", (e) => {
        const value = e.target.value;
        const notDigit = /\D/;

    if (notDigit.test(value) === true){
        e.target.value = value.replace(/\D/g, "");
    }
    console.log(value);
});

(() => {
    "use strict";
    const forms = document.querySelectorAll("validation");
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            (event) => {
                const password = document.getElementById("passwordvalidation").value;
                const PasswordConfirmation = document.getElementById("Password-Confirmation").value;

                if (password.length < 6) {
                    event. preventDefault();
                    event. stopPropagation();
                    alert("Password harus minimal 6 karakter.");

                } else if (password !== PasswordConfirmation) {
                    event. preventDefault();
                    event. stopPropagation();
                    alert("Password dan konfirmasi password tidak cocok.");
                }
                form.classList.add("was-validated");
            },
            false
        );
    });
})();
