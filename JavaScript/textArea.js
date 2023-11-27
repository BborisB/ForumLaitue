let myTextAreas = document.querySelectorAll(".myTextArea");
myTextAreas.forEach(myTextArea =>
{
    function textAreaResize()
    {
        myTextArea.style.height = "1em";
        myTextArea.style.height = "calc(" + myTextArea.scrollHeight + "px - 1.25em)";
        myTextArea.parentElement.scrollTop = myTextArea.parentElement.scrollHeight;
    }
    textAreaResize();
    myTextArea.addEventListener("input", textAreaResize);
    //Redimensionne le textArea quand il change de taille (surtout quand il change de largeur).
    new ResizeObserver(textAreaResize).observe(myTextArea);
});