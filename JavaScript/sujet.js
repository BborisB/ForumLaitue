let textAreaMessage = document.querySelector("#textAreaMessage");
function textAreaResize()
{
    textAreaMessage.style.height = "1em";
    textAreaMessage.style.height = "calc(" + textAreaMessage.scrollHeight + "px - 0.15em)";
    textAreaDiv.scrollTop = textAreaDiv.scrollHeight;
}
textAreaResize();
textAreaMessage.addEventListener("input", textAreaResize);
//Redimensionne le textArea quand il change de taille (surtout quand il change de largeur).
new ResizeObserver(textAreaResize).observe(textAreaMessage);