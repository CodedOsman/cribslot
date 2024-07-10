const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click", function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click", ()=>{
    toggleLocalStorage();
    toggleRootClass();
});

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


document.ready(function(){
    $("#file").change(function(){
        var reader = new FileReader();
        reader.onload = function(image) {
            $(".imageUploadedOrNot").show(0);
            $("#blankImg").attr('src', image.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    });
});


$(document).ready(function(){
    $('#img').change(function(){
        $('#form').submit();
    });
});

