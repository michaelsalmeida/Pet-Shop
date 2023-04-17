let hambur = document.querySelector(".menu")
hambur.addEventListener("click", abreMenu)
let fecha = document.querySelector(".fechaMenu")
fecha.addEventListener("click", fechaMenu)
let menu = document.querySelector(".responsive")

// abre menu hamburguer
function abreMenu(){
    menu.style.left= "0%"
}

// fecha menu hamburguer
function fechaMenu(){
    menu.style.left= "-100%"
}

// mostra valores e formas de pagamento
function formaPagamento(){
    document.querySelector("#primeiro img").setAttribute("src", "../img-estatico/debito.svg")
    document.querySelector("#primeiro p").innerHTML= "Débito"

    document.querySelector("#segundo img").setAttribute("src", "../img-estatico/pix.svg")
    document.querySelector("#segundo p").innerHTML= "Pix"

    document.querySelector("#terceiro img").setAttribute("src", "../img-estatico/credito.svg")
    document.querySelector("#terceiro p").innerHTML= "Crébito"

    document.querySelector("#quarto img").setAttribute("src", "../img-estatico/boleto.svg")
    document.querySelector("#quarto p").innerHTML= "Boleto"
}

function formaValores(){
    document.querySelector("#primeiro img").setAttribute("src", "../img-estatico/Dog.svg")
    document.querySelector("#primeiro p").innerHTML= "Banho <br> R$ 49,90"

    document.querySelector("#segundo img").setAttribute("src", "../img-estatico/Shaving.svg")
    document.querySelector("#segundo p").innerHTML= "Tosa <br> R$79.99"
    
    document.querySelector("#terceiro img").setAttribute("src", "../img-estatico/Veterinarian.svg")
    document.querySelector("#terceiro p").innerHTML= "Consulta <br> R$ 89,99"
    
    document.querySelector("#quarto img").setAttribute("src", "../img-estatico/Fast delivery.svg")
    document.querySelector("#quarto p").innerHTML= "Delivery <br> R$ 25,80"
}