function deleteButtonOnclick(clickedId) {
    let btn = document.getElementById("btnDelete");
    btn.setAttribute("form", "form" + clickedId);
    btn.value = clickedId;
}

function editButtonOnclick(clickedId) {
    let id = clickedId.split('_')[0];
    document.getElementById("inputEmail").value = document.getElementById(id + "_email").value;
    document.getElementById("inputName").value = document.getElementById(id + "_name").value;
    document.getElementById("inputGender").value = document.getElementById(id + "_gender").value;
    document.getElementById("inputStatus").value = document.getElementById(id + "_status").value;
    let btn = document.getElementById("btn");
    btn.name="edit";
    btn.value = id;
}

function clearModal(){

    document.getElementById("inputEmail").value="";
    document.getElementById("inputName").value="";
    document.getElementById("inputGender").value="";
    document.getElementById("inputStatus").value="";
    document.getElementById("btn").name="add";
    document.getElementById("btn").value="";
}