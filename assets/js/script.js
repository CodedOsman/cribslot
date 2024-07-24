// function to toggle side bar
const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click", () => {
    toggleLocalStorage();
    toggleRootClass();
});
// function to enable themes
function toggleRootClass() {
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme', inverted);
}

function toggleLocalStorage() {
    if (isLight()) {
        localStorage.removeItem("light");
    } else {
        localStorage.setItem("light", "set");
    }
}

function isLight() {
    return localStorage.getItem("light");
}

if (isLight()) {
    toggleRootClass();
}
// jquery function to upload profile photo
$(document).ready(function () {
    $('#image').on('change', function () {
        if (this.files.length > 0) {
            $('#form').submit();
            console.log('form submitted');
        } else {
            console.log('Input field is empty');
        }
    });
    //function to upload main asset video
    $('#main_image').on('change', function () {
        if (this.files.length > 0) {
            $('#main_img_form').submit();
            console.log('form submitted');
        } else {
            console.log('Input field is empty');
        }
    });

    // function to upload main asset video
    $('#main_video').on('change', function () {
        if (this.files.length > 0) {
            $('#main_video_form').submit();
            console.log('form submitted');
        } else {
            console.log('Input field is empty');
        }
    });

    //function to upload sub asset photo
    $('#sub_image').on('change', function () {
        if (this.files.length > 0) {
            $('#sub_img_form').submit();
            console.log('form submitted');
        } else {
            console.log('Input field is empty');
        }
    });

    //function to upload sub asset video
    $('#sub_video').on('change', function () {
        if (this.files.length > 0) {
            $('#sub_video_form').submit();
            console.log('form submitted');
        } else {
            console.log('Input field is empty');
        }
    });

    //function to upload client photo
    $('#client_image').on('change', function () {
        if (this.files.length > 0) {
            $('#client_img_form').submit();
            console.log('form submitted');
        } else {
            console.log('Input field is empty');
        }
    });



});

function password_show_hide() {
    var x = document.getElementById("pwd");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
}
