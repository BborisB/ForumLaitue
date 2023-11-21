let myForm = document.querySelector("#registerForm");
let registerSuccessful = document.querySelector("#registerSuccessful");
let firstName = document.querySelector("#firstName");
let lastName = document.querySelector("#lastName");
let email = document.querySelector("#email");
let password = document.querySelector("#password");
let confirmPassword = document.querySelector("#confirmPassword");
let firstNameErrorText = document.querySelector("#firstNameErrorText");
let lastNameErrorText = document.querySelector("#lastNameErrorText");
let emailErrorText = document.querySelector("#emailErrorText");
let passwordErrorText = document.querySelector("#passwordErrorText");
let confirmPasswordErrorText = document.querySelector("#confirmPasswordErrorText");
let pfp = document.querySelector("#pfp");
let pfpErrorText = document.querySelector("#pfpErrorText");
let pfpPreview = document.querySelector("#pfpPreview");
let pfpContainer = document.querySelector("#pfpContainer");
let pfpBtn = document.querySelector("#pfpBtn");
let emailRe = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
let passwordRe = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[#+-^\[\]])(?=.{8,})/;
function pfpResize()
{
    pfpContainer.style.width = pfpPreview.offsetHeight + "px";
    pfpBtn.style.width = pfpContainer.offsetHeight + "px";
}
pfpResize();
new ResizeObserver(pfpResize).observe(pfpContainer);
pfp.addEventListener("change", () =>
{
    // pfpPreview.style.display = "inline";
    if (pfp.value)
    {
        pfpPreview.src = URL.createObjectURL(pfp.files[0]);
    }
});

pfpBtn.addEventListener("click", (e) =>
{
    pfp.click();
});

pfpPreview.addEventListener("click", (e) =>
{
    pfp.click();
});

myForm.addEventListener("submit", (e)=>
{
    if(!verifyRegister())
    {
        e.preventDefault();
        // myForm.style.display = "none";
        // registerSuccessful.style.display = "flex";
    }
});

/**
 * Verifie les champs du registerForm et affiche les messages nécessaires.
 * @return {boolean} true si le form peut être submit, false sinon.
 */
function verifyRegister()
{
    let result = true;
    //FirstName verification
    if(firstName.value == "")
    {
        firstName.style.borderColor = "#BB0000";
        firstNameErrorText.textContent = "Ce champ est obligatoire.";
        result = false;
    }
    else if(firstName.value.length < 3)
    {
        firstName.style.borderColor = "#BB0000";
        firstNameErrorText.textContent = "Le prénom doit avoir 3 caractères minimum.";
        result = false;
    }
    else
    {
        firstName.style.borderColor = "#000000";
        firstNameErrorText.textContent = "";
    }
    //LastName verification
    if(lastName.value == "")
    {
        lastName.style.borderColor = "#BB0000";
        lastNameErrorText.textContent = "Ce champ est obligatoire.";
        result = false;
    }
    else if(lastName.value.length < 3)
    {
        lastName.style.borderColor = "#BB0000";
        lastNameErrorText.textContent = "Le nom doit avoir 3 caractères minimum.";
        result = false;
    }
    else
    {
        lastName.style.borderColor = "#000000";
        lastNameErrorText.textContent = "";
    }
    //Email verification
    if(!emailRe.test(email.value))
    {
        email.style.borderColor = "#BB0000";
        emailErrorText.textContent = "Email invalide.";
        result = false;
    }
    else
    {
        email.style.borderColor = "#000000";
        emailErrorText.textContent = "";
    }
    //Password verification
    if(!passwordRe.test(password.value))
    {
        password.style.borderColor = "#BB0000";
        passwordErrorText.textContent = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.";
        result = false;
    }
    else
    {
        password.style.borderColor = "#000000";
        passwordErrorText.textContent = "";
    }
    //ConfirmPassword verification
    if(password.value != confirmPassword.value)
    {
        confirmPassword.style.borderColor = "#BB0000";
        confirmPasswordErrorText.textContent = "Vous devez entrer le même mot de passe.";
        result = false;
    }
    else
    {
        confirmPassword.style.borderColor = "#000000";
        confirmPasswordErrorText.textContent = "";
    }
    return result
}