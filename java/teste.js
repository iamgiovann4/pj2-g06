/*clonando elemento*/
var elementoOriginal = document.getElementById("clone");
var elementoClone = elementoOriginal.cloneNode(true);
var exib = document.getElementById('exib');

// inserindo o elemento na paǵina
exib.appendChild(elementoClone);

function showModal(idModal) {
    const modal = document.querySelector(idModal)
    modal.style.display = 'flex'  
}

function hideModal(idModal, event) {
    if (event.target.className === 'modal') {
        const modal = document.querySelector(idModal)
         modal.style.display='none'
    }
}