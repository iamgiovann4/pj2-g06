

/*clonando elemento*/
var elementoOriginal = document.getElementById("clone");
var elementoClone = elementoOriginal.cloneNode(true);
var exib = document.getElementById('exib');


// inserindo o elemento na paǵina
exib.appendChild(elementoClone);

