
    
    
    
    


$(document).ready(function(){
$("body").addClass("w3-theme-dark w3-container w3-padding");

$(".button").addClass("w3-btn w3-round-xlarge w3-border w3-theme-d1 w3-hover-sepia w3-tiny");

$("header").addClass("w3-theme-d4 w3-center w3-container w3-padding");
$("#title").addClass("w3-container w3-twothird w3-center");
$("#userZone").addClass("w3-container w3-third w3-right-align");


$("main").addClass("w3-theme-d4 w3-container w3-row");
$("nav").addClass("w3-theme-d2 w3-bar-block");
$("nav a").addClass("w3-bar-item");




$("nav button").click(function(){
    $(".w3-sepia").removeClass("w3-sepia");  
    $(this).addClass("w3-sepia");
  });
$(".disabled").hide();
$("body").fadeIn('slow');
});