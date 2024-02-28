//=============================================codigos para estilização da pagina inicial=============================================


ScrollReveal({ 
    reset: true,
    distance: '30px',
    duration: 900,
    delay: 200
});

ScrollReveal().reveal('.estetica-logo', { origin: 'top' });
ScrollReveal().reveal('.estetica-texto', { origin: 'bottom' });
ScrollReveal().reveal('.container-login', { origin: 'right' });
ScrollReveal().reveal('.login-text', { origin: 'top' });
ScrollReveal().reveal('.div-line', { origin: 'bottom' });
ScrollReveal().reveal('.prod-by', { origin: 'left' });




// Verifica se o som já foi reproduzido
var somReproduzido = false;

// Função para reproduzir o som
function reproduzirSom() {
    // Verifica se o som já foi reproduzido
    if (!somReproduzido) {
        // Obtém o elemento de áudio
        var audio = document.getElementById('som');

        // Define o volume desejado (0.0 a 1.0)
        audio.volume = 0.3; // Exemplo: ajuste para 50% de volume


        // Reproduz o som
        audio.play();

        // Atualiza a flag indicando que o som foi reproduzido
        somReproduzido = true;
    }
}

// Adiciona um ouvinte de eventos para carregamento ou recarregamento da página
window.addEventListener('load', reproduzirSom);



  

//=============================================codigos para estilização da pagina home===================================================



var menuItem = document.querySelectorAll('.item-menu')

function selectLink(){
    menuItem.forEach((item)=>
        item.classList.remove('ativo')
    )
    this.classList.add('ativo')
}

menuItem.forEach((item)=>
    item.addEventListener('click', selectLink)

)


//Expandir o menu

var btnExp = document.querySelector('#btn-exp')
var menuSide = document.querySelector('.sidebar')

btnExp.addEventListener('click', function(){
    menuSide.classList.toggle('expandir')
})





// ========================FUNÇÃO PARA MOSTRAR A SENHA================== 

function MostrarSenha(){
    var passwordInput = document.getElementById("senha");
    var showPasswordButton = document.getElementById("MostrarSenha");

    
        if (passwordInput.type === "password") {
            passwordInput.setAttribute('type','text');
            showPasswordButton.classList.replace('bx-show','bx-hide');
        } else {
            passwordInput.setAttribute('type','password');
            showPasswordButton.classList.replace('bx-hide','bx-show');
        }
;
}