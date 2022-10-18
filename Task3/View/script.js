function deleteButtonOnclick(clickedId) {
    let btn = document.getElementById("btnDelete");
    btn.setAttribute("form", "form" + clickedId);
    btn.value = clickedId;
}

function editButtonOnclick(clickedId){
    let id = clickedId.split('_')[0];
    document.getElementById("inputEditEmail").value = document.getElementById(id+"_email").value;
    document.getElementById("inputEditName").value = document.getElementById(id+"_name").value;
    document.getElementById("inputEditGender").value = document.getElementById(id+"_gender").value;
    document.getElementById("inputEditStatus").value = document.getElementById(id+"_status").value;
    document.getElementById("btnEdit").value=id;
}