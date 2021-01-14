//Funkciók
function showSwitch(id) {
    var item = document.getElementById(id);
    if (item.style.display == 'block') {
	item.style.display = 'none';
    } else {
	item.style.display = 'block';
    }

}
function getPhp(from, target, id) {
    $.post(from, {"id": id}, function (result) {
	$(target).html(result);
	main();
	



    });



}

function openBookAt(characterPath) {
    $.getJSON(characterPath, function (character) {
	var pagePath = character.place;
	$.getJSON(pagePath, function (page) {
	    
	    $('main').empty();
	    $('main').attr("id", "page");
	    var title = $("<h3></h3>").text(page.title);
	    var text = $("<p></p>").text(page.text);
	    var charName = $("<p></p>").text(character.charName);
	    var buttonBar = $("<div></div>");
	    for(path of page.paths){
		var button =$("<button onclick=openBookAt(&quot;"+path.path+"&quot;)></button>").text(path.label);
		buttonBar.append(button);
	    };
	    
	    
	    
	   
	    $('main').append(title, text, charName,buttonBar);
	    
	    

	    //alert(page.text + charachter.charName)



	});


    });


}

function getBookCover(id) {
    if (Number.isInteger(id)) {
	getPhp("php/getBookCover.php", 'main', id);
	
    } else {
	alert("A keresett könyv nem található, lehet eltávolították, kérlek tölds újra az oldalt.");
	
    }
    $('main').attr('id','cover');
    
}

function news() {
    getPhp("php/getNews.php", 'main');
    $('main').attr('id','news');
    
}
function libary() {
    getPhp("php/getLibary.php", 'main');
    $('main').attr('id','libary');
    

    


}




//Eseményfigyelők
$("#openLibary").click(function () {
    libary()
});
$("#openNews").click(function () {
    news()
});


//init()
news();