//Funkciók
function showSwitch(id) {$("#" + id).toggle();}
function isNeeded(target) {return typeof target != "undefined"}
function ladder(step){
    var back;
    switch(parseInt(step)){
	case 0:back = "Reménytelen";break;
	case 1:back = "Hitvány";break;
	case 2:back = "Gyenge";break;
	case 3:back = "Átlagos";break;
	case 4:back = "Tűrhető";break;
	case 5:back = "Jó";break;
	case 6:back = "Nagyszerű";break;
	
	default:back= "Túl lett tolva";
    }
    return back;
}
function fudgeRoll(startAt){
    var back=startAt;
    for (var i = 0; i < 4; i++) {
	dice = Math.floor(Math.random()*6)+1;
	console.log("A kocka :"+dice);
	switch(dice){
	case 1:
	case 2:back += -1;break;
	case 3:
	case 4:back += 0;break;
	case 5:
	case 6:back += 1;break;
	
    
    
}
console.log("A Fudge érték :"+back);
    }
    console.log("ide ért: "+ladder(back));
    if(back<0){back=0;}
    if(back>6){back=6;}
    return back;
    
    
    
    
    
}


//AJAX
function getPhp(from, target, id) {
    $.post(from, {"id": id}, function (result) {
	$(target).html(result);
	main();
    });
}
function getBookCover(id) {
    if (Number.isInteger(id)) {
	getPhp("php/getBookCover.php", 'main', id);
    } else {
	alert("A keresett könyv nem talÃ¡lhatÃ³, lehet eltÃ¡volÃ­tottÃ¡k, kÃ©rlek tÃ¶lds Ãºjra az oldalt.");
    }
    $('main').attr('id', 'cover');
}

function news() {
    getPhp("php/getNews.php", 'main');
    $('main').attr('id', 'news');
}
function libary() {
    getPhp("php/getLibary.php", 'main');
    $('main').attr('id', 'libary');
}
function openBook(prototypePath) {
    $.post('php/createBookmark.php', {"path": prototypePath}, function (result) {
	//console.log(result);
	openBookAt(result.slice(2));
    });
    }
function turn(here) {

    $.getJSON(here, function (page) {
	var bookID = page.bookID;
	$.post('php/changeBookmark.php', {"bookID": bookID, "updateTo": [{'name': 'place', 'to': here}]}, function (results) {
	    //console.log(results);
	    openBookAt(results.slice(3));
	});
    });
}

//Reading
function openBookAt(bookmarkPath) {
    $.getJSON(bookmarkPath, function (character) {
	var pagePath = character.place;
	$.getJSON(pagePath, function (page) {
	    //console.log("opening:"+pagePath)

	    $('main').empty();
	    $('main').attr("id", "page");
    //Események
	    if (isNeeded(page.atribEvent)) {
		var atributes = character.atributes;
		for (target of page.atribEvent) {
		    for (atribute of atributes){
			if (target.label === atribute.label){
			    atribute.value = parseInt(atribute.value);
			    atribute.value += target.value; 
			    console.log(typeof(atribute.value)+typeof(target.value)); 
			}
		    }
		}
		$.post('php/changeBookmark.php', {"bookID": page.bookID, "updateTo": [{'name': 'atributes', 'to': atributes}]}, function () {});
	}

    //Fudge Proba	    
	    if (isNeeded(page.trials)) {
		
		var startAt = parseInt(character.atributes[page.trials.targetAtribute].value);
		console.log("innen indul: "+ladder(startAt));
		var result =fudgeRoll(startAt);
		console.log(result);
		var targetPage="assets/libary/2/"+page.trials.results[result]+".json";
		console.log(targetPage);
		turn(targetPage);
		
		
	    }


    //Ha nincs Fudge Proba
	    else {
		if (isNeeded(page.color)) {
		    setColorSheme(page.color)
		}
		;
		if (isNeeded(page.title)) {
		    $('main').append($("<h3></h3>").text(page.title));
		}
		if (isNeeded(page.text)) {
		    $('main').append($("<p></p>").text(page.text));
		}
		if (isNeeded(page.charname)) {
		    $('main').append($("<p></p>").text(character.charName));
		}
		if (isNeeded(page.paths)) {
		    var buttonBar = $("<div></div>");
		    for (path of page.paths) {
			var button = $("<button onclick=turn(&quot;" + path.path + "&quot;)></button>").text(path.label);
			buttonBar.append(button);
		    }
		    ;
		    $('main').append(buttonBar);
		}
		if (isNeeded(page.charsheet)) {
		    var charsheet = $("<table></table>");
		    charsheet.append("<tr><th>Tulajdonság</th><th>Érték</th></tr>");
		    for (atribute of character.atributes) {
			var row = $("<tr><td>" + atribute.label + "</td><td>" + ladder(atribute.value) + "</td></tr>");
			charsheet.append(row);
		    }
		    ;
		    $('main').append(charsheet);






		}
	    }




	});
    });
}

//Eseményfigyelők
$("#openLibary").click(function (){libary()});
$("#openNews").click(function (){news()});
//init()
news();