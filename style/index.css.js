function setColorSheme(target) {
    path = "style/colorShemes/" + target + ".css";
    $("#colorSheme").attr('href', path);
    //console.log("set colorsheme to "+target+" a fálj itt található: "+path);

}
function newPage(){
    //console.log("Új lapra igazítjuk a stilust");
    $('.pageBtn').addClass("w3-btn w3-theme-d2");
}
function showSwitch(id) {$("#" + id).fadeToggle("slow");}
function main() {
    $("main").addClass("w3-card-4 w3-row w3-theme-d3");
    style = $("main").attr('id');
    $("#navBar").hide();
    $("#btnMenuOpen").show();


    switch (style) {
	case "news":
	    setColorSheme("default");
	    $("main article").addClass("w3-card w3-theme-d2");
	    $("main article h4").addClass("w3-card w3-theme-d1");
	    $("main article div").addClass("w3-container w3-theme-d1");
	    $("main article p").addClass("w3-container w3-theme-d2");
	    $("footer").addClass("w3-display-bottomleft w3-tiny");
	    $("footer").css("position","sticky");

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
	    case "admin":
	    setColorSheme("red");
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
    $("header").addClass("w3-theme-d3 w3-card-4 w3-padding");
    $("body").addClass("w3-theme-d4 w3-container w3-padding");
    $("header div").addClass("w3-row w3-theme-d2 ");
    $(".logoSide").addClass("w3-quarter");
    $("#logo").addClass("w3-hide-small w3-theme-d1 w3-half w3-center");
    $("#userButtons .btn").addClass("w3-right");
    $("nav").addClass("w3-bar");
    $("nav .btn").addClass("w3-w3-bar-item");
    $(".btn").addClass("w3-button w3-theme-d1");
    $(".hiding").addClass('w3-modal w3-animate-zoom');
    $(".hiding div").addClass('w3-modal-content w3-theme-dark w3-card-4');
    $(".hiding nav").addClass('w3-panel w3-theme-l1');
    $(".disabled").hide();
    $("input[type='text']").addClass("w3-input w3-border");
    $("input[type='password']").addClass("w3-input w3-border");
    $("input[type='checkbox']").addClass("w3-check");
    $(".formNav button").addClass("w3-bar-item w3-button");
    $("body").fadeIn();
    $("#errorZone").addClass("w3-red");
    $("#errorZone").click(function(){$("#errorZone").empty();});
    
    $("#errorzone p").addClass("w3-black");


//Eseményfigyelők beállítása
    $(".active").click(function () {
	$(".w3-theme-l5").removeClass(".w3-theme-l5");
	$(this).addClass(".w3-theme-l5");
    });
    


});

//saját classok



