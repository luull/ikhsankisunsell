document.addEventListener('DOMContentLoaded', function () {
    var sidebar = document.getElementById('sidebar');
    var content = document.getElementById('content');
    var toggleBtn = document.getElementById('toggle-btn');
    var uploadBtn = document.getElementById('upload-btn');
    var uploadPhoto = document.getElementById('upload-photo');
    var profilePhoto = document.getElementById('profile-photo');
    var editNameBtn = document.getElementById('edit-name-btn');
    var editNameInput = document.getElementById('edit-name-input');
    var profileName = document.getElementById('profile-name');

    toggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('open');
        content.classList.toggle('open');
    });

    uploadBtn.addEventListener('click', function () {
        uploadPhoto.click();
    });

    uploadPhoto.addEventListener('change', function () {
        var file = uploadPhoto.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            profilePhoto.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            profilePhoto.src = "path/to/your/default-profile.jpg";
        }
    });

    editNameBtn.addEventListener('click', function () {
        editNameInput.style.display = 'block';
        editNameInput.value = profileName.textContent;
        profileName.style.display = 'none';
        editNameInput.focus();
    });

    editNameInput.addEventListener('blur', function () {
        profileName.textContent = editNameInput.value;
        profileName.style.display = 'block';
        editNameInput.style.display = 'none';
    });
});
