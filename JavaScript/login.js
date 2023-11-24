let myForm = document.querySelector("#loginForm");
let email = document.querySelector("#email");
let emailErrorText = document.querySelector("#emailErrorText");
let password = document.querySelector("#password");
let passwordErrorText = document.querySelector("#passwordErrorText");
myForm.addEventListener("submit", (e) =>
{
    e.preventDefault();
    fetch("../Controllers/loginController.php", {
        method: "post",
        body: new FormData(myForm)
    }).then(response => response.json()).then(json =>
    {
        if(json["emailErrorText"] !== "")
        {
            emailErrorText.textContent = json["emailErrorText"];
            email.style.borderColor = "#BB0000";
        }
        else
        {
            emailErrorText.textContent = "";
            email.style.borderColor = "#000000";
        }
        if(json["passwordErrorText"] !== "")
        {
            passwordErrorText.textContent = json["passwordErrorText"];
            password.style.borderColor = "#BB0000";
        }
        else
        {
            passwordErrorText.textContent = "";
            password.style.borderColor = "#000000";
        }
        if(json["canLogin"]==true)
        {
            email.style.borderColor = "#000000";
            password.style.borderColor = "#000000";
            location = "categorie.php";
        }
    });
});