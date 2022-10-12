
function deleteButtonOnclick(clickedId){
    let btn = document.getElementById("btnDelete");
    btn.setAttribute("form","form"+clickedId);
    btn.value=clickedId;
}
