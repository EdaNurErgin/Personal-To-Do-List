const toDoItems=document.getElementsByClassName("to-do-items")[0];
const input =document.getElementById("input");
const trashIcon=document.getElementById("trash");

input.addEventListener("keydown",function(event){
 if(event.key==="Enter")
    addItem();



})


function addItem(){
    // Boş giriş eklenmesin
    if (input.value.trim() === "") return;
    var divParent=document.createElement("div");
    var divChild=document.createElement("div");
    var checkIcon=document.createElement("i");
    var trashIcon=document.createElement("i");

    divParent.className="item";
    divParent.innerHTML='<div>'+input.value+'</div>';

    checkIcon.className="fas fa-check";
   checkIcon.style.color="black";
    // checkIcon.style.setProperty("color", "black", "important"); // Renk zorlanıyor

    checkIcon.addEventListener("click",function(){
        checkIcon.style.color="limegreen";
    })




    divChild.appendChild(checkIcon);
    trashIcon.className="fas fa-trash";
    trashIcon.style.color="black";
 
    trashIcon.addEventListener("click",function(){    
        divParent.remove();
    })

    divChild.appendChild(trashIcon);
    divParent.appendChild(divChild);
    toDoItems.appendChild(divParent);

    input.value='';

}