
function deleteButtonOnclick(clickedId){
    let btn = document.getElementById("btnDelete");
    btn.setAttribute("form","form"+clickedId);
    btn.value=clickedId;
}


function editButtonOnClick(clickedId){
    //let id = clickedId.split('_')[0];
    console.log("f");
}