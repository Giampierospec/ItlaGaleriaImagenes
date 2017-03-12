var imagen;
var nom_img = document.getElementById("nom_img");
var com_img = document.getElementById("com_img");
function loadData(){
  var datos = localStorage.getItem("inputsImagen");
  if(datos != null){
      imagen = JSON.parse(datos);
      setInputValues();
  }
}
function setInputValues(){
nom_img.value = imagen.nombre;
com_img.innerHTML = imagen.comentario;
}
 window.addEventListener("load",loadData);
