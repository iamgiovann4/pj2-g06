/*Slide*/
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Tempo da imagem de 5 segundos
}
/*Fim do Slide*/

/*clonando elemento*/
var elementoOriginal = document.getElementById("clone");
var elementoClone = elementoOriginal.cloneNode(true);
var exib = document.getElementById('exib');


// inserindo o elemento na paǵina
exib.appendChild(elementoClone);

