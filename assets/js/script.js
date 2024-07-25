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

    //function to toggle password visibility
    $('#pass_toggle').on('click', function () {
        var show_eye = $('#show_eye');
        var hide_eye = $('#hide_eye');
        hide_eye.removeClass('d-none');
        if($('#pwd').attr('type') === 'password'){
            $('#pwd').attr('type', 'text');
            show_eye.hide();
            hide_eye.show();
        }else{
            $('#pwd').attr('type', 'password');
            show_eye.show();
            hide_eye.hide();
        }
    });

    //function to toggle password visibility
    $('#cpass_toggle').on('click', function () {
        var show_eye = $('#cshow_eye');
        var hide_eye = $('#chide_eye');
        hide_eye.removeClass('d-none');
        if($('#cpwd').attr('type') === 'password'){
            $('#cpwd').attr('type', 'text');
            show_eye.hide();
            hide_eye.show();
        }else{
            $('#cpwd').attr('type', 'password');
            show_eye.show();
            hide_eye.hide();
        }
    });


});


