function modales(id){
    document.getElementById('id01').style.display='flex';
    document.getElementById("modalForm").action = document.getElementById("bt"+id).dataset.id;
    
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    var modal = document.getElementById('id01');
  if (event.target == modal ||event.target ==  document.getElementsByClassName("cancelbtn")[0]) {
    modal.style.display = "none";
  }
}
