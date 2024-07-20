// function to toggle side bar
const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click", function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click", ()=>{
    toggleLocalStorage();
    toggleRootClass();
});
// function to enable themes
function toggleRootClass(){
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme', inverted);
}

function toggleLocalStorage(){
    if(isLight()){
        localStorage.removeItem("light");
    }else{
        localStorage.setItem("light", "set");
    }
}

function isLight(){
    return localStorage.getItem("light");
}

if(isLight()){
    toggleRootClass();
}
// jquery function to upload profile photo
$(document).ready(function() {
    $('#main_image').on('change', function() {
        if (this.files.length > 0) {
            $('#main_img_form').submit();
            console.log('form submitted');
        }else{
            console.log('Input field is empty');
        }
    });
});

// jquery function to upload main asset video
$(document).ready(function() {
    $('#main_video').on('change', function() {
        if (this.files.length > 0) {
            $('#main_video_form').submit();
            console.log('form submitted');
        }else{
            console.log('Input field is empty');
        }
    });
});

//jquery function to upload sub asset photo
$(document).ready(function() {
    $('#sub_image').on('change', function() {
        if (this.files.length > 0) {
            $('#sub_img_form').submit();
            console.log('form submitted');
        }else{
            console.log('Input field is empty');
        }
    });
});

// jquery function to upload sub asset video
$(document).ready(function() {
    $('#sub_video').on('change', function() {
        if (this.files.length > 0) {
            $('#sub_video_form').submit();
            console.log('form submitted');
        }else{
            console.log('Input field is empty');
        }
    });
});

const ScrollRevealOption = {
    distance: "50px;",
    origin: "bottom",
    duration: 1000,
};

ScrollReveal().reveal(".container__left h1",{
    ...ScrollRevealOption,
});
ScrollReveal().reveal(".container__left .container__btn",{
    ...ScrollRevealOption,
    delay: 500,
});

ScrollReveal().reveal(".container__right h4",{
    ...ScrollRevealOption,
    delay: 2000,
});

ScrollReveal().reveal(".container__right h2",{
    ...ScrollRevealOption,
    delay: 2500,
});

ScrollReveal().reveal(".container__right h3",{
    ...ScrollRevealOption,
    delay: 3000,
});

ScrollReveal().reveal(".container__right p",{
    ...ScrollRevealOption,
    delay: 3500,
});

ScrollReveal().reveal(".container__right .tent-1",{
    duration: 1000,
    delay: 4000,
});

ScrollReveal().reveal(".container__right .tent-2",{
    duration: 1000,
    delay: 4500,
});
ScrollReveal().reveal(".location",{
    ...ScrollRevealOption,
    origin: "left",
    delay:5000,
});
ScrollReveal().reveal(".socails span",{
    ...ScrollRevealOption,
    origin: "left",
    delay: 5500,
    interval: 500,
});

