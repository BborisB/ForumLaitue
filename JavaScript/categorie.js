let addBtn = document.querySelector("#addBtn");
let addSujetDialog = document.querySelector("#addSujetDialog");
let cancelBtn = document.querySelector("#cancelBtn");
addBtn.addEventListener("click", ()=>
{
    addSujetDialog.showModal();
});
cancelBtn.addEventListener("click", () =>
{
    addSujetDialog.close();
});