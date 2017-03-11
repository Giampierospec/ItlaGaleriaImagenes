$(document).ready(startEffect);

function startEffect(){
  $(".row").hide();
  $(".jumbotron").hide(0,startJumbotron);
}
function startJumbotron(){
  $(".jumbotron").fadeIn(5000,startRow);
}
function startRow(){

  $(".row").fadeIn(5000);
}
