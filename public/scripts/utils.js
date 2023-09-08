function removeImage(id, formId) {
    let x = document.createElement("INPUT");
    x.setAttribute("type", "hidden");
    x.setAttribute("value", id);
    x.setAttribute("name", "deletedImages[]");
    document.getElementById(formId).appendChild(x);
    document.getElementById(id).remove();
}