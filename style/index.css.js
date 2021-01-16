function setColorSheme(target) {
    path = "style/colorShemes/" + target + ".css";
    $("#colorSheme").attr('href', path);
    //console.log("set colorsheme to "+target+" a fálj itt található: "+path);

}
function main() {
    $("main").addClass("w3-container w3-row w3-theme-d3");
    style = $("main").attr('id');


    switch (style) {
	case "news":
	    setColorSheme("default");
	    $("main article").addClass("w3-card w3-theme-d2");
	    $("main article h4").addClass("w3-card w3-theme-d1");
	    $("main article div").addClass("w3-container w3-theme-d1");
	    $("main article p").addClass("w3-container w3-theme-d2");

	    break;
	case "libary":
	    $("main article").addClass("w3-card-4 w3-dropdown-hover w3-theme-d3 w3-quartelthird w3-padding w3-margin");
	    $("main img").addClass("w3-image");
	    $("main div").addClass("w3-dropdown-content w3-theme-d2 w3-padding");
	    $("main span").addClass("w3-container");


	    setColorSheme("default");


	    break;
	case "cover":
	    setColorSheme("default");
	    $("main div").addClass("w3-container w3-center");
	    $(".barBtn").addClass("w3-bar w3-center w3-padding w3-theme-d1");
	    $(".barBtn button").addClass("w3-mobile w3-btn w3-theme-l1");
	    $(".error").addClass("w3-mobile w3-btn w3-red");


	    break;
	case "page":
	    //setColorSheme done by index.js.openBookAt;
	    $("main div").addClass("w3-container w3-center");
	    $(".barBtn").addClass("w3-bar w3-center w3-padding w3-theme-d1");
	    $(".barBtn button").addClass("w3-mobile w3-btn w3-theme-l1");
	    $(".error").addClass("w3-mobile w3-btn w3-red");


	    break;
	default:
	    setColorSheme("default");

    }

}



//Onload
$(document).ready(function () {
    $("body").addClass("w3-theme-dark w3-container w3-padding");
    $(".button").addClass("w3-btn w3-round-xlarge w3-border w3-theme-d1 w3-theme-l5 w3-tiny");
    $("header").addClass("w3-theme-d4 w3-center w3-container w3-padding");
    $("header div").addClass("w3-theme-d3 w3-center w3-container w3-padding");
    $("#title").addClass("w3-container w3-twothird w3-center");
    $("#userZone").addClass("w3-container w3-third w3-right-align");
    $("nav").addClass("w3-theme-d2 w3-bar-block");
    $("nav a").addClass("w3-bar-item");
    $(".disabled").hide();
    $("body").fadeIn('slow');
    


//Eseményfigyelők beállítása
    $("nav button").click(function () {
	$(".w3-theme-l5").removeClass(".w3-theme-l5");
	$(this).addClass(".w3-theme-l5");
    });



});

//saját classok



