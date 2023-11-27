let addSujetForm = document.getElementById("addSujetForm");
let titreSujetErrorText = document.getElementById("titreSujetErrorText");
let messageErrorText = document.getElementById("messageErrorText");
let titreSujet = document.getElementById("titreSujet");
let messageDiv = document.getElementById("messageDiv");
addSujetForm.addEventListener("submit", (e) =>
{
    e.preventDefault();
    fetch(addSujetForm.action, {
        method: "post",
        body: new FormData(addSujetForm)
    }).then(response => response.json()).then(json =>
    {
        if(json["titreSujetErrorText"] !== "")
        {
            titreSujetErrorText.textContent = json["titreSujetErrorText"];
            titreSujet.style.borderColor = "#BB0000"
        }
        else
        {
            titreSujetErrorText.textContent = "";
            titreSujet.style.borderColor = "#000000"
        }
        if(json["messageErrorText"] !== "")
        {
            messageErrorText.textContent = json["messageErrorText"];
            messageDiv.style.borderColor = "#BB0000"
        }
        else
        {
            messageErrorText.textContent = "";
            messageDiv.style.borderColor = "#000000"
        }
    });
    location.reload();
});