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
    $('#image').on('change', function() {
        if (this.files.length > 0) {
            $('#form').submit();
            console.log('form submitted');
        }else{
            console.log('Input field is empty');
        }
    });
});



