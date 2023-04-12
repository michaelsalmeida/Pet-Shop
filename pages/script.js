let hambur = document.querySelector(".menu")
hambur.addEventListener("click", abreMenu)
let fecha = document.querySelector(".fechaMenu")
fecha.addEventListener("click", fechaMenu)
let menu = document.querySelector(".responsive")

function abreMenu(){
    menu.style.left= "0%"
}

function fechaMenu(){
    menu.style.left= "-100%"
}